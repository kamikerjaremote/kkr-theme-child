<!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php endif; ?>

<?php wp_head(); ?>



</head>



<body <?php body_class(); ?>>



	<?php wp_body_open(); ?>



	<?php if ( get_theme_mod( 'onecommunity_preloader_enable', false ) == true ) {

		echo '<div id="loader-wrapper"></div>';

	} ?>



		<div class="container">



		<header id="main">

			<div class="header-top">



				<div class="logo"><h1>

				<?php

				if ( get_theme_mod( 'onecommunity_dark_mode_enable', true ) == true ) {



					if ( get_theme_mod( 'custom_logo' ) ) { ?>



						<?php the_custom_logo(); ?>

						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' class='dark test' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/2023/07/logo-kkr-svg.svg" alt="Kami Kerja Remote"></a>



					<?php } else { ?>



						<a href="<?php echo home_url(); ?>" class='light' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_attr( get_bloginfo( 'template_directory', 'display' ) ); ?>/img/logo.png" class="logo-image" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>

						<a href="<?php echo home_url(); ?>" class='dark' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_attr( get_bloginfo( 'template_directory', 'display' ) ); ?>/img/logo-dark-mode.png" class="logo-image" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>



				<?php }



				} else {



					if ( get_theme_mod( 'custom_logo' ) ) { ?>



							<?php the_custom_logo(); ?>

		

						<?php } else { ?>



							<a href="<?php echo home_url(); ?>" class='light' title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php echo esc_attr( get_bloginfo( 'template_directory', 'display' ) ); ?>/img/logo.png" class="logo-image" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>

		

						<?php }

				}

				?>





				</h1></div>





			<div class="header-top-right">



			<?php if( function_exists( 'wd_asp' ) ) { ?>

				<div class="header-search"><?php echo do_shortcode('[wd_asp id=1]'); ?></div>

			<?php } ?> 



			<?php 

			if ( is_user_logged_in() && function_exists( 'bp_is_active' ) ) {



				get_template_part( 'template-parts/header-user', 'panel' );



				if( bp_is_active('notifications') ) {

					get_template_part( 'template-parts/header', 'notifications' );

				}



				if( bp_is_active('messages') ) {

					get_template_part( 'template-parts/header', 'messages' );

				}



			}

			?>



			<?php if ( !is_user_logged_in() ) { ?>



				<a href="<?php echo home_url(); ?>/register" class="header-top-signin tada"><?php esc_attr_e('Register', 'onecommunity'); ?></a>



                <a href="<?php echo home_url(); ?>/login" class="header-top-login"><?php esc_attr_e('Login', 'onecommunity'); ?></a>



			<?php } ?>





			</div><!-- header-top-right -->







			<?php if ( has_nav_menu( 'header-menu' ) ) {



				$transient = get_transient( 'onecommunity_header_menu' );

				if ( false === $transient || !get_theme_mod( 'onecommunity_transient_header_menu_enable', 0 ) == 1 ) {

				ob_start(); ?>



					<div id="header-menu-container">

					<?php

					wp_nav_menu( array(

						'theme_location' => 'header-menu',

						'container' => false,

						'menu_class' => 'header-menu',

						'echo' => true,

						'link_before' => '',

						'link_after' => '',

						'walker' => new Child_Wrap(),

						'depth' => 0)

					);

					?>

					</div><!-- header-menu-container -->



					

					<div id="mobile-nav">

					<?php

					wp_nav_menu(

    				array(

       					'theme_location' => 'header-menu',

       					'container_class'    => 'header-menu-mobile-container',

       					'menu_class' => 'header-menu-mobile'

    					)

					);

					?>

					</div><!-- mobile-nav -->



				<?php

				$header_menu = ob_get_clean();

				print_r( $header_menu );

					if ( get_theme_mod( 'onecommunity_transient_header_menu_enable', 0 ) == 1 ) {

						set_transient( 'onecommunity_header_menu', $header_menu, MINUTE_IN_SECONDS * get_theme_mod( 'onecommunity_transient_header_menu_expiration', 10080 ) );

					}



				} else {



				echo '<!-- onecommunity_header_menu transient -->';

					print_r( $transient );

				} 



			 } ?>







			<?php if( function_exists( 'wd_asp' ) ) { ?>

			<div id="header-search-mobile">

				<div id="header-search-mobile-icon"></div>

			<div class="header-search-mobile-field">

					<?php echo do_shortcode('[wd_asp id=1]'); ?>

			</div>

			<?php } ?>



			</div><!-- header-top -->



		</header>