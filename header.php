<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Interfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="https://kit.fontawesome.com/7425b7652a.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
	<script src="//assets.adobedtm.com/175f7caa2b90/81c538686795/launch-92bc434024d0.min.js" async></script>
	<!-- Google Tag Manager -->
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KLTSKST');
	</script>
	<!-- End Google Tag Manager -->
	<!-- Hotjar Tracking Code for http://interfolio.com/ -->
	<script>
		(function(h,o,t,j,a,r){
			h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
			h._hjSettings={hjid:798718,hjsv:6};
			a=o.getElementsByTagName('head')[0];
			r=o.createElement('script');r.async=1;
			r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
			a.appendChild(r);
		})(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- End Hotjar Tracking Code -->
	<!-- Munchkin Tracking  -->
	<script type="text/javascript">
	(function() {
		var didInit = false;
		function initMunchkin() {
			if(didInit === false) {
			didInit = true;
			Munchkin.init('770-JDV-251');
			}
		}
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = '//munchkin.marketo.net/munchkin.js';
		s.onreadystatechange = function() {
			if (this.readyState == 'complete' || this.readyState == 'loaded') {
			initMunchkin();
			}
		};
		s.onload = initMunchkin;
		document.getElementsByTagName('head')[0].appendChild(s);
		})();
	</script>
	<!-- End Munchkin Tracking  -->
<!-- Clarity tracking code for https://www.interfolio.com/ --><script>    (function(c,l,a,r,i,t,y){        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);    })(window, document, "clarity", "script", "59e8s63ty8");</script>



	<script src="https://www.googleoptimize.com/optimize.js?id=GTM-53PSJZC"></script>
	<?php wp_head(); ?>
</head>

<?php
	$post = get_post();
	$body_class = 'with-padding';
	$has_header_block = $alt_navbar = false;
	if (!is_404() && has_blocks($post->post_content)) {
		$blocks = parse_blocks($post->post_content);
		foreach ($blocks as $block) {
			if ($block['blockName'] == 'interfolio/block-interfolio-header') {
				$has_header_block = true;
			}
		}
	}
	if($has_header_block || get_post_type() == 'inf_product_single'){
		$alt_navbar = true;
		$body_class = 'has-header-block';
	}
?>

<body <?php body_class($body_class); ?>>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KLTSKST"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'interfolio'); ?></a>
		<div class="navbar-container">
			<nav class="navbar fixed-top navbar-expand-lg at-top row <?= $alt_navbar ? 'alt-navbar' : '' ?>" role="navigation">
				<div class="menu-overlay"></div>
				<div class="container">
					<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
						<img width="150" class="primary-logo" src="<?= get_theme_file_uri() . '/dist/images/primary-logo.png' ?>" width="120" alt="interfolio logo">
						<img width="150" class="alt-logo" src="<?= get_theme_file_uri() . '/dist/images/alt-logo.png' ?>" width="120" alt="interfolio logo">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".interfolio-navbar-collapse" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fal fa-bars"></i>
						<i class="fal fa-times"></i>
					</button>
					<?php
					wp_nav_menu(array(
						'theme_location'    => 'menu-1',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse interfolio-navbar-collapse',
						'container_id'      => 'primary-menu',
						'menu_id'			=> 'menu-navigation-menu',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
						'walker'            => new WP_Bootstrap_Navwalker(),
					));
					?>
					<div class="my-2 my-lg-0 collapse navbar-collapse navbar-actions interfolio-navbar-collapse">
						<?php foreach (interfolio_get_navbar_actions() as $type => $item) { ?>
							<div class="navbar-action-item"><?= $item ?></div>
						<?php } ?>
					</div>
				</div>
			</nav>
		</div>
		<div class="search-overlay-container">
			<div class="search-content-container">
				<div class="search-controls">
					<button class="search-overlay-exit"><i class="fal fa-times"></i></button>
				</div>
				<div class="search-input">
					<div class="text-input-box">
						<i class="fal fa-search"></i>
						<input type="text" id="search-input" placeholder="Search...">
					</div>
					<div class="search-results-meta-container">
						<div class="search-results-pagination-info"></div>
						<div class="search-results-content-filter interfolio-select-wrapper">
							<select class="interfolio-select search-results-content-filter-select"></select>
						</div>
					</div>
				</div>
				<div class="search-results"></div>
				<div class="search-results-pagination-controls">
					<div class="page-prev-container">
						<button class="page-prev">Previous</button>
					</div>
					<div class="page-next-container">
						<button class="page-next">Next</button>
					</div>
				</div>
			</div>
		</div>
		<div id="content" class="site-content container">
