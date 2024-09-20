<?php

add_action('init', 'interfolio_custom_taxonomies', 0);

function interfolio_custom_taxonomies(){
	register_client_type_taxonomy();
	register_product_type_taxonomy();
    register_departments_taxonomy();
    register_teams_taxonomy();
    register_timeline_taxonomy();
	register_resource_categories_taxonomy();
	register_news_and_events_categories_taxonomy();
}

function register_client_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Client Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Client Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Client Types', 'text_domain' ),
		'all_items'                  => __( 'All Client Types', 'text_domain' ),
		'parent_item'                => __( 'Client Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Client Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Client Type', 'text_domain' ),
		'add_new_item'               => __( 'Add New Client Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Client Type', 'text_domain' ),
		'update_item'                => __( 'Update Client Type', 'text_domain' ),
		'view_item'                  => __( 'View Client Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate client_type with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove client_types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used client_types', 'text_domain' ),
		'popular_items'              => __( 'Popular Client Types', 'text_domain' ),
		'search_items'               => __( 'Search client_types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No client_types', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'inf_client_types', array( 'inf_client_single' ), $args );
}

function register_product_type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Product Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Product Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Product Types', 'text_domain' ),
		'all_items'                  => __( 'All Product Types', 'text_domain' ),
		'parent_item'                => __( 'Product Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Product Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Product Type', 'text_domain' ),
		'add_new_item'               => __( 'Add New Product Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Product Type', 'text_domain' ),
		'update_item'                => __( 'Update Product Type', 'text_domain' ),
		'view_item'                  => __( 'View Product Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate product types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove product types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used product types', 'text_domain' ),
		'popular_items'              => __( 'Popular Product Types', 'text_domain' ),
		'search_items'               => __( 'Search product types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No product types', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'inf_product_types', array( 'inf_product_single' ), $args );
}

