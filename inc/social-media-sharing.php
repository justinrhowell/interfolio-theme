<?php

function interfolio_social_sharing_buttons_block($block_content, $block) {
	if(is_singular(['inf_resource_single']) && has_term('blog', 'inf_resources') && $block['blockName'] == 'interfolio/block-signature'){
		$buttons = get_social_sharing_buttons();
		return $buttons . $block_content;
	}
	return $block_content;
};

function interfolio_social_sharing_buttons_content($content){
	$buttons = get_social_sharing_buttons('no-signature');
	return $content . $buttons;
}

function get_social_sharing_buttons($class = ''){
	global $post;
	$post_url = urlencode(get_permalink());
	$post_title = htmlspecialchars(urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8');
	$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	$twitter_url = 'https://twitter.com/intent/tweet?text='.$post_title.'&amp;url='.$post_url;
	$facebook_url = 'https://www.facebook.com/sharer/sharer.php?u='.$post_url;
	$linkedIn_url = 'https://www.linkedin.com/shareArticle?mini=true&url='.$post_url.'&amp;title='.$post_title;
	$content = '';
	$content .= '<div class="interfolio-share-buttons '.$class.'">';
	$content .= '<a class="social-link twitter" href="'. $twitter_url .'" target="_blank"><i class="fab fa-twitter"></i></a>';
	$content .= '<a class="social-link facebook" href="'.$facebook_url.'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
	$content .= '<a class="social-link linkedin" href="'.$linkedIn_url.'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
	$content .= '</div>';
	return $content;
}

function check_for_signature_block(){
	if (is_single() && get_post_type() == 'inf_resource_single' && has_term('blog', 'inf_resources')){
		$post = get_post();
		$has_signature_block = false;
		if ( has_blocks( $post->post_content ) ) {
			$blocks = parse_blocks( $post->post_content );
			foreach($blocks as $block){
				if($block['blockName'] == 'interfolio/block-signature'){
					$has_signature_block = true;
				}
			}
		}
		if($has_signature_block){
			add_filter( 'render_block', 'interfolio_social_sharing_buttons_block', 10, 2);
		} else {
			add_filter( 'the_content', 'interfolio_social_sharing_buttons_content');
		}
	}
}

add_action('wp', 'check_for_signature_block');