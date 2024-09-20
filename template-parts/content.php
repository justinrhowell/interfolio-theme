<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Interfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('type-default'); ?>>
	<header class="entry-header  <?= has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image' ?>">
        <?php if(has_post_thumbnail()) : ?>
            <div class="post-featured-image-container">
                <?php interfolio_post_thumbnail(); ?>
            </div>
        <?php endif; ?>
        <div class="post-meta-container">
            <?php
                the_title( '<h1 class="entry-title">', '</h1>' );	
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

	<footer class="entry-footer">
		<?php interfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
