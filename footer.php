<div class="clear"></div>

<?php
if ( get_theme_mod( 'onecommunity_sidenav_enable', true ) == true && shortcode_exists( 'onecommunity-sidenav' ) ) {
	 echo do_shortcode( '[onecommunity-sidenav]' );
} else { ?>
	<style type="text/css">
	body { padding-right:0px!important; }
	header#main { padding-right: 0px; }
</style>
<?php } ?>


<?php
wp_reset_query();
if ( !is_front_page() && !is_page_template( 'frontpage-page-builder.php' ) or get_theme_mod( 'onecommunity_login_popup_frontpage_enable', false ) == true) { ?>
<div class="popup-shortcode-login">
<div class="popup-shortcode-login-child">
<a class="shortcode-login-close"></a>
<?php
	if ( shortcode_exists( 'onecommunity-login' ) ) {
	echo do_shortcode( '[onecommunity-login]' );
	}
?>
</div>
</div>
<?php } ?>

<?php
$transient = get_transient( 'onecommunity_footer' );
if ( false === $transient OR !get_theme_mod( 'onecommunity_transient_footer_enable', 0 ) == 1 ) {
ob_start(); ?>

<footer <?php if ( !get_theme_mod( 'onecommunity_footer_columns_enable', false ) == true ) { ?>class="no-columns"<?php } ?>>

<?php if ( get_theme_mod( 'onecommunity_footer_columns_enable', false ) == true ) { ?>

	<div class="footer-columns">


			<div class="wrapper">
			<div class="footer-columns-col-1 footer-column">

				<?php if ( get_theme_mod( 'onecommunity_footer_logo_enable', true ) == true ) { ?>
				<div class="footer-logo">

				<?php
				if ( get_theme_mod( 'onecommunity_footer_logo_enable', true ) == true ) {
					if ( get_theme_mod( 'onecommunity_dark_mode_enable', true ) == true ) {

						if ( get_theme_mod( 'onecommunity_footer_logo_dark_mode' ) or get_theme_mod( 'onecommunity_footer_logo' ) ) { ?>

       							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' class='light' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="<?php echo get_theme_mod( 'onecommunity_footer_logo' ) ?>"></a>
       							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' class='dark' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="<?php echo get_theme_mod( 'onecommunity_footer_logo_dark_mode' ) ?>"></a>

						<?php } else { ?>

								<a href="<?php echo home_url(); ?>" class='light' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_attr( get_bloginfo( 'template_directory', 'display' ) ); ?>/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
								<a href="<?php echo home_url(); ?>" class='dark' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_attr( get_bloginfo( 'template_directory', 'display' ) ); ?>/img/logo-dark-mode.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>

						<?php } // end of onecommunity_footer_logo_dark_mode

					} else { //onecommunity_dark_mode_enable

						if ( get_theme_mod( 'onecommunity_footer_logo' ) ) { ?>

							<a href='<?php echo esc_url( home_url( '/' ) ); ?>' class='light' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="<?php echo get_theme_mod( 'onecommunity_footer_logo' ) ?>" /></a>
		
						<?php 
						} else {
						?>

							<a href="<?php echo home_url(); ?>" class='light' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_attr( get_bloginfo( 'template_directory', 'display' ) ); ?>/img/logo.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
		
						<?php 
						} //onecommunity_footer_logo
		
					} //onecommunity_dark_mode_enable

				} //onecommunity_footer_logo_enable
				?>

				</div>
				<?php } ?>

				<?php if ( get_theme_mod( 'onecommunity_footer_info_enable', true ) == true ) { ?>
				<p><?php echo get_theme_mod( "onecommunity_footer_info", "A social network service in a box. Get your community to the higher level. It's easy with OneCommunity." ); ?></p>
				<?php } ?>

			</div>

			<div class="footer-columns-col-2 footer-column">

			<h6><?php echo get_theme_mod( "onecommunity_footer_menu_1_title", "Informations" ); ?></h6>

			<?php
			if ( has_nav_menu( 'mini-footer-menu' ) ) {

			wp_nav_menu( array(
			 'theme_location' => 'mini-footer-menu',
			 'container' => false,
			 'menu_class' => 'mini-footer-menu',
			 'echo' => true,
			 'before' => '',
			 'after' => '',
			 'link_before' => '',
			 'link_after' => '',
			 'depth' => 0,)
			);

			}
			?>

			</div>


			<div class="footer-columns-col-3 footer-column">

			<h6><?php echo get_theme_mod( "onecommunity_footer_menu_2_title", "Legal" ); ?></h6>

			<?php
			if ( has_nav_menu( 'mini-footer-menu-2' ) ) {

			wp_nav_menu( array(
			 'theme_location' => 'mini-footer-menu-2',
			 'container' => false,
			 'menu_class' => 'mini-footer-menu',
			 'echo' => true,
			 'before' => '',
			 'after' => '',
			 'link_before' => '',
			 'link_after' => '',
			 'depth' => 0,)
			);

			}
			?>

			</div>


			<div class="footer-columns-col-4 footer-column">

				<div class="social-icons">

				<h6><?php echo get_theme_mod( "onecommunity_footer_social_title", "Follow Us" ); ?></h6>

				<?php if ( get_theme_mod( 'onecommunity_social_4', false ) == false ) { ?>
				<a href="<?php bloginfo('rss2_url'); ?>"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-rss.svg" alt="RSS"></a>
				<?php } ?>

				<?php if ( get_theme_mod( 'onecommunity_social_5', false ) == false ) { ?>
				<a href="<?php echo get_theme_mod( 'onecommunity_social_5_link', '//instagram.com' ); ?>"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-instagram.svg" alt="Instagram"></a>
				<?php } ?>

				<?php if ( get_theme_mod( 'onecommunity_social_3', false ) == false ) { ?>
				<a href="<?php echo get_theme_mod( 'onecommunity_social_3_link', '//twitter.com' ); ?>" rel="nofollow"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-twitter.svg" alt="Twitter"></a>
				<?php } ?>

				<?php if ( get_theme_mod( 'onecommunity_social_2', false ) == false ) { ?>
				<a href="<?php echo get_theme_mod( 'onecommunity_social_2_link', '//youtube.com' ); ?>"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-youtube.svg" alt="Youtube"></a>
				<?php } ?>

				<?php if ( get_theme_mod( 'onecommunity_social_1', false ) == false ) {
				$lenght = strlen( get_theme_mod( 'onecommunity_social_1_link', '//facebook.com' ) );
					if ($lenght > 16) {
					?>
						<a href="<?php echo get_theme_mod( 'onecommunity_social_1_link', '' ) ?>"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-facebook.svg" alt="Facebook"></a>
					<?php
					} else { ?>
						<a href="https://www.facebook.com/sharer.php?u=<?php global $wp; echo home_url( $wp->request ); ?>&amp;t=<?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?>"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-facebook.svg" alt="Facebook"></a>
					<?php 
					}
				} ?>

				</div><!-- social-icons -->
				<div class="idch-logo">
					<h6>Server Supported by</h6>
					<a href="https://idcloudhost.com/" target="_blank"><img src="https://kamikerjaremote.com/wp-content/uploads/2023/08/logo-idch-footer.png"></a>
				</div>

			</div><!-- footer-column -->

		</div><!-- wrapper -->

	</div><!-- footer-columns -->

<?php } ?>

	<section class="footer-copyright">
	<div class="wrapper">
	&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php echo get_theme_mod( 'onecommunity_footer_copyright', 'All rights reserved. No parts of this site may be copied without our written permission.' ); ?>
	</div><!-- wrapper -->
	</section>

</footer>

<?php $footer_output = ob_get_clean();
print_r( $footer_output );

	if ( get_theme_mod( 'onecommunity_transient_footer_enable', 0 ) == 1 ) {
		set_transient( 'onecommunity_footer', $footer_output, MINUTE_IN_SECONDS * get_theme_mod( 'onecommunity_transient_footer_expiration', 10080 ) );
	}
	
} else {
	echo '<!-- Transient footer ('.get_theme_mod( 'onecommunity_transient_footer_expiration', 10080 ).' min) -->';
	print_r( $transient );
} ?>

</div><!-- .container -->

<?php wp_footer(); ?>

</body>
</html>