function register_departments_taxonomy() {
   
	$labels = array(
		'name'                       => _x( 'Departments', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Department', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Departments', 'text_domain' ),
		'all_items'                  => __( 'All Departments', 'text_domain' ),
		'parent_item'                => __( 'Department', 'text_domain' ),
		'parent_item_colon'          => __( 'Department:', 'text_domain' ),
		'new_item_name'              => __( 'New Department', 'text_domain' ),
		'add_new_item'               => __( 'Add New Department', 'text_domain' ),
		'edit_item'                  => __( 'Edit Department', 'text_domain' ),
		'update_item'                => __( 'Update Department', 'text_domain' ),
		'view_item'                  => __( 'View Department', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate departments with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove departments', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used departments', 'text_domain' ),
		'popular_items'              => __( 'Popular Departments', 'text_domain' ),
		'search_items'               => __( 'Search departments', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No departments', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'inf_departments', array( 'inf_open_position' ), $args );
}

function register_teams_taxonomy() {

	$labels = [
		'name'                       => _x( 'Teams', 'Taxonomy General Name', 'interfolio' ),
		'singular_name'              => _x( 'Team', 'Taxonomy Singular Name', 'interfolio' ),
		'menu_name'                  => __( 'Teams', 'interfolio' ),
		'all_items'                  => __( 'All Teams', 'interfolio' ),
		'parent_item'                => __( 'Team', 'interfolio' ),
		'parent_item_colon'          => __( 'Team:', 'interfolio' ),
		'new_item_name'              => __( 'New Team', 'interfolio' ),
		'add_new_item'               => __( 'Add New Team', 'interfolio' ),
		'edit_item'                  => __( 'Edit Team', 'interfolio' ),
		'update_item'                => __( 'Update Team', 'interfolio' ),
		'view_item'                  => __( 'View Team', 'interfolio' ),
		'separate_items_with_commas' => __( 'Separate team with commas', 'interfolio' ),
		'add_or_remove_items'        => __( 'Add or remove teams', 'interfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used teams', 'interfolio' ),
		'popular_items'              => __( 'Popular Teams', 'interfolio' ),
		'search_items'               => __( 'Search teams', 'interfolio' ),
		'not_found'                  => __( 'Not Found', 'interfolio' ),
		'no_terms'                   => __( 'No teams', 'interfolio' ),
		'items_list'                 => __( 'Items list', 'interfolio' ),
		'items_list_navigation'      => __( 'Items list navigation', 'interfolio' ),
    ];

	register_taxonomy( 'inf_teams', ['inf_team_member'], [
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
    ]);
}

function register_timeline_taxonomy() {

	$labels = [
		'name'                       => _x( 'Timeline', 'Taxonomy General Name', 'interfolio' ),
		'singular_name'              => _x( 'Year', 'Taxonomy Singular Name', 'interfolio' ),
		'menu_name'                  => __( 'Timeline Years', 'interfolio' ),
		'all_items'                  => __( 'All Years', 'interfolio' ),
		'parent_item'                => __( 'Year', 'interfolio' ),
		'parent_item_colon'          => __( 'Year:', 'interfolio' ),
		'new_item_name'              => __( 'New Year', 'interfolio' ),
		'add_new_item'               => __( 'Add New Year', 'interfolio' ),
		'edit_item'                  => __( 'Edit Year', 'interfolio' ),
		'update_item'                => __( 'Update Year', 'interfolio' ),
		'view_item'                  => __( 'View Year', 'interfolio' ),
		'separate_items_with_commas' => __( 'Separate Year with commas', 'interfolio' ),
		'add_or_remove_items'        => __( 'Add or remove years', 'interfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used years', 'interfolio' ),
		'popular_items'              => __( 'Popular Years', 'interfolio' ),
		'search_items'               => __( 'Search years', 'interfolio' ),
		'not_found'                  => __( 'Not Found', 'interfolio' ),
		'no_terms'                   => __( 'No years', 'interfolio' ),
		'items_list'                 => __( 'Items list', 'interfolio' ),
		'items_list_navigation'      => __( 'Items list navigation', 'interfolio' ),
    ];
	
	register_taxonomy( 'inf_timeline', ['inf_milestone'], [
        'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
    ]);
}

function register_resource_categories_taxonomy() {

	$labels = [
		'name'                       => _x( 'Resource Categories', 'Taxonomy General Name', 'interfolio' ),
		'singular_name'              => _x( 'Resource Category', 'Taxonomy Singular Name', 'interfolio' ),
		'menu_name'                  => __( 'Categories', 'interfolio' ),
		'all_items'                  => __( 'All Resource Categories', 'interfolio' ),
		'parent_item'                => __( 'Resource Category', 'interfolio' ),
		'parent_item_colon'          => __( 'Resource Category:', 'interfolio' ),
		'new_item_name'              => __( 'New Resource Category', 'interfolio' ),
		'add_new_item'               => __( 'Add New Resource Category', 'interfolio' ),
		'edit_item'                  => __( 'Edit Resource Category', 'interfolio' ),
		'update_item'                => __( 'Update Resource Category', 'interfolio' ),
		'view_item'                  => __( 'View Resource Category', 'interfolio' ),
		'separate_items_with_commas' => __( 'Separate Resource Categories with commas', 'interfolio' ),
		'add_or_remove_items'        => __( 'Add or remove Resource Categories', 'interfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used Resource Categories', 'interfolio' ),
		'popular_items'              => __( 'Popular Resource Categories', 'interfolio' ),
		'search_items'               => __( 'Search Resource Categories', 'interfolio' ),
		'not_found'                  => __( 'Not Found', 'interfolio' ),
		'no_terms'                   => __( 'No Resource Categories', 'interfolio' ),
		'items_list'                 => __( 'Items list', 'interfolio' ),
		'items_list_navigation'      => __( 'Items list navigation', 'interfolio' ),
    ];

	$rewrite = [
		'slug'                  => 'resources',
		'with_front'            => false
    ];

	$args = [
		'labels'                     => $labels,
		'hierarchical'               => false,	 
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'             		 => $rewrite
    ];

	register_taxonomy( 'inf_resources', array( 'inf_resource_single' ), $args );

}

function register_news_and_events_categories_taxonomy() {

	$labels = [
		'name'                       => _x( 'News and Events Categories', 'Taxonomy General Name', 'interfolio' ),
		'singular_name'              => _x( 'News and Events Category', 'Taxonomy Singular Name', 'interfolio' ),
		'menu_name'                  => __( 'Categories', 'interfolio' ),
		'all_items'                  => __( 'All News and Events Categories', 'interfolio' ),
		'parent_item'                => __( 'News and Events Category', 'interfolio' ),
		'parent_item_colon'          => __( 'News and Events Category:', 'interfolio' ),
		'new_item_name'              => __( 'New News and Events Category', 'interfolio' ),
		'add_new_item'               => __( 'Add New News and Events Category', 'interfolio' ),
		'edit_item'                  => __( 'Edit News and Events Category', 'interfolio' ),
		'update_item'                => __( 'Update News and Events Category', 'interfolio' ),
		'view_item'                  => __( 'View News and Events Category', 'interfolio' ),
		'separate_items_with_commas' => __( 'Separate News and Events Categories with commas', 'interfolio' ),
		'add_or_remove_items'        => __( 'Add or remove News and Events Categories', 'interfolio' ),
		'choose_from_most_used'      => __( 'Choose from the most used News and Events Categories', 'interfolio' ),
		'popular_items'              => __( 'Popular News and Events Categories', 'interfolio' ),
		'search_items'               => __( 'Search News and Events Categories', 'interfolio' ),
		'not_found'                  => __( 'Not Found', 'interfolio' ),
		'no_terms'                   => __( 'No News and Events Categories', 'interfolio' ),
		'items_list'                 => __( 'Items list', 'interfolio' ),
		'items_list_navigation'      => __( 'Items list navigation', 'interfolio' ),
    ];

	$rewrite = [
		'slug'                  => 'news_and_events_categories',
		'with_front'            => false
    ];

	$args = [
		'labels'                     => $labels,
		'hierarchical'               => false,	 
		'public'                     => true,
		'show_ui'                    => true,
		'show_in_rest' 				 => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'             		 => $rewrite
    ];

	register_taxonomy( 'inf_news_and_events_categories', array( 'inf_news_and_events' ), $args );

}