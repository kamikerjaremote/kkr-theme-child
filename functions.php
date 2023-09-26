<?php

function onecommunity_js_functions_child() {
wp_enqueue_script( 'onecommunity-js-functions-child', get_stylesheet_directory_uri() . '/js/functions.js', true, null, 'in_footer' );
}
add_action( 'wp_enqueue_scripts', 'onecommunity_js_functions_child' );


function onecommunity_child_enqueue_styles() {
	wp_enqueue_style('parent-theme', get_template_directory_uri() .'/style.css');
}
add_action('wp_enqueue_scripts', 'onecommunity_child_enqueue_styles');

	
register_sidebar(array(
	'name' => 'Sidebar - Event',
	'id'   => 'sidebar-event',
	'description'   => 'This is a widgetized area visible on the event pages.',
	'before_widget' => '<div class="sidebar-box %2$s widget"  id="%1$s">',
	'after_widget'  => '</div><!--sidebar-box ends--><div class="clear"></div>',
	'before_title'  => '<div class="sidebar-title">',
	'after_title'   => '</div>'
));

register_sidebar(array(
	'name' => 'Sidebar - Leaderboard',
	'id'   => 'sidebar-leaderboard',
	'description'   => 'This is a widgetized area visible on the leaderboard pages.',
	'before_widget' => '<div class="sidebar-box %2$s widget"  id="%1$s">',
	'after_widget'  => '</div><!--sidebar-box ends--><div class="clear"></div>',
	'before_title'  => '<div class="sidebar-title">',
	'after_title'   => '</div>'
));
