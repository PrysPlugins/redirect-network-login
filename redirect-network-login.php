<?php
/**
 * Plugin Name: Redirect Network Login
 * Plugin URI: https://github.com/JCPry/redirect-network-login
 * Description: Redirect the <pre>wp-login.php</pre> form of sub-sites to the main site login form
 * Version: 1.0
 * Author: Jeremy Pry
 * Author URI: http://jeremypry.com/
 * Network: true
 * License: GPL2
 */

// Prevent direct access to this file
if ( ! defined( 'ABSPATH' ) ) {
	die( 'You can\'t do anything by accessing this file directly.' );
}

// This plugin isn't any good on single sites
if ( ! is_multisite() ) {
	return;
}

add_action( 'login_init', 'jpry_redirect_network_login' );
/**
 * Redirect sub-site login pages to the primary site login page
 *
 * @since 1.0
 */
function jpry_redirect_network_login() {
	if ( ! is_main_site() ) {
		$params = array();
                $pf = "";
		
		if(count($_GET) > 0){
		  $pf = "?" . http_build_query($_GET);
		}
		wp_redirect( get_site_url( 1, 'wp-login.php', 'login' ).$pf, 301 );
		exit;
	}
}
