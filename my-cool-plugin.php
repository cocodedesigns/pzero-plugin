<?php
/**
 * Project Zero Plugin
 * @package WordPress
 * @subpackage Project_Zero
 *
 * Plugin Name:         Avandra (Project Zero Plugin)
 * Plugin URI:          https://github.com/{USER-NAME}/{REPO-NAME}/
 * Description:         A blank plugin developed for budding WordPress plugin developers. You can use this as a starting point for all of your plugins. The plugin goes under the name of "Avandra", after the Changebringer deity from Dungeons and Dragons.  She has been used in the liveplay stream Critical Role and is the Goddess of freedom, adventure, and luck.  Since plugins allow you the freedom to build your WordPress site as you see fit, it seems like she would be the best deity to name this plugin after.
 * Version:             0.1
 * Requires at least:   5.0
 * Tested up to:        6.1.1
 * Requires PHP:        7.4
 * License:             General Public License v3 or later
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 * Author:              Nathan Hawkes
 * Author URI:          https://www.nathanhawkes.co.uk/
 * Text Domain:         {REPO-NAME}
 */

// Call Plugin Update Checker
require plugin_dir_path( __FILE__ ) . 'updater/ptuc/plugin-update-checker.php';

// Check for updates to theme
use YahnisElsts\PluginUpdateChecker\v5p0\PucFactory;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Set constants
 */
define( 'ZEROPLUGIN_DIR', __FILE__ );
define( 'ZEROPLUGIN_PATH', plugin_dir_path( ZEROPLUGIN_DIR ) );
define( 'ZEROPLUGIN_URL', plugins_url( '/', ZEROPLUGIN_DIR ) );

/**
 * Call init.php
 */
include_once plugin_dir_path( ZEROPLUGIN_DIR ) . 'init.php';

/**
 * Plugin Update script (fired on is_admin only)
 */
if ( is_admin() ){

    if( !function_exists('get_plugin_data') ){
        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    }

    $zeroplugin = get_plugin_data( ZEROPLUGIN_DIR );

    $checkPlugin = PucFactory::buildUpdateChecker(
        $zeroplugin['PluginURI'],
        ZEROPLUGIN_DIR,
        $zeroplugin['TextDomain']
    );
    // Enables releases via GitHub
    // $checkPlugin->getVcsApi()->enableReleaseAssets();
    $checkPlugin->addResultFilter( function( $info, $response = null ) {
        // Add icons for Dashboard > Updates screen.
        $info->icons = array(
            '1x' => plugins_url( '/assets/icon-128x128.png', ZEROPLUGIN_DIR ),
            '2x' => plugins_url( '/assets/icon-256x256.png', ZEROPLUGIN_DIR ),
        );
        $info->banners = array(
            'low' => plugins_url( '/assets/banner-772x250.png', ZEROPLUGIN_DIR ),
            'high' => plugins_url( '/assets/banner-1544x500.png', ZEROPLUGIN_DIR ),
        );
        return $info;
    });
    
}