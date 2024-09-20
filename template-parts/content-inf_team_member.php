<?php
/**
 * Template part for displaying blog posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Interfolio
 */

 $fields = get_fields(get_the_ID());

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header  <?= has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image' ?>">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="post-featured-image-container col-12 col-lg-6">
                    <?php the_title( '<h1 class="entry-title mobile">', '</h1>' ); ?>
                    <h4 class="title mobile"><?= $fields['team_member_title'] ?></h4>
                    <?php if(has_post_thumbnail()) : ?>
                        <?php interfolio_post_thumbnail(); ?>
                    <?php endif; ?>
                </div>
                <div class="post-meta-container col-12 col-lg-6">
                    <?php
                        the_title( '<h1 class="entry-title desktop">', '</h1>' );
                    ?>
                    <div class="entry-meta">
                        <h4 class="title desktop"><?= $fields['team_member_title'] ?></h4>
                        <?php if($fields['team_member_twitter_url']) : ?>
                            <a class="social-media twitter-link" href="<?= $fields['team_member_twitter_url'] ?>"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if($fields['team_member_linkedin_url']) : ?>
                            <a class="social-media linkedin-link" href="<?= $fields['team_member_linkedin_url'] ?>"><i class="fab fa-linkedin-in"></i></a>
                        <?php endif; ?>
                    </div><!-- .entry-meta -->
                </div>
            </div>
        <!-- </div> -->
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
        <a class="team-link desktop" href="/company/leadership/">View More Team Bios <i class="fal fa-arrow-right"></i></a>

        <a class="team-link mobile" href="/company/leadership/">View More Team Bios <i class="fal fa-arrow-right"></i></a>
    </div><!-- .entry-content -->
    <?php
        $tag = $fields['filter_tag'];
        if($tag) :
    ?>
    <footer class="entry-footer related-posts">
        <?php
                $args = [
                    'tag_id' => $tag,
                    'posts_per_page' => 3,
                    'post_type' => 'inf_resource_single'
                ];

                $query = new WP_Query($args);
                $output = the_title( '<h3 class="crp-list-title">Articles From ', '</h1>' );	;
                $output .= '<ul class="crp-list">';
                foreach($query->posts as $post) {
                    $output .= get_related_post($post->ID);
                }
                $output .= '</ul>';
                echo $output;
        ?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
