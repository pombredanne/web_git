<?php
/*
Plugin Name:WP-Syntax Button
Plugin URI: http://www.blogoolic.fr/wp-syntax-button
Description: A plugin based on Nick Remeslennikov's CodeColorer TinyMCE Button that provides a button for WP-Syntax in TinyMCE editor. 
Version: 0.1 
Author: Olivier Cecillon
Author URI:  http://olivier.cecillon.fr
*/
function wpsb_addbuttons() {
	// Add only in Rich Editor mode
	if ( get_user_option('rich_editing') == 'true') {
	// add the button for wp25 in a new way
		add_filter("mce_external_plugins", "add_wpsb_tinymce_plugin", 5);
		add_filter('mce_buttons', 'register_wpsb_button', 5);
	}
}

// used to insert button in wordpress 2.5x editor
function register_wpsb_button($buttons) {
	array_push($buttons, "separator", "wpsb");
	return $buttons;
}

// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
function add_wpsb_tinymce_plugin($plugin_array) {
	$plugin_array['wpsb'] = get_option('siteurl').'/wp-content/plugins/wp-syntax-button/editor_plugin.js';	
	return $plugin_array;
}

function wpsb_mce_valid_elements($init) {
	if ( isset( $init['extended_valid_elements'] ) 
	&& ! empty( $init['extended_valid_elements'] ) ) {
		$init['extended_valid_elements'] .= ',' . 'pre[lang|line|escaped]';
	} else {
		$init['extended_valid_elements'] = 'pre[lang|line|escaped]';
	}
	return $init;
}

function wpsb_change_tinymce_version($version) {
	return ++$version;
}
// Add pre as a valid element to TinyMCE with lang and line arguments
add_filter('tiny_mce_before_init', 'wpsb_mce_valid_elements', 0);
// Modify the version when tinyMCE plugins are changed.
add_filter('tiny_mce_version', 'wpsb_change_tinymce_version');
// init process for button control
add_action('init', 'wpsb_addbuttons');

?>
