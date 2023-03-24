<?php

/**
 * Inserts custom post type
 * This adds a 'portfolio' post type to the site.  Information on creating custom post types can be found at 
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 */
function myTheme_customPost() {

  /**
   * @param array $labels Sets the text labels to appear in the post type.
   * A list of all available labels can be found at 
   * @link https://developer.wordpress.org/reference/functions/get_post_type_labels/
   * 
   * Those commented out can be safely removed, but are kept here for your reference.
   */
  $labels = array(
      'name'                  => _x( 'Portfolio', 'Post type general name', 'zero-theme' ),
      'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'zero-theme' ),
      'menu_name'             => _x( 'Portfolio', 'Admin Menu text', 'zero-theme' ),
      'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', 'zero-theme' ),
      'add_new'               => __( 'Add New', 'zero-theme' ),
      'add_new_item'          => __( 'Add New project', 'zero-theme' ),
      'new_item'              => __( 'New project', 'zero-theme' ),
      'edit_item'             => __( 'Edit project', 'zero-theme' ),
      'view_item'             => __( 'View project', 'zero-theme' ),
      'all_items'             => __( 'All projects', 'zero-theme' ),
      'search_items'          => __( 'Search projects', 'zero-theme' ),
      'parent_item_colon'     => __( 'Parent projects:', 'zero-theme' ),
      'not_found'             => __( 'No projects found.', 'zero-theme' ),
      'not_found_in_trash'    => __( 'No projects found in Trash.', 'zero-theme' ),
      // 'featured_image'        => _x( 'Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'zero-theme' ),
      // 'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'zero-theme' ),
      // 'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'zero-theme' ),
      // 'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'zero-theme' ),
      // 'archives'              => _x( 'Portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'zero-theme' ),
      // 'insert_into_item'      => _x( 'Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'zero-theme' ),
      // 'uploaded_to_this_item' => _x( 'Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'zero-theme' ),
      // 'filter_items_list'     => _x( 'Filter projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'zero-theme' ),
      // 'items_list_navigation' => _x( 'Portfolio list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'zero-theme' ),
      // 'items_list'            => _x( 'Portfolio list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'zero-theme' ),
  );

  /**
   * @param array $args Sets the parameters to register the post type
   * All acceptable parameters are listed here. 
   * 
   * Those commented out can be safely removed, but are kept here for your reference.
   */
  $args = array(
      'labels'                => $labels,
      'description'           => 'Custom post type for a portfolio. Can be used as a basis for your own custom post type.',
      'public'                => true, // Whether a post type is intended for use publicly. Boolean, options are 'true' or 'false'. Default option is false.
      'hierarchical'          => false, // Whether a post is hierarchical (i.e. has parent posts)
      'exclude_from_search'   => false, // Whether posts should be excluded from search results
      'publicly_queryable'    => true, // Whether the post type can be used in queries
      'show_ui'               => true, // Whether the wp-admin UI is required
      'show_in_menu'          => true, // Where to show the post type in the admin menu. To show, @param 'show_ui' must be true
      'show_in_nav_menus'     => true, // Makes this post type available for selection in navigation menus.
      'show_in_admin_bar'     => true, // Makes this post type available via the admin bar.
      'show_in_rest'          => true, // Whether to include in the REST API. Must be set to true if you wish to use the block editor
      // 'rest_base'             => 'portfolio', // To change the base URL of REST API route. Defaults to @param $post_type
      // 'rest_namespace'        => 'wp/v2', // To change the namespace URL of REST API route.
      // 'rest_controller_class' => 'WP_REST_Posts_Controller' // REST API controller class name.
      'menu_position'         => 20, // Where in the menu the post type should appear. To work, @param 'show_in_menu' must be true.
      // 'menu_icon'             => 'none', // Sets the URL of the icon. Defaults to the post icon. Use 'none' to leave div.wp-menu-image empty to add an icon via CSS
      'capability_type'       => 'post', // Used to build the read, edit, and delete capabilities.
      // 'map_meta_cap'          => false, // Whether to use the internal default meta capability handling.
      'supports'              => array( 'title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats' ), // Core feature(s) the post type supports. Add or remove as you require.
      'has_archive'           => 'portfolio', // Whether the post type has an archive. If this is a string, this will be the archive slug. E.g. the single slug may be 'project', but the archive slug could be 'portfolio'.
      'rewrite'               => array( // Triggers permalinks for the page.  Defaults to true, but can be set to false
                                  'slug'        => 'project', // Customises the slug to single posts
                                  'with_front'  => true, // Whether the posts should be prepended with WP_Rewrite::$front.
                                  'feeds'       => true, // Whether the feed URL should be generated for this post type. Defaults to $has_archive
                                  'pages'       => true // Whether posts should allow for pagination e.g. {post-url}/page/2/
                                 ),
      'query_var'             => true, // Sets the query_var key for this post type. Defaults to $post_type
      'can_export'            => true, // Whetther to allow the post type to be exported
      'delete_with_user'      => null // Sets whether posts should be deleted when deleting the user that created them.
  );
   
  /**
   * Registers the custom post type
   * 
   * @param string $post_type Sets the post type key. 20 characters max, lowercase alphanumeric (a-z, 0-9) characters, hyphens (-) and underscores (_) only.
   * $post_type key cannot be one of the default post type keys, which you can find on @link https://developer.wordpress.org/themes/basics/post-types/#default-post-types
   */
  register_post_type( 'portfolio', $args );
}
add_action( 'init', 'myTheme_customPost' );

