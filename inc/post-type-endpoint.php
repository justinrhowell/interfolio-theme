<?php

add_action('rest_api_init', function () {
    register_rest_route('interfolio-rest/v1', '/types', array(
        'methods' => 'GET',
        'callback' => 'interfolio_get_post_types',
    ));
});

function interfolio_get_post_types(){
	$post_types = get_post_types([], 'objects');
	$types_we_want = [
		'inf_resource_single',
		'inf_news_and_events',
		'page'
	];
	$data = [];
	foreach($post_types as $name => $type){
		if(in_array($name, $types_we_want)){
			$terms = [];
			$taxonomies = get_object_taxonomies($name, 'objects');
			foreach($taxonomies as $tax_name => $tax){
                $taxonomies_to_ignore = [
                    'nav_menu',
                    'category',
                    'post_tag',
                    'post_format',
                    'yst_prominent_words'
                ];
                
				if(!in_array($tax_name, $taxonomies_to_ignore)){
					$terms[$tax_name] = [
						'label' => $tax->label,
						'terms' => get_terms(['taxonomy' => $tax_name])
					];
				}
			}
			$data[$name] = [
				'label' => $type->label,
				'taxonomies' => $terms,
			];
		}
	}
	
	$response = new WP_REST_Response($data);
    return $response;
}