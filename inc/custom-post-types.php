<?php

add_action( 'init', 'interfolio_custom_post_types', 0 );

function interfolio_custom_post_types() {
    register_client_post_type();
    register_open_position_post_type();
    register_products_post_type();
    register_team_member_post_type();
	register_resource_post_type();
	register_news_and_events_post_type();
	register_landing_post_type();
}

function register_client_post_type() {

    $labels = [
        'name'                => _x( 'Clients', 'Post Type General Name', 'interfolio' ),
        'singular_name'       => _x( 'Client', 'Post Type Singular Name', 'interfolio' ),
        'menu_name'           => __( 'Clients', 'interfolio' ),
        'parent_item_colon'   => __( 'Parent Client', 'interfolio' ),
        'all_items'           => __( 'All Clients', 'interfolio' ),
        'view_item'           => __( 'View Client', 'interfolio' ),
        'add_new_item'        => __( 'Add New Client', 'interfolio' ),
        'add_new'             => __( 'Add New', 'interfolio' ),
        'edit_item'           => __( 'Edit Client', 'interfolio' ),
        'update_item'         => __( 'Update Client', 'interfolio' ),
        'search_items'        => __( 'Search Clients', 'interfolio' ),
        'not_found'           => __( 'Not Found', 'interfolio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'interfolio' ),
	];

	$rewrite = [
		'slug'                  => 'clients',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    ];

    $args = [
        'label'               => __( 'Client', 'interfolio' ),
        'description'         => __( 'Client information', 'interfolio' ),
        'labels'              => $labels,
        'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ],
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'taxonomies' 		  => ['post_tag'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'		  => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
    ];

    register_post_type( 'inf_client_single', $args );
}

function register_open_position_post_type() {

    $labels = [
        'name'                => _x( 'Open Positions', 'Post Type General Name', 'interfolio' ),
        'singular_name'       => _x( 'Open Position', 'Post Type Singular Name', 'interfolio' ),
        'menu_name'           => __( 'Open Positions', 'interfolio' ),
        'parent_item_colon'   => __( 'Parent Open Position', 'interfolio' ),
        'all_items'           => __( 'All Open Positions', 'interfolio' ),
        'view_item'           => __( 'View Open Position', 'interfolio' ),
        'add_new_item'        => __( 'Add New Open Position', 'interfolio' ),
        'add_new'             => __( 'Add New', 'interfolio' ),
        'edit_item'           => __( 'Edit Open Position', 'interfolio' ),
        'update_item'         => __( 'Update Open Position', 'interfolio' ),
        'search_items'        => __( 'Search Open Positions', 'interfolio' ),
        'not_found'           => __( 'Not Found', 'interfolio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'interfolio' ),
	];

	$rewrite = [
		'slug'                  => 'open-positions',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    ];

    $args = [
        'label'               => __( 'Open Position', 'interfolio' ),
        'description'         => __( 'Open Position information', 'interfolio' ),
        'labels'              => $labels,
        'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ],
        'taxonomies' 		  => ['post_tag'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'		  => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
    ];

    register_post_type( 'inf_open_position', $args );
}

function register_products_post_type() {

	$labels = [
		'name'                  => _x( 'Products', 'Post Type General Name', 'interfolio' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'interfolio' ),
		'menu_name'             => __( 'Products', 'interfolio' ),
		'name_admin_bar'        => __( 'Product', 'interfolio' ),
		'archives'              => __( 'Product Archives', 'interfolio' ),
		'parent_item_colon'     => __( 'Parent Product:', 'interfolio' ),
		'all_items'             => __( 'All Products', 'interfolio' ),
		'add_new_item'          => __( 'Add New Products', 'interfolio' ),
		'add_new'               => __( 'Add New', 'interfolio' ),
		'new_item'              => __( 'New Product', 'interfolio' ),
		'edit_item'             => __( 'Edit Product', 'interfolio' ),
		'update_item'           => __( 'Update Product', 'interfolio' ),
		'view_item'             => __( 'View Product', 'interfolio' ),
		'search_items'          => __( 'Search Product', 'interfolio' ),
		'not_found'             => __( 'Not found', 'interfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'interfolio' ),
		'featured_image'        => __( 'Featured Image', 'interfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'interfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'interfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'interfolio' ),
		'insert_into_item'      => __( 'Insert into Product', 'interfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Product', 'interfolio' ),
		'items_list'            => __( 'Products list', 'interfolio' ),
		'items_list_navigation' => __( 'Products list navigation', 'interfolio' ),
		'filter_items_list'     => __( 'Filter Products list', 'interfolio' ),
    ];

	$rewrite = [
		'slug'                  => 'products',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    ];

	$args = [
		'label'                 => __( 'Product', 'interfolio' ),
		'description'           => __( 'Product Description', 'interfolio' ),
		'labels'                => $labels,
		'supports'              => ['title', 'thumbnail', 'excerpt', 'editor', 'revisions', 'custom-fields', 'page-attributes','post-formats'],
		'taxonomies' 		    => ['post_tag'],
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'		  	=> true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-exerpt-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
    ];
	register_post_type( 'inf_product_single', $args );

}

function register_team_member_post_type() {

	$labels = [
		'name'                  => _x( 'Team Members', 'Post Type General Name', 'interfolio' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'interfolio' ),
		'menu_name'             => __( 'Team Members', 'interfolio' ),
		'name_admin_bar'        => __( 'Team Member', 'interfolio' ),
		'archives'              => __( 'Team Member Archives', 'interfolio' ),
		'parent_item_colon'     => __( 'Parent Team Member:', 'interfolio' ),
		'all_items'             => __( 'All Team Members', 'interfolio' ),
		'add_new_item'          => __( 'Add New Team Member', 'interfolio' ),
		'add_new'               => __( 'Add New', 'interfolio' ),
		'new_item'              => __( 'New Team Member', 'interfolio' ),
		'edit_item'             => __( 'Edit Team Member', 'interfolio' ),
		'update_item'           => __( 'Update Team Member', 'interfolio' ),
		'view_item'             => __( 'View Team Member', 'interfolio' ),
		'search_items'          => __( 'Search Team Member', 'interfolio' ),
		'not_found'             => __( 'Not found', 'interfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'interfolio' ),
		'featured_image'        => __( 'Featured Image', 'interfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'interfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'interfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'interfolio' ),
		'insert_into_item'      => __( 'Insert into Team Member', 'interfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Team Member', 'interfolio' ),
		'items_list'            => __( 'Team Members list', 'interfolio' ),
		'items_list_navigation' => __( 'Team Members list navigation', 'interfolio' ),
		'filter_items_list'     => __( 'Filter Team Members list', 'interfolio' ),
    ];

	$rewrite = [
		'slug'                  => 'team',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    ];

	$args = [
		'label'                 => __( 'Team Member', 'interfolio' ),
		'description'           => __( 'Team Member Description', 'interfolio' ),
		'labels'                => $labels,
		'supports'              => ['title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes','post-formats'],
		'taxonomies' 		    => ['post_tag'],
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'		  	=> true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
    ];

	register_post_type( 'inf_team_member', $args );
}

function register_resource_post_type() {

	$labels = [
		'name'                  => _x( 'Resources', 'Post Type General Name', 'interfolio' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'interfolio' ),
		'menu_name'             => __( 'Resources', 'interfolio' ),
		'name_admin_bar'        => __( 'Resource', 'interfolio' ),
		'archives'              => __( 'Resource Archives', 'interfolio' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'interfolio' ),
		'all_items'             => __( 'All Resources', 'interfolio' ),
		'add_new_item'          => __( 'Add New Resource', 'interfolio' ),
		'add_new'               => __( 'Add New', 'interfolio' ),
		'new_item'              => __( 'New Resource', 'interfolio' ),
		'edit_item'             => __( 'Edit Resource', 'interfolio' ),
		'update_item'           => __( 'Update Resource', 'interfolio' ),
		'view_item'             => __( 'View Resource', 'interfolio' ),
		'search_items'          => __( 'Search Resource', 'interfolio' ),
		'not_found'             => __( 'Not found', 'interfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'interfolio' ),
		'featured_image'        => __( 'Featured Image', 'interfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'interfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'interfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'interfolio' ),
		'insert_into_item'      => __( 'Insert into Resource', 'interfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'interfolio' ),
		'items_list'            => __( 'Resources list', 'interfolio' ),
		'items_list_navigation' => __( 'Resources list navigation', 'interfolio' ),
		'filter_items_list'     => __( 'Filter Resources list', 'interfolio' ),
    ];

	$rewrite = array(
		'slug'                  => 'resources',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    );

	$args = [
		'label'                 => __( 'Resources', 'interfolio' ),
		'description'           => __( 'Resources Description', 'interfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'editor','revisions', 'custom-fields', 'page-attributes','post-formats', 'thumbnail' ),
		'taxonomies' 		    => ['post_tag'],
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'		  	=> true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-media-spreadsheet',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'cptp_permalink_structure' => '%inf_resources%/%postname%'
    ];

	register_post_type( 'inf_resource_single', $args );
}

function register_news_and_events_post_type() {

	$labels = [
		'name'                  => _x( 'News and Events', 'Post Type General Name', 'interfolio' ),
		'singular_name'         => _x( 'News and Events Post', 'Post Type Singular Name', 'interfolio' ),
		'menu_name'             => __( 'News and Events', 'interfolio' ),
		'name_admin_bar'        => __( 'News and Events Post', 'interfolio' ),
		'archives'              => __( 'News and Events Archives', 'interfolio' ),
		'parent_item_colon'     => __( 'Parent News and Events Post:', 'interfolio' ),
		'all_items'             => __( 'All News and Events', 'interfolio' ),
		'add_new_item'          => __( 'Add New News and Events Post', 'interfolio' ),
		'add_new'               => __( 'Add New', 'interfolio' ),
		'new_item'              => __( 'New News and Events Post', 'interfolio' ),
		'edit_item'             => __( 'Edit News and Events Post', 'interfolio' ),
		'update_item'           => __( 'Update News and Events Post', 'interfolio' ),
		'view_item'             => __( 'View News and Events Post', 'interfolio' ),
		'search_items'          => __( 'Search News and Events Post', 'interfolio' ),
		'not_found'             => __( 'Not found', 'interfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'interfolio' ),
		'featured_image'        => __( 'Featured Image', 'interfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'interfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'interfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'interfolio' ),
		'insert_into_item'      => __( 'Insert into News and Events Post', 'interfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this News and Events Post', 'interfolio' ),
		'items_list'            => __( 'News and Events list', 'interfolio' ),
		'items_list_navigation' => __( 'News and Events list navigation', 'interfolio' ),
		'filter_items_list'     => __( 'Filter News and Events list', 'interfolio' ),
    ];

	$rewrite = array(
		'slug'                  => 'news-and-events',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    );

	$args = [
		'label'                 => __( 'News and Events', 'interfolio' ),
		'description'           => __( 'News and Events Description', 'interfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'revisions', 'custom-fields', 'page-attributes','post-formats', 'thumbnail' ),
		'taxonomies' 		    => ['post_tag'],
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'		  	=> true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'news_and_events',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'cptp_permalink_structure' => '%inf_news_and_events_categories%/%postname%'
    ];

	register_post_type( 'inf_news_and_events', $args );
}

function register_landing_post_type() {

    $labels = [
        'name'                => _x( 'Landing', 'Post Type General Name', 'interfolio' ),
        'singular_name'       => _x( 'Landing', 'Post Type Singular Name', 'interfolio' ),
        'menu_name'           => __( 'Landings', 'interfolio' ),
        'parent_item_colon'   => __( 'Parent Landing', 'interfolio' ),
        'all_items'           => __( 'All Landings', 'interfolio' ),
        'view_item'           => __( 'View Landing', 'interfolio' ),
        'add_new_item'        => __( 'Add New Landing', 'interfolio' ),
        'add_new'             => __( 'Add New', 'interfolio' ),
        'edit_item'           => __( 'Edit Landing', 'interfolio' ),
        'update_item'         => __( 'Update Landing', 'interfolio' ),
        'search_items'        => __( 'Search Landing', 'interfolio' ),
        'not_found'           => __( 'Not Found', 'interfolio' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'interfolio' ),
	];

	$rewrite = [
		'slug'                  => 'landing',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
    ];

    $args = [
        'label'               => __( 'Landing', 'interfolio' ),
        'description'         => __( 'Landing information', 'interfolio' ),
        'labels'              => $labels,
        'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields' ],
		'menu_icon'           => 'dashicons-welcome-widgets-menus',
		'taxonomies' 		  => ['post_tag'],
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_rest'		  => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
    ];

    register_post_type( 'inf_landing_single', $args );
}