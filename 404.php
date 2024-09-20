<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Interfolio
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title" style="text-align: center;">404</h1>
					<h2 class="page-title" style="text-align: center;">Page Not Found</h2>
				</header><!-- .page-header -->
				<div class="page-content">
					<p style="text-align:center;">The page you are looking for doesn't exist or an other error occured.</p>
					<p style="text-align:center;">Please use the search bar located above or return to the <a href="/">homepage</a>.</p>


				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
