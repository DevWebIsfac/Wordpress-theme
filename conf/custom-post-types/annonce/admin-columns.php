<?php

// Gestion des colonnes

function sbt_projet_columns_head($defaults) {

	$new = array();
	foreach($defaults as $key => $title) {
    if ($key=='taxonomy-marque') {
        $new['thumb'] = 'Image';
    }
    if ($key=='date') {
        $new['prix'] = 'Prix';
    }
    if ( $key!='taxonomy-couleur' && $key!='taxonomy-options' ) {
      $new[$key] = $title;
    }
	}
	return $new;
}
 
function sbt_projet_columns_content($column_name, $post_ID) {
    if ($column_name == 'thumb') {
        the_post_thumbnail('thumbnail', array('style'=>'max-width:100%; height: auto;'));
    }
    if ($column_name == 'prix') {
      $prix = get_post_meta( $post_ID, 'wpg_annonce_prix', true );
      if ($prix) {
          echo number_format($prix,0,',',' ') . '&nbsp;&euro;';
      }
    }
}


function sbt_projet_columns_orderby( $query ) {
  if ( ! is_admin() )
    return;

  $orderby = $query->get( 'orderby');

  if ( 'prix' == $orderby ) {
    $query->set( 'meta_key', 'wpg_annonce_prix' );
    $query->set( 'orderby', 'meta_value_num' );
  }

}


function sbt_projet_columns_sortable( $columns ) {
  $columns['prix'] = 'prix';
  
  return $columns;
}


add_filter('manage_annonce_posts_columns', 'sbt_projet_columns_head');
add_action('manage_annonce_posts_custom_column', 'sbt_projet_columns_content', 10, 2);
add_action( 'pre_get_posts', 'sbt_projet_columns_orderby' );
add_filter( 'manage_edit-annonce_sortable_columns', 'sbt_projet_columns_sortable' );