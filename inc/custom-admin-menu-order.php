<?php

function interfolio_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

	$order = [
		'index.php',
		'upload.php',
		'separator1',
		'edit.php?post_type=inf_client_single',
		'edit.php?post_type=inf_landing_single',
		'edit.php?post_type=inf_news_and_events',
		'edit.php?post_type=inf_open_position',
		'edit.php?post_type=page',
		'edit.php?post_type=inf_product_single',
		'edit.php?post_type=inf_resource_single',
		'edit.php?post_type=inf_team_member',
		'separator2',
		'themes.php',
		'edit.php?post_type=acf-field-group',
		'embedpress',
		'gf_edit_forms',
		'edit.php?post_type=cookielawinfo',
		'plugins.php',
		'wpseo_dashboard',
		'options-general.php',
		'tools.php',
		'users.php',
		'webflow-settings',
		'wp-mail-smtp',
	];

	return $order;
}
add_filter( 'custom_menu_order', 'interfolio_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'interfolio_custom_menu_order', 10, 1 );