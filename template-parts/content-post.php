<?php
/**
 * Template part for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Interfolio
 */


 $fields = get_fields();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('interfolio-blog-post'); ?>>
	<header class="entry-header  <?= has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image' ?>">
        <?php if(has_post_thumbnail()) : ?>
            <div class="post-featured-image-container">
                <?php interfolio_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="post-meta-container">
            <?php 
                $tags_list = get_the_tag_list( '', esc_html_x( ' | ', 'list item separator', 'interfolio' ) );
                if ( $tags_list ) {
                    echo '<div class="tags-container">';
                    printf( '<span class="tags-links">' . esc_html__( '%1$s', 'interfolio' ) . '</span>', $tags_list ); // WPCS: XSS OK.
                    echo '</div>';
                }
            ?>
            <?php
                the_title( '<h1 class="entry-title">', '</h1>' );	
            ?>
            <div class="entry-meta">
                <div class="post-date">
                    <?php interfolio_posted_on(); ?>
                </div>
                <div class="post-author">
                    <?php if(isset($fields['attributed_author']) && $fields['attributed_author']) : ?>
                        <?php interfolio_attributed_author($fields) ?>
                    <?php else : ?>
                        <?php interfolio_posted_by(); ?>
                    <?php endif; ?>
                </div>
            </div><!-- .entry-meta -->
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
    <?php 
        $relations_to = get_post_meta( get_the_ID(), 'crp_relations_to' ); 
        $show_related_posts = false;
        if($relations_to && !empty($relations_to)){
            foreach($relations_to as $relation){
                if(!empty($relation)){
                    $show_related_posts = true;
                }
            }
        }
    ?>
    <footer class="entry-footer <?= $show_related_posts ? 'related-posts' : ''?>">
        <?= $show_related_posts ? do_shortcode( '[custom-related-posts title="Additional Readings"]' ) : '' ?> 
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
