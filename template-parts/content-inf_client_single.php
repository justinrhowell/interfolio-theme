<?php
/**
 * Template part for displaying cients
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Interfolio
 */

$fields = get_fields(get_the_ID());

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header  <?= has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image' ?>">
        <?php if(has_post_thumbnail()) : ?>
            <div class="post-featured-image-container">
                <?php interfolio_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="post-meta-container">
            <?php
                the_title( '<h1>', '</h1>' );
            ?>
        </div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'interfolio' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'interfolio' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

    <footer class="entry-footer related-posts">
        <?php
            $tag = $fields['filter_tag'];
            if($tag){
                $args = [
                    'tag_id' => $tag,
                    'posts_per_page' => 3,
                    'post_type' => 'inf_resource_single'
                ];

                $query = new WP_Query($args);
                $output = the_title( '<h3 class="crp-list-title">Resources Related to ', '</h1>' );	;
                $output .= '<ul class="crp-list">';
                foreach($query->posts as $post) {
                    $output .= get_related_post($post->ID);
                }
                $output .= '</ul>';
                echo $output;
            }
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
