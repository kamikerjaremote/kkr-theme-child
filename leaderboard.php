<?php
/*
Template Name: Leaderboard
*/

get_header(); ?>

<section class="wrapper">

<main id="content">

	<div class="breadcrumbs">
		<?php esc_attr_e('You are here:', 'onecommunity'); ?> <a href="<?php echo home_url(); ?>"><?php esc_attr_e('Home', 'onecommunity'); ?></a> / <span class="current"><?php the_title(); ?></span>
	</div>

	<h1 class="page-title"><span><?php the_title(); ?></span></h1>

<div class="leaderboard">
<div class="big-leaderboard-row leaderboard-title"><h3><?php esc_attr_e('KamiKerjaRemote Points', 'onecommunity'); ?></h3></div>


<?php
if ( shortcode_exists( 'onecommunity-gamipress-leaderboard-big' ) ) {
echo do_shortcode( '[onecommunity-gamipress-leaderboard-big limit="20" name="points" type="_gamipress_points_points"]' );
}
?>

</div>

</main>

<?php if( is_active_sidebar('sidebar-leaderboard') ) { ?>

<div id="sidebar-spacer"></div>

<aside id="sidebar" class="sidebar">
	
	<?php 
	$transient = get_transient( 'onecommunity_sidebar_leaderboard' );
	if ( false === $transient || !get_theme_mod( 'onecommunity_transient_sidebar_leaderboard_enable', 0 ) == 1 ) {
		ob_start();

		if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-leaderboard')) : endif;

		$sidebar = ob_get_clean();
		print_r($sidebar);
	
	if ( get_theme_mod( 'onecommunity_transient_sidebar_leaderboard_enable', 0 ) == 1 ) {
		set_transient( 'onecommunity_sidebar_leaderboard', $sidebar, MINUTE_IN_SECONDS * get_theme_mod( 'onecommunity_transient_sidebar_leaderboard_expiration', 20 ) );
	}

	} else {
		echo '<!-- Transient onecommunity_sidebar_leaderboard ('.get_theme_mod( 'onecommunity_transient_sidebar_leaderboard_expiration', 20 ).' min) -->';
		print_r( $transient );
	}
	?>

</aside><!--sidebar ends-->

<?php } ?>


</section><!-- .wrapper -->

<?php get_footer(); ?>
