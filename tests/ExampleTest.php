<?php

class ExampleTest extends \PHPUnit\Framework\TestCase {
	
	/**
	 * Server connection
	 *
	 * @var \Comet\Server
	 */
	protected $server = null;

	public function setUp(): void {
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
		
	protected function assertSizeWithinRange($size, $low_bound_mb, $high_bound_mb, $name='') {
		$error_desc = "${name}: Got size {$size}, expected in ${low_bound_mb} - ${high_bound_mb} MB range";

		$this->assertGreaterThanOrEqual($low_bound_mb * 1024*1024, $size, $error_desc);
		$this->assertLessThanOrEqual($high_bound_mb * 1024*1024, $size, $error_desc);
	}

	public function testDownloadClient() {
		// The download APIs return the generated client software.
		// Assert that the clients have (roughly) the right expected filesize
		// The first time running this test will be a little slow as the software is generated; successive tests on the
		// same running server instance should be faster

		$data = $this->server->AdminBrandingGenerateClientLinuxgeneric();
		$this->assertSizeWithinRange(strlen($data), 25, 40, 'linux-generic');

		$data = $this->server->AdminBrandingGenerateClientMacosX8664();
		$this->assertSizeWithinRange(strlen($data), 15, 30, 'macos-x86_64');

		$data = $this->server->AdminBrandingGenerateClientWindowsAnycpuZip();
		$this->assertSizeWithinRange(strlen($data), 30, 50, 'windows-anycpu-zip');

		$data = $this->server->AdminBrandingGenerateClientWindowsX8632Zip();
		$this->assertSizeWithinRange(strlen($data), 15, 25, 'windows-x86_32-zip');

		$data = $this->server->AdminBrandingGenerateClientWindowsX8664Zip();
		$this->assertSizeWithinRange(strlen($data), 15, 25, 'windows-x86_64-zip');
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
				if ($inf->ServerStartTime === $current_server_start_time) {
					// The server hasn't restarted yet	
					usleep(500000); // 500ms
					continue; // suppress
				}

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

	public function testOtherLanguage() {
		$unknown_username = "comet-test-unknown-user-".time();

		$this->server->setLanguage('en_US');

		try {
			$userpc = $this->server->AdminGetUserProfile($unknown_username);
			$this->fail("Shouldn't reach this");
		} catch (\Exception $e) {
			$this->assertEquals(400, $e->getCode(), "getCode for en_US");
			$this->assertEquals("Error 400: User not found", $e->getMessage());
		}

		$this->server->setLanguage('es_ES');
		
		try {
			$userpc = $this->server->AdminGetUserProfile($unknown_username);
			$this->fail("Shouldn't reach this");
		} catch (\Exception $e) {
			$this->assertEquals(400, $e->getCode(), "getCode for es_ES");
			$this->assertEquals("Error 400: Usuario no encontrado", $e->getMessage());
		}

		// Revert back
		$this->server->setLanguage('en_US');
	}

	public function testMultipartResource() {
		// The AdminMetaResourceNew API uses a multipart submission body instead of a
		// regular form body. Test that we can round-trip a binary resource

		$resource_content = "comet-test-resource-content-".time();

		$props = $this->server->AdminMetaResourceNew($resource_content);

		$result = $this->server->AdminMetaResourceGet($props->ResourceHash);

		$this->assertEquals($resource_content, $result);
	}
	
}
