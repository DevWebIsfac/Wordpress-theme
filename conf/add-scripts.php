<?php
// Ajout des scripts CSS et JS
function wp_garage_add_scripts(){

	// Ajoute le CSS de Bootstrap
	wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');

	wp_enqueue_style('iconic-css', 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array() );

	// Ajoute le CSS principal du thème
	wp_enqueue_style('site-css', get_template_directory_uri().'/style.css', array('bootstrap-css') );


	// Ajout des JS pour Bootstrap
	wp_enqueue_script('jquery-slim', 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
	wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',array('jquery-slim','popper'));
	
	wp_enqueue_script('match-height', get_template_directory_uri().'/js/jquery.match-height.js');
	wp_enqueue_script('site-js', get_template_directory_uri().'/js/scripts.js', array('match-height'));
}
add_action('wp_enqueue_scripts', 'wp_garage_add_scripts');

add_action('admin_enqueue_scripts',function(){
	wp_register_script( 'uploader_js', get_template_directory_uri().'/js/admin.js');
	wp_enqueue_script( 'uploader_js' );
}); 