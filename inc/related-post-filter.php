<?php

add_filter('crp_output_list_item', 'interfolio_filter_related_posts', 10, 3);

function interfolio_filter_related_posts($output, $post_id, $relation ){
	$output = get_related_post($relation['id']);
	return $output;
}

function get_related_post($post_id){
	$output = '<div class="related-posts-item">';
	$output .= '<div class="related-post-image-container">';
	$output .= '<a href="'.get_post_permalink($post_id).'">';
	if(has_post_thumbnail($post_id)){
		$image = get_the_post_thumbnail($post_id);
	} else {
		$image = '<img src="' . get_theme_file_uri() . '/dist/images/related-post-placeholder.jpg' .'" />';
	}
	$output .= $image;
	$output .= '<div class="related-post-image-overlay">';
	$output .= '<span class="related-post-type">'.get_post_type_object(get_post_type($post_id))->labels->singular_name.'</span>';
	$output .= '</div>';
	$output .= '</a>';
	$output .= '</div>';
	$output .= '<a class="title-link" href="'.get_post_permalink($post_id).'">';
	$output .= '<h4 class="related-post-title">'.get_the_title($post_id).'</h4>';
	$output .= '</a>';
	$output .= '<p class="related-post-excerpt">'.get_the_excerpt($post_id).'</p>';
	$output .= '<a class="related-post-link" href="'.get_post_permalink($post_id).'">Read More <i style="margin-left:5px" class="fal fa-arrow-right"></i></a>';
	$output .= '</div>';
	return $output;
}