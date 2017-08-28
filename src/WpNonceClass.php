<?php

namespace wpnonce;

/**
 * Wordpress nonce class
 *
 * OOP style interface to wp_nonce_* functions
 * Prefix wp_ is for convenience omitted from function names
 */
class WpNonce implements WpNonceInterface {

	private $nonceName = '';
	private $action = '';
	private $nonce = '';


    /**
    * Constructor
    *
    * @param - string - name
    */
	function __construct($name='_wpnonce') {
		$this->nonceName = $name;
	}

    /**
    * Create nonce
    *
    * @param - string - action
    *
    * @return - string/boolean - nonce / false on error
    */
	public function createNonce($action='') {
		if ($action !== '') { $this->action = $action; }
		if ($this->action === '') { return false; }

    	$this->nonce = wp_create_nonce($this->action);

		return $this->nonce;
	}

    /**
    * Verify nonce
    *
    * @param - string - nonce
    * @param - string - action
    *
    * @return - boolean - nonce is valid / invalid
    */
	public function verifyNonce($nonce='', $action='') {
		if ($nonce !== '') { $this->nonce = $nonce; }
		if ($action !== '') { $this->action = $action; }

		return wp_verify_nonce($this->nonce, $this->action) === false ? false : true;
	}

    /**
    * Nonce field
    *
    * @param - string - action
    * @param - string - name nonce field
    * @param - boolean - $referer - If referrer should be place
    * @param - boolean - $return - true -> Echo the input field
    *                            false -> Return the input field
    *
    * @return - string - nonce (& referer) hidden fields
    */
    public function nonceField($action='', $name='', $referer=false, $echo=true) {
		if ($action !== '') { $this->action = $action; }
		if ($name !== '') { $this->nonceField = $name; }

		return wp_nonce_field($this->action, $this->nonceField, $referer, $echo);
    }

    /**
    * Nonce url
    *
    * Add nonce to url
    *
    * @param - string - actionurl to add nonce to
    * @param - string - action
    * @param - string - name nonce field
    *
    * @return - string - url with nonce
    **/
    public function nonceUrl($actionurl, $action='', $name='') {
		if ($action !== '') { $this->action = $action; }
		if ($name !== '') { $this->nonceField = $name; }

		return wp_nonce_url($actionurl, $this->action, $this->nonceField);
    }

    /**
    * Referer field
    *
    * @param - boolean - true, display - false, return referer
    *
    * @return - string - referer field
    */
    public function refererField($echo=true) {
		return wp_referer_field($echo);
    }

    /**
    * Nonce ays
    *
    * "Are you sure"
    *
    * @param - string - action
    **/
    public function nonceAys($action='') {
		if ($action !== '') { $this->action = $action; }

		return wp_nonce_ays($this->action);
    }

    /**
    * Check admin referer
    *
    * @param - string - action
    * @param - string - name nonce field
    *
    * @return - string - url with nonce
    **/
    public function checkAdminReferer($action='', $query_arg='') {
		if ($action !== '') { $this->action = $action; }
		if ($query_arg !== '') { $this->nonceField = $query_arg; }

		return check_admin_referer($this->action, $this->nonceField);
    }


    /**
    * Get nonce action
    *
    * @return - string - action
    **/
    public function getNonceAction() {
		return $this->action;
    }

    /**
    * Set nonce action
    *
    * @param - string - action
    */
    public function setNonceAction($action) {
        $this->action = $action;
    }

    /**
    * Get name nonce field
    *
    * @return - string - name nonce field
    **/
    public function getNonceField() {
		return $this->nonceField;
    }

    /**
    * Set name nonce field
    *
    * @param - string - name nonce field
    */
    public function setNonceField($name) {
		$this->nonceField = $name;
    }

    /**
    * Get nonce
    *
    * @return - string - nonce
    **/
    public function getNonce() {
		return $this->nonce;
    }
}
