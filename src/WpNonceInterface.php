<?php

namespace wpnonce;

/**
 * Wordpress nonce - interface
 *
 * For convenience, the prefix wp_ has been omitted from the OOP methods
 *
 */
interface WpNonceInterface {

	public function nonceAys($action);

	public function nonceField($action, $name, $referer, $echo);

	public function nonceUrl($actionurl, $action, $name);

	public function verifyNonce($nonce, $action);

	public function createNonce($action);

	public function refererField($echo);

	public function checkAdminReferer($action, $query_arg);

	}
