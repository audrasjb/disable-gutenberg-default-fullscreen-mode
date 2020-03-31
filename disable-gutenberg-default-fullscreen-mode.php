<?php
/*
Plugin Name: Disable Block Editor Default Fullscreen Mode
Plugin URI: https://jeanbaptisteaudras.com
Description: Disable WordPress 5.4 default Fullscreen mode.
Version: 0.1
Requires at least: 5.3
Requires PHP: 5.6
Tested up to: 5.3
Author: Jb Audras
Author URI: https://jeanbaptisteaudras.com
Contributors: audrasjb, whodunitagency
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: disable-block-editor-fullscreen-mode
*/

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Invalid request.' );
}


/**
 * Enqueue script
 */
function dbefm_disable_editor_fullscreen_by_default() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'dbefm_disable_editor_fullscreen_by_default' );