/**
 * Create category-style taxonomy (hierarchical)
 */
function myTheme_customTag() {

  /**
   * @param array $labels Sets the text labels to appear in the taxonomy.
   * A list of all available labels can be found at @link https://developer.wordpress.org/reference/functions/register_taxonomy/#arguments
   */
	$labels = array(
		'name'                          => _x( 'Project Categories', 'Taxonomy general name', 'zero-theme' ),
		'singular_name'                 => _x( 'Project Category', 'Taxonomy singular name', 'zero-theme' ),
    'menu_name'                     => __( 'Project Categories', 'zero-theme' ),
		'all_items'                     => __( 'All Categories', 'zero-theme' ),
		'edit_item'                     => __( 'Edit Category', 'zero-theme' ),
		'view_item'                     => __( 'View Category', 'zero-theme' ),
		'update_item'                   => __( 'Update Category', 'zero-theme' ),
		'add_new_item'                  => __( 'Add New Category', 'zero-theme' ),
		'new_item_name'                 => __( 'New Category Name', 'zero-theme' ),
		'parent_item'                   => __( 'Parent Category', 'zero-theme' ),
		'parent_item_colon'             => __( 'Parent Category:', 'zero-theme' ),
		'search_items'                  => __( 'Search Categories', 'zero-theme' ),
    'not_found'                     => __( 'No categories found.', 'zero-theme' ),
    'back_to_items'                 => __( '← Back to categories', 'zero-theme' ),
	);

  /**
   * @param array $args Sets the parameters to register the post type
   * All acceptable parameters are listed here. Those commented out can be safely removed, but are kept here for your reference.
   */
	$args = array(
		'labels'                => $labels,
    'description'           => '',
    'public'                => true, // Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users.
    'publicly_queryable'    => true, // Whether the taxonomy is publicly queryable.
		'hierarchical'          => true, // Whether the taxonomy is hierarchical.
		'show_ui'               => true, // Whether to generate and allow a UI for managing terms in this taxonomy in the admin.
    'show_in_menu'          => true, // Whether to show the taxonomy in the admin menu.
    'show_in_nav_menus'     => true, // Makes this taxonomy available for selection in navigation menus.
    'show_in_rest'          => true, // Whether to include the taxonomy in the REST API. Set this to true for the taxonomy to be available in the block editor.
    // 'rest_base'             => '', // To change the base url of REST API route.
    // 'rest_namespace'        => 'wp/v2', // To change the namespace URL of REST API route.
    // 'rest_controller_class' => 'WP_REST_Terms_Controller', // REST API Controller class name.
    'show_tagcloud'         => true, // Whether to list the taxonomy in the Tag Cloud Widget controls.
    'show_in_quick_edit'    => true, // Whether to show the taxonomy in the quick/bulk edit panel.
    'show_admin_column'     => false, // Whether to display a column for the taxonomy on its post type listing screens.
    'meta_box_cb'           => null, // Provide a callback function for the meta box display.
    'meta_box_sanitize_cb'  => null, // Callback function for sanitizing taxonomy data saved from a meta box.
    // 'capabilities'          => '', // 
		'rewrite'               => array( // Triggers the handling of rewrites for this taxonomy.
                                'slug'          => 'project-cat', // Customize the permastruct slug.
                                'with_front'    => true, // Should the permastruct be prepended with WP_Rewrite::$front.
                                'hierarchical'  => false, // Either hierarchical rewrite tag or not.
                                'ep_mask'       => EP_NONE, // Assign an endpoint mask.
                              ),
    'query_var'             => true,
    // 'update_count_callback'   => '', // Works much like a hook, in that it will be called when the count is updated.
    'default_term'          => array( // Default term to be used for the taxonomy.
                                'name'        => '', // Name of default term.
                                'slug'        => '', // Slug for default term.
                                'description' => '', // Description for default term. 
                              ),
    'sort'                  => false, // Whether terms in this taxonomy should be sorted in the order they are provided to wp_set_object_terms().
    // 'args'                  => array(), // Array of arguments to automatically use inside wp_get_object_terms().
	);

  /**
   * Registers taxonomy and assigns it to custom post type
   * 
   * @param string $taxonomy Taxonomy key, must not exceed 32 characters and may only contain lowercase alphanumeric characters, dashes, and underscores.
   * @param array|string $object_type Sets the post types the taxonomy can be assigned to.
   * @param array|string $args Array or string of arguments to register taxonomy
   */
	register_taxonomy( 'projectcats', array( 'portfolio' ), $args );

}

