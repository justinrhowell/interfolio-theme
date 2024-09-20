<?php

add_action('rest_api_init', function () {
    register_rest_route('interfolio-rest/v1', '/search', array(
        'methods' => 'GET',
        'callback' => 'interfolio_get_search_results',
    ));
});

function interfolio_get_search_results(WP_REST_Request $request){
    $args = $data = [];

    $args['post_type'] = isset($request['post_type']) ? $request['post_type'] : [
        'page',
        'inf_resource_single',
        'inf_news_and_events'
    ];
    $args['tax_query'] = isset($request['tax']) && isset($request['term']) ? [
        [
            'taxonomy' => $request['tax'],
            'field' => 'slug',
            'terms' => $request['term']
        ]
    ] : [];
    $args['posts_per_page'] = isset($request['per_page']) ? $request['per_page'] : 5;
    $args['paged'] = isset($request['page']) ? $request['page'] : 1;
    $args['s'] = isset($request['query']) ? $request['query'] : '';
    $wp_query = new WP_Query($args);
    
    foreach($wp_query->posts as $post_obj){
        
        $post_type = get_post_type($post_obj);
        $taxonomies = get_object_taxonomies($post_type);
        $taxonomies_to_ignore = [
            'nav_menu',
            'category',
            'post_tag',
            'post_format',
            'yst_prominent_words'
        ];
        $taxonomies = array_values(array_diff($taxonomies, $taxonomies_to_ignore));
        $taxonomy_names = wp_get_object_terms($post_obj->ID, $taxonomies, ["fields" => "names"]);    
        if(!empty($taxonomy_names)){
            $type = $taxonomy_names[0];
        } else {
            $type = get_post_type_object($post_type)->labels->singular_name;
        }
        
        $post = [
            'object' => $post_obj,
            'link' => get_permalink($post_obj),
            'excerpt' => get_the_excerpt($post_obj),
            'type' => $type,
            'title' => get_the_title($post_obj)
        ];

        $data[] = $post;
    }
    
	$response = new WP_REST_Response([
        'results' => $data,
        'total_results' => $wp_query->found_posts,
    ]);
    return $response;
}