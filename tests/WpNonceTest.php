<?php

namespace wpnonce;

/**
 * Wordpress nonce test
 *
 * @covers wp_nonce
 */
class wp_nonce_test extends TestCase {

	public function testCreation() {
		WpNonce::__construct();
		$this->assertEquals('_wpnone', WpNonce::getNonceField());
	 }

	public function testCreateNonce() {
		WpNonce::createNonce('action1');
		$this->assetNotEmpty(WpNonce::getNonce());
		$this->assertEquals('action1', WpNonce::getAction());
	}

	public function testVerifyNonce() {
		WpNonce::verifyNonce('nonce1', 'action1');
		$this->assertEquals('nonce1', WpNonce::getNonce());
		$this->assertEquals('action1', WpNonce::getAction());
	}

	public function testNonceField() {
		$this->assertNotEmpty(WpNonce::nonceField('action1', 'field1'));
		$this->assertEquals('action1', WpNonce::getAction());
		$this->assertEquals('field1', WpNonce::getNonceField());
	}

	public function testNonceUrl() {
		$this->assertNotEmpty(WpNonce::nonceurl('action1', 'field1'));
		$this->assertEquals('action1', WpNonce::getAction());
		$this->assertEquals('field1', WpNonce::getNonceField());
	}

	public function testRefererField() {
		$this->assertNotEmpty(WpNonce::refererField());
	}
}
