<?php
/**
 * Plugin Name: Tweaks for GeneratePress
 * Plugin URI:  https://dr7media.com/gptweaks
 * Description: Tweaks for GeneratePress. More menu colors, disable footer bar, add header and title color.
 * Version:     1.0.2
 * Author:      John Chapman
 * Author URI:  https://dr7media.com
 * Text Domain: gp-tweaks
 * Domain Path:
 * License:     GPL2
 */


// Get current active theme name.
$theme = wp_get_theme();

// Load Customizer Options if theme contains GeneratePress.
if (preg_match("/generatepress/i", $theme)) {

		require_once( 'gp-header.php' );
		require_once( 'gp-title-tag-line.php' );
		require_once( 'gp-menu.php' );
		require_once( 'gp-footer-bar.php' );
		require_once( 'gp-back-to-top.php' );

}
