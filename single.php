<?php get_header(); ?>



<section class="wrapper">



<main id="content" class="<?php if( !is_active_sidebar('sidebar-single') ) { ?>no-sidebar<?php } ?>">



	<?php

	while ( have_posts() ) : the_post(); ?>



	<div class="breadcrumbs">

	<?php esc_attr_e('You are here:', 'onecommunity'); ?> <a href="<?php echo home_url(); ?>"><?php esc_attr_e('Home', 'onecommunity'); ?></a>  /  <a href="<?php echo home_url(); ?>/<?php echo get_theme_mod( "onecommunity_blog_slug", "news" ); ?>"><?php echo get_theme_mod( "onecommunity_blog_breadcrumb_title", "News" ); ?>  /  <?php the_category(', ') ?>  /  <span class="current"><?php the_title(); ?></span>

	</div>



	<h1 class="single-post-title"><?php the_title(); ?></h1>



	<div class="single-post-details">

	<span class="single-post-category"><?php the_category(', ') ?></span>



	<span class="single-blog-comments"><?php comments_number('0', '1', '%'); ?></span>



	<?php

	if ( shortcode_exists( 'wp_ulike' ) ) {

		echo do_shortcode('[wp_ulike]');

	} ?>



	<span class="single-blog-time"><?php printf( _x( '%s ago', '%s = human-readable time difference', 'onecommunity' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></span>



	<div class="clear"></div>



	</div>





	<?php

	if ( has_post_thumbnail() ) { ?>

	<div class="thumbnail">

		<?php the_post_thumbnail('post-thumbnail-2');

		dd_the_post_thumbnail_caption(); ?>

	</div>

	<?php } else {

	// no thumbnail

	}

	?>



	<div class="clear"></div>



	<aside id="left">



		<div class="author-bio">

		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">

		<?php

		echo get_avatar( get_the_author_meta( 'user_email' ), 100 );

		?>

		</a>



		<h6 class="author-bio-name"><?php echo get_the_author(); ?>


		<!-- KKR Hidden -->
		<?php //$last_name = get_the_author_meta('last_name');

		//if($last_name != '') { echo '<br>' . $last_name; } ?>



		</h6>



		<div class="author-bio-content">

    	<?php echo get_the_author_meta('description') ?>

    	</div>



		</div>



		<?php if(has_tag()) { ?>

		<div class="single-blog-post-tags">



			<h6><?php esc_attr_e('Tags:', 'onecommunity'); ?></h6>



			<?php the_tags('', ' ', '  '); ?>

		</div>

		<?php } ?>





    	<?php $orig_post = $post;

    	global $post;

    	$tags = wp_get_post_tags($post->ID);

   		 if ($tags) {

   		 $tag_ids = array();

   		 foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

   		 $args=array(

   		 'tag__in' => $tag_ids,

    	'post__not_in' => array($post->ID),

    	'posts_per_page'=>2, // Number of related posts that will be shown.

    	'ignore_sticky_posts'=>1

    	);

    	$my_query = new wp_query( $args );

    	if( $my_query->have_posts() ) {



    echo '<div class="related-posts"><h6 class="related-posts-title">' .  esc_attr__( 'See also:', 'onecommunity' ) . '</h6><ul>';



    while( $my_query->have_posts() ) {

    $my_query->the_post(); ?>



	<li class="related-post-entry">

		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

	</li>



    <?php

	}

	echo "</ul></div>";

    }

    }

    $post = $orig_post;

	wp_reset_query();

    ?>




	<!-- KKR Hidden 
	<div class="aside-share">



		<h6><?php esc_attr_e('Share:', 'onecommunity'); ?></h6>



   			<a href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" rel="nofollow" class="twitter" target="_blank"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-twitter.svg" alt="Twitter"></a>



			<a href="https://www.facebook.com/sharer.php?u=<?php global $wp; echo home_url( $wp->request ); ?>&amp;t=<?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?>" class="facebook" target="_blank"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-facebook.svg" alt="Facebook"></a>



   			<a href="https://www.reddit.com/submit?url=<?php the_permalink() ?>&title=<?php the_title(); ?>" rel="nofollow" class="reddit" target="_blank"><img class="social" src="<?php echo esc_attr( get_bloginfo( 'stylesheet_directory', 'display' ) ); ?>/img/icon-reddit.svg" alt="Reddit"></a>

   			

   		</div>
	-->


	</aside>



	<article>



		<?php the_content( esc_attr__('Read more','onecommunity') );



			wp_link_pages( array(

				'before'      => '<div class="page-links"><span class="page-links-title">' . esc_attr__( 'Pages:', 'onecommunity' ) . '</span>',

				'after'       => '</div>',

				'link_before' => '<span>',

				'link_after'  => '</span>',

				'pagelink'    => '<span class="screen-reader-text">' . esc_attr__( 'Page', 'onecommunity' ) . ' </span>%',

				'separator'   => '<span class="screen-reader-text">, </span>',

			) );



		?>



    <div class="clear"></div>



 		<?php



			if ( is_singular( 'attachment' ) ) {

				// Parent post navigation.

				the_post_navigation( array(

					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'onecommunity' ),

				) );

			} elseif ( is_singular( 'post' ) ) {

				// Previous/next post navigation.

				the_post_navigation( array(

					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_attr__( 'Next', 'onecommunity' ) . '</span> ' .

						'<span class="screen-reader-text">' . esc_attr__( 'Next post:', 'onecommunity' ) . '</span> ' .

						'<span class="post-title">%title</span>',

					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_attr__( 'Previous', 'onecommunity' ) . '</span> ' .

						'<span class="screen-reader-text">' . esc_attr__( 'Previous post:', 'onecommunity' ) . '</span> ' .

						'<span class="post-title">%title</span>',

				) );

			}



			// End of the loop.

		endwhile;

		?>



    <div class="clear"></div>



		</article>



		<?php

			// If comments are open or we have at least one comment, load up the comment template.

			if ( comments_open() || get_comments_number() ) {

				comments_template();

			}

		?>



</main><!-- content -->



<?php if( is_active_sidebar('sidebar-single') ) { ?>



<div id="sidebar-spacer"></div>



<aside id="sidebar" class="sidebar">



	<?php

	$transient = get_transient( 'onecommunity_sidebar_single' );

	if ( false === $transient || !get_theme_mod( 'onecommunity_transient_sidebar_single_enable', 0 ) == 1 ) {

	ob_start();

	if (function_exists('dynamic_sidebar') && dynamic_sidebar('sidebar-single')) : endif;



	$sidebar = ob_get_clean();

	print_r($sidebar);



	if ( get_theme_mod( 'onecommunity_transient_sidebar_single_enable', 0 ) == 1 ) {

		set_transient( 'onecommunity_sidebar_single', $sidebar, MINUTE_IN_SECONDS * get_theme_mod( 'onecommunity_transient_sidebar_pages_expiration', 20 ) );

	}



	} else {

		echo '<!-- Transient onecommunity_sidebar_single ('.get_theme_mod( 'onecommunity_transient_sidebar_pages_expiration', 20 ).' min) -->';

		print_r( $transient );

	}

	?>



</aside><!--sidebar ends-->



<?php } ?>



</section><!-- .wrapper -->





<script type="text/javascript">

if(document.querySelector(".single-achievement")){

var el = document.getElementsByTagName('body')[0];

el.classList.add('achievement-single-page');

var breadcrumbs = document.querySelectorAll('.breadcrumbs a')[1];

breadcrumbs.remove();

var breadcrumbs_container = document.querySelector('.breadcrumbs');

var result = breadcrumbs_container.innerHTML.replace("/    /    ", "");

breadcrumbs_container.innerHTML = result;

}

</script>



<?php get_footer(); ?>