/**
 * Create tag-style taxonomy (non-hierarchical)
 */
function myTheme_customTags() {

  /**
   * @param array $labels Sets the text labels to appear in the taxonomy.
   * A list of all available labels can be found at @link https://developer.wordpress.org/reference/functions/register_taxonomy/#arguments
   */
	$labels = array(
		'name'                          => _x( 'Project Tags', 'Taxonomy general name', 'zero-theme' ),
		'singular_name'                 => _x( 'Project Tag', 'Taxonomy singular name', 'zero-theme' ),
    'menu_name'                     => __( 'Project Tags', 'zero-theme' ),
		'all_items'                     => __( 'All Tags', 'zero-theme' ),
		'edit_item'                     => __( 'Edit Tag', 'zero-theme' ),
		'view_item'                     => __( 'View Tag', 'zero-theme' ),
		'update_item'                   => __( 'Update Tag', 'zero-theme' ),
		'add_new_item'                  => __( 'Add New Tag', 'zero-theme' ),
		'new_item_name'                 => __( 'New Tag Name', 'zero-theme' ),
		'parent_item'                   => __( 'Parent Tag', 'zero-theme' ),
		'parent_item_colon'             => __( 'Parent Tag:', 'zero-theme' ),
		'search_items'                  => __( 'Search Tags', 'zero-theme' ),
    'popular_items'                 => __( 'Popular Tags', 'zero-theme' ),
    'separate_items_with_commas'    => __( 'Separate tags with commas', 'zero-theme' ),
    'add_or_remove_items'           => __( 'Add or remove tags', 'zero-theme' ),
    'choose_from_most_used'         => __( 'Choose from the most used tags', 'zero-theme' ),
    'not_found'                     => __( 'No tags found.', 'zero-theme' ),
    'back_to_items'                 => __( '← Back to tags', 'zero-theme' ),
	);

  /**
   * @param array $args Sets the parameters to register the post type
   * All acceptable parameters are listed here. Those commented out can be safely removed, but are kept here for your reference.
   */
	$args = array(
		'labels'                => $labels,
    'description'           => '',
    'public'                => true, // Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users.
    'publicly_queryable'    => true, // Whether the taxonomy is publicly queryable.
		'hierarchical'          => false, // Whether the taxonomy is hierarchical.
		'show_ui'               => true, // Whether to generate and allow a UI for managing terms in this taxonomy in the admin.
    'show_in_menu'          => true, // Whether to show the taxonomy in the admin menu.
    'show_in_nav_menus'     => true, // Makes this taxonomy available for selection in navigation menus.
    'show_in_rest'          => true, // Whether to include the taxonomy in the REST API. Set this to true for the taxonomy to be available in the block editor.
    // 'rest_base'             => '', // To change the base url of REST API route.
    // 'rest_namespace'        => 'wp/v2', // To change the namespace URL of REST API route.
    // 'rest_controller_class' => 'WP_REST_Terms_Controller', // REST API Controller class name.
    'show_tagcloud'         => true, // Whether to list the taxonomy in the Tag Cloud Widget controls.
    'show_in_quick_edit'    => true, // Whether to show the taxonomy in the quick/bulk edit panel.
    'show_admin_column'     => false, // Whether to display a column for the taxonomy on its post type listing screens.
    'meta_box_cb'           => null, // Provide a callback function for the meta box display.
    'meta_box_sanitize_cb'  => null, // Callback function for sanitizing taxonomy data saved from a meta box.
    // 'capabilities'          => '', // 
		'rewrite'               => array( // Triggers the handling of rewrites for this taxonomy.
                                'slug'          => 'project-tag', // Customize the permastruct slug.
                                'with_front'    => true, // Should the permastruct be prepended with WP_Rewrite::$front.
                                'hierarchical'  => false, // Either hierarchical rewrite tag or not.
                                'ep_mask'       => EP_NONE, // Assign an endpoint mask.
                              ),
    'query_var'             => true,
    'update_count_callback'   => '_update_post_term_count', // Works much like a hook, in that it will be called when the count is updated.
    'default_term'          => array( // Default term to be used for the taxonomy.
                                'name'        => '', // Name of default term.
                                'slug'        => '', // Slug for default term.
                                'description' => '', // Description for default term. 
                              ),
    'sort'                  => false, // Whether terms in this taxonomy should be sorted in the order they are provided to wp_set_object_terms().
    // 'args'                  => array(), // Array of arguments to automatically use inside wp_get_object_terms().
	);

  /**
   * Registers taxonomy and assigns it to custom post type
   * 
   * @param string $taxonomy Taxonomy key, must not exceed 32 characters and may only contain lowercase alphanumeric characters, dashes, and underscores.
   * @param array|string $object_type Sets the post types the taxonomy can be assigned to.
   * @param array|string $args Array or string of arguments to register taxonomy
   */
	register_taxonomy( 'projecttags', array( 'portfolio' ), $args );

}


