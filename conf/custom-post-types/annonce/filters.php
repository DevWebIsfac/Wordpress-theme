<?php

function filters_annonces($query){
	if ( !is_admin() && $query->is_main_query() ) {
		if ( get_query_var( 'orderBy', false ) && get_query_var( 'order', false ) ) {
				$query->set('meta_key', 'wpg_annonce_prix' );
	            $query->set('orderby', 'meta_value_num');
	            $query->set('order', get_query_var( 'order', false ) );
		}
	}
}
add_action( 'pre_get_posts', 'filters_annonces', 1 );

function annonce_query_var( $vars ){
    $vars[] = "orderBy";
    $vars[] = "order";
    return $vars;
}
add_filter( 'query_vars', 'annonce_query_var' );