<?php

class ExampleTest extends \PHPUnit\Framework\TestCase {
	
	/**
	 * Server connection
	 *
	 * @var \Comet\Server
	 */
	protected $server = null;

	public function setUp() {
		$this->server = new \Comet\Server(
			$_SERVER['COMET_SERVER_ADDR'],
			$_SERVER['COMET_SERVER_USER'],
			$_SERVER['COMET_SERVER_PASS']
		);
	}

	public function testDefinitions() {
		// The SDK was first developed for Comet 18.8.0; the current version
		// number will be at least this high
		$this->assertTrue( version_compare(\Comet\Def::APPLICATION_VERSION, '18.8.0', '>=') );
	}

	public function testConnection() {
		$info = $this->server->AdminMetaVersion();
		
		$this->assertInstanceOf(\Comet\ServerMetaVersionInfo::class, $info);		
		$this->assertTrue( abs(time() - $info->CurrentTime) < 60 ); // Server current time within 60 seconds of ours
	}

	public function testAddDeleteUser() {

		$username = "comet-php-sdk-test-".time();

		$before_users = $this->server->AdminListUsers();

		$addInfo = $this->server->AdminAddUser($username, $username);
		$this->assertEquals($addInfo->Status, 200);

		$profile = $this->server->AdminGetUserProfile($username);
		$this->assertInstanceOf(\Comet\UserProfileConfig::class, $profile);
		$this->assertEquals($profile->Username, $username);

		$after_users = $this->server->AdminListUsers();

		$new_users = array_diff($after_users, $before_users);
		$this->assertTrue( in_array($username, $new_users) );

		$deleteInfo = $this->server->AdminDeleteUser($username);
		$this->assertEquals($deleteInfo->Status, 200);

	}

	public function testUnknownUser() {
		$unknown_username = "comet-test-unknown-user-".time();

		try {
			$userpc = $this->server->AdminGetUserProfile($unknown_username);
			$this->fail("Shouldn't reach this");
		} catch (\Exception $e) {
			$this->assertTrue(true);
		}
	}

	public function testGuzzleAsync() {
		$client = new \GuzzleHttp\Client();

		$ok = false;

		$promise = $client->sendAsync( $this->server->AsPSR7(new \Comet\AdminMetaVersionRequest()) );
		$promise->then(function(\Psr\Http\Message\ResponseInterface $body) use (&$ok) {
			$info = \Comet\AdminMetaVersionRequest::ProcessResponse($body->getStatusCode(), (string)$body->getBody());
			
			$this->assertInstanceOf(\Comet\ServerMetaVersionInfo::class, $info);		
			$this->assertTrue( abs(time() - $info->CurrentTime) < 60 ); // Server current time within 60 seconds of ours

			$ok = true;
		});
		$promise->wait();

		$this->assertTrue($ok);
	}
		
	protected static function sizeWithinRange($size, $low_bound_mb, $high_bound_mb) {
		return ($size >= ($low_bound_mb * 1024*1024) && $size <= ($high_bound_mb * 1024*1024));
	}

	public function testDownloadClient() {
		// The download APIs return the generated client software.
		// Assert that the clients have (roughly) the right expected filesize
		// The first time running this test will be a little slow as the software is generated; successive tests on the
		// same running server instance should be faster

		$data = $this->server->AdminBrandingGenerateClientLinuxgeneric();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 5, 15), "Got size ".strlen($data)." for linux-generic, expected 5-15 MB" );

		$data = $this->server->AdminBrandingGenerateClientMacosX8664();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 10, 15), "Got size ".strlen($data)." for macos-x86_64, expected 10-15 MB" );

		$data = $this->server->AdminBrandingGenerateClientWindowsAnycpuZip();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 40, 50), "Got size ".strlen($data)." for windows-anycpu-zip, expected 40-50 MB" );

		$data = $this->server->AdminBrandingGenerateClientWindowsX8632Zip();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 20, 30), "Got size ".strlen($data)." for windows-x86_32-zip, expected 20-30 MB" );

		$data = $this->server->AdminBrandingGenerateClientWindowsX8664Zip();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 20, 30), "Got size ".strlen($data)." for windows-x86_64-zip, expected 20-30 MB" );

	}

	public function testModifyServerSettings() {
		
		// In the Comet 18.9.x era, the server settings classes are still
		// undocumented and may change across versions. The SDK includes blank
		// stub classes for these, that can be used to modify server settings
		// by known properties.
		
		$current_server_start_time = $this->server->AdminMetaVersion()->ServerStartTime;

		$config = $this->server->AdminMetaServerConfigGet()->toStdClass();

		$this->assertStringMatchesFormat('%c%c%c%c-%c%c%c%c-%c%c%c%c-%c%c%c%c-%c%c%c%c-%c%c%c%c', $config->License->SerialNumber);

		// Make some trivial modification to the configuration...
		// TODO

		// Re-serialize and submit to server
		$this->server->AdminMetaServerConfigSet(\Comet\ServerConfigOptions::createFromStdclass($config));

		// Wait for the server to come back online...
		$back_online = false;
		for ($i = 0; $i < 20; ++$i) { // max wait=10s
			try {
				$inf = $this->server->AdminMetaVersion();

				$back_online = true;
				break; // success
			} catch (\Exception $ex) {
				usleep(500000); // 500ms
				continue; // suppress
			}
		}
		$this->assertTrue($back_online, "Server failed to come back online after config modification");

		// Check that the server really did restart
		$this->assertGreaterThan($current_server_start_time, $this->server->AdminMetaVersion()->ServerStartTime);

		// Check if our trivial modification is still there
		// TODO
	}
	
}
