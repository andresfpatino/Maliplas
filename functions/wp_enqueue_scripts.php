<?php 

function enqueue_child_styles() {			
	// CSS
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');	
	wp_enqueue_style( 'theme-css', get_stylesheet_directory_uri() . '/assets/css/main.css');
	
	// JS
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), "1.0", true );	
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_styles' );