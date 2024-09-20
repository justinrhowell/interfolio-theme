<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Interfolio
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="footer-container container">
			<div class="row footer-top">
				<div class="col-9 links-col">
					<div class="row links-row">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'main-footer-menu',
								'container_class' => 'container'
							) );
						?>
					</div>
				</div>
				<div class="col-8 offset-2 col-md-3 offset-md-0 contact-col">
					<div class="row contact-row">
						<div class="col-12 contact-text">
							<div class="contact-info">
								<span style="text-decoration: underline;">USA office</span>
								<span>1150 18th Street NW, Suite 275</span>
								<span>Washington, DC 20036</span>
								
			<!-- 			<a href="<?php echo esc_url( 'https://www.facebook.com/Interfolio/' ); ?>"	class="social-icon" rel="facebook">
										<img src="<?= get_theme_file_uri() . '/dist/images/facebook-icon.svg'?>"/>
									</a><a href="<?php echo esc_url( 'https://twitter.com/Interfolio' ); ?>"	class="social-icon" rel="twitter">
										<img src="<?= get_theme_file_uri() . '/dist/images/twitter-icon.svg'?>"/>
									</a><a href="<?php echo esc_url( 'https://www.instagram.com/interfolio/' ); ?>"	class="social-icon" rel="instagram">
										<img src="<?= get_theme_file_uri() . '/dist/images/ig-icon.svg'?>"/>
									</a><a href="<?php echo esc_url( 'https://www.linkedin.com/company/interfolio-inc-/' ); ?>"	class="social-icon" rel="linkedin">
										<img src="<?= get_theme_file_uri() . '/dist/images/li-icon.png'?>"/>
									</a> -->
							</div>

					
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-footer-container">
			<div class="container">
				<div class="row footer-bottom">
						<div class="col-12">
							<div class="row">
								<div class="col copy-col">
									<span>Copyright © 2024 Elsevier Inc. or its licensors and contributors. All rights are reserved, including those for text and data mining, AI training, and similar technologies.</span>
										<?php
										wp_nav_menu( array(
											'theme_location' => 'menu-3',
											'menu_id'        => 'secondary-footer-menu',
											'container_class' => 'container'
										) );
									?>
								
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>


<script type=“text/javascript”>
    (function(i,s,o,g,r,a,m){i['SLScoutObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://scout-cdn.salesloft.com/sl.js','slscout');
    slscout(["init", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ0IjoxMDIxMDF9.XxgCp2AuaknsS7LG8fmz98O8aYJXvJt8fgDUQTd-l2U"]);
</script>

<script>
    window._6si = window._6si || [];
    window._6si.push(['enableEventTracking', true]);
    window._6si.push(['setToken', 'd6b7148df35bd1ed7dccc5f958c52ad3']);
    window._6si.push(['setEndpoint', 'b.6sc.co']);



    (function() {
      var gd = document.createElement('script');
      gd.type = 'text/javascript';
      gd.async = true;
      gd.src = '//j.6sc.co/6si.min.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(gd, s);
    })();
  </script>


</html>