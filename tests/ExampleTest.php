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
		$this->assertTrue( self::sizeWithinRange(strlen($data), 20, 25), "Got size ".strlen($data)." for windows-anycpu-zip, expected 20-25 MB" );

		$data = $this->server->AdminBrandingGenerateClientWindowsX8632Zip();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 10, 15), "Got size ".strlen($data)." for windows-x86_32-zip, expected 10-15 MB" );

		$data = $this->server->AdminBrandingGenerateClientWindowsX8664Zip();
		$this->assertTrue( self::sizeWithinRange(strlen($data), 10, 15), "Got size ".strlen($data)." for windows-x86_64-zip, expected 10-15 MB" );

	}
	
}
