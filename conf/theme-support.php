<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'small-annonce', 350, 250, true );
add_image_size( 'annonce', 760, 500, true );
add_image_size( 'diapo', 760, 400, false );
add_image_size( 'hero', 1280, 500, true );

add_theme_support( 'custom-logo' );

// Longueur de l'extrait
function wpdocs_custom_excerpt_length( $length ) {
    global $post;
    if ($post->post_type == 'post')
    return 32;
    else if ($post->post_type == 'annonce')
    return 10;
    else
    return 80;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );