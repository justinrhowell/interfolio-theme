<?php
/**
 * Template part for displaying products
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Interfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		$fields = get_fields();
		$background_image = $fields['product_background_image'];
		$cta_text = isset($fields['product_cta_text']) ? $fields['product_cta_text'] : '';
		$cta_link = isset($fields['product_cta_link']) ? $fields['product_cta_link'] : '';
		$cta_color = isset($fields['product_cta_color']) ? $fields['product_cta_color'] : 'has-interfolio-red-background-color';
	?>
	<div class="product-background-image-container full-width" style="background-image: url(<?= $background_image ?>);">
	</div>
	<div class="entry-content">
		<div class="product-header">
			<div class="desktop-image-container">
				<?php the_post_thumbnail('large'); ?>
			</div>
			<div class="text-container">
				<?php
					the_title('<h1 class="product-title">', '</h1>');
					echo '<div class="mobile-image-container">';
					the_post_thumbnail('thumbnail');
					echo '</div>';
					the_excerpt();
					if($cta_text && $cta_link) : ?>
						<a class="interfolio-button product-cta <?= $cta_color ?>" href="<?= $cta_link ?>"><?= $cta_text ?></a>
					<?php endif;
				?>
			</div>
		</div>
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
