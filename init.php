<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Contains the 'portfolio' custom post type.  Contains custom taxonomies (categories and tags) and custom metabox, which are assigned to the post type.
 */
require_once plugin_dir_path( ZEROPLUGIN_DIR ) . 'assets/inc/cpts/custom-type.php';

/**
 * Contains the custom meta box.  Contains custom taxonomies (categories and tags) and custom metabox, which are assigned to the post type.
 */
require_once plugin_dir_path( ZEROPLUGIN_DIR ) . 'assets/inc/cpts/custom-metabox.php';