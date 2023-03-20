<?php

add_action( 'tgmpa_register', 'ccdClient_theme_register_required_plugins' );

function ccdClient_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
      /*
		array(
			'name'               => 'Custom Extended', // The plugin name.
			'slug'               => 'cocode-xtended', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/cocode-xtended.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		), */
        array(
            'name'      => 'Cloudflare',
            'slug'      => 'cloudflare',
            'required'  => true,
        ),
        array(
            'name'      => 'Really Simple SSL',
            'slug'      => 'really-simple-ssl',
            'required'  => true,
        ),
        array(
            'name'      => 'Jetpack',
            'slug'      => 'jetpack',
            'required'  => true,
        ),
        array(
            'name'      => 'Akismet',
            'slug'      => 'akismet',
            'required'  => false,
        ),
        array(
            'name'      => 'Forminator',
            'slug'      => 'forminator',
            'required'  => false,
        ),
        array(
            'name'      => 'Intuitive Custom Post Order',
            'slug'      => 'intuitive-custom-post-order',
            'required'  => false,
        ),
        array(
            'name'      => 'Defender Security',
            'slug'      => 'defender-security',
            'required'  => false,
        ),
        array(
            'name'      => 'Hummingbird',
            'slug'      => 'hummingbird-performance',
            'required'  => false,
        ),
        array(
            'name'      => 'Smartcrawl SEO',
            'slug'      => 'smartcrawl-seo',
            'required'  => false,
        ),
        array(
            'name'      => 'The Events Calendar',
            'slug'      => 'the-events-calendar',
            'required'  => false,
        ),
        array(
            'name'      => 'Simple Job Board',
            'slug'      => 'simple-job-board',
            'required'  => false,
        ),
		array(
			'name'               => 'Ninja GDPR', // The plugin name.
			'slug'               => 'ninja-gdpr', // The plugin slug (typically the folder name).
			'source'             => 'https://updates.cocode.co.uk/plugins/ninja-gdpr.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		/*
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		), */

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'lvk-wp',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'plugins.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'lvk-wp' ),
			'menu_title'                      => __( 'Required Plugins', 'lvk-wp' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'lvk-wp' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'lvk-wp' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'lvk-wp' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'lvk-wp'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'lvk-wp'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'lvk-wp'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'lvk-wp'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'lvk-wp'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'lvk-wp'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'lvk-wp'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'lvk-wp'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'lvk-wp'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'lvk-wp' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'lvk-wp' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'lvk-wp' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'lvk-wp' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'lvk-wp' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'lvk-wp' ),
			'dismiss'                         => __( 'Dismiss this notice', 'lvk-wp' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'lvk-wp' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'lvk-wp' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
            */
		),
	);

	tgmpa( $plugins, $config );
}

?>