/**
 * 'Services' taxonomy, to demonstrate how it would appear on the site
 */
function myTheme_projectServices() {

  /**
   * @param array $labels Sets the text labels to appear in the taxonomy.
   * A list of all available labels can be found at @link https://developer.wordpress.org/reference/functions/register_taxonomy/#arguments
   */
	$labels = array(
		'name'                          => _x( 'Project Services', 'Taxonomy general name', 'zero-theme' ),
		'singular_name'                 => _x( 'Project Service', 'Taxonomy singular name', 'zero-theme' ),
    'menu_name'                     => __( 'Project Services', 'zero-theme' ),
		'all_items'                     => __( 'All Services', 'zero-theme' ),
		'edit_item'                     => __( 'Edit Service', 'zero-theme' ),
		'view_item'                     => __( 'View Service', 'zero-theme' ),
		'update_item'                   => __( 'Update Service', 'zero-theme' ),
		'add_new_item'                  => __( 'Add New Service', 'zero-theme' ),
		'new_item_name'                 => __( 'New Service Name', 'zero-theme' ),
		'parent_item'                   => __( 'Parent Service', 'zero-theme' ),
		'parent_item_colon'             => __( 'Parent Service:', 'zero-theme' ),
		'search_items'                  => __( 'Search Services', 'zero-theme' ),
    'not_found'                     => __( 'No services found.', 'zero-theme' ),
    'back_to_items'                 => __( '← Back to services', 'zero-theme' ),
	);

  /**
   * @param array $args Sets the parameters to register the post type
   * All acceptable parameters are listed here. Those commented out can be safely removed, but are kept here for your reference.
   */
	$args = array(
		'labels'                => $labels,
    'description'           => 'List of services that have been used for the project',
    'public'                => true, // Whether a taxonomy is intended for use publicly either via the admin interface or by front-end users.
    'publicly_queryable'    => true, // Whether the taxonomy is publicly queryable.
		'hierarchical'          => true, // Whether the taxonomy is hierarchical.
		'show_ui'               => true, // Whether to generate and allow a UI for managing terms in this taxonomy in the admin.
    'show_in_menu'          => true, // Whether to show the taxonomy in the admin menu.
    'show_in_nav_menus'     => false, // Makes this taxonomy available for selection in navigation menus.
    'show_in_rest'          => true, // Whether to include the taxonomy in the REST API. Set this to true for the taxonomy to be available in the block editor.
    'show_in_quick_edit'    => true, // Whether to show the taxonomy in the quick/bulk edit panel.
    'show_admin_column'     => true, // Whether to display a column for the taxonomy on its post type listing screens.
	);

  /**
   * Registers taxonomy and assigns it to custom post type
   * 
   * @param string $taxonomy Taxonomy key, must not exceed 32 characters and may only contain lowercase alphanumeric characters, dashes, and underscores.
   * @param array|string $object_type Sets the post types the taxonomy can be assigned to.
   * @param array|string $args Array or string of arguments to register taxonomy
   */
	register_taxonomy( 'project_services', array( 'portfolio' ), $args );

}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'myTheme_customTag', 0 );
add_action( 'init', 'myTheme_customTags', 0 );
add_action( 'init', 'myTheme_projectServices', 0 );

function myPlugin_postArchive_portfolio($archive_template){
  global $post;

  if (is_archive() && get_post_type($post) == 'portfolio'){
      $archive_template = ZEROPLUGIN_PATH . '/assets/inc/templates/archive-portfolio.php';
  }
  return $archive_template;
}
add_filter('archive_template', 'myPlugin_postArchive_portfolio');

function myPlugin_singlePost_portfolio( $template ) {
  global $post;

  if (get_post_type($post) == 'product' && locate_template( array( 'single-portfolio.php' ) ) !== $template ) {
      /*
       * This is a 'portfolio' post
       * AND a 'single portfolio template' is not found on
       * theme or child theme directories, so load it
       * from our plugin directory.
       */
      return ZEROPLUGIN_PATH . '/assets/inc/templates/single-portfolio.php';
  }

  return $template;
}
add_filter( 'single_template', 'myPlugin_singlePost_portfolio' );