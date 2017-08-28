# Wordpress nonce OOP style interface

This package provides an OOP style interface to the Wordpress nonce functions (wp_nonce_*).

The following nonce functions are covered:

- createNonce -> wp_create_nonce
- verifyNonce -> wp_verify_nonce
- nonceUrl -> wp_nonce_url
- nonceField -> wp_nonce_field
- refererField -> wp_referer_field
- checkAdminReferer -> check_admin_referer

Other functions are:

- getAction
- setAction
- getNonceField
- setNonceField
- getNonce

_action_ and _nonce field_ can be supplied as parameter to their respective nonce functions or set explicitly. When not supplied to nonce functions the last stored value will be taken. When supplied to nonce functions the stored value will be updated.
