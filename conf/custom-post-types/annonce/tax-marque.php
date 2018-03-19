<?php

// Taxonomie : MARQUE

$marque_labels = array(
	'name'              => _x( 'Marques', 'taxonomy general name', THEME_NAME_SPACE ),
	'singular_name'     => _x( 'Marque', 'taxonomy singular name', THEME_NAME_SPACE ),
	'search_items'      => __( 'Rechercher une marque', THEME_NAME_SPACE ),
	'all_items'         => __( 'Toutes les marques', THEME_NAME_SPACE ),
	'parent_item'       => __( 'Marque parente', THEME_NAME_SPACE ),
	'parent_item_colon' => __( 'Marque parente:', THEME_NAME_SPACE ),
	'edit_item'         => __( 'Modifier la marque', THEME_NAME_SPACE ),
	'update_item'       => __( 'Mettre à jour la marque', THEME_NAME_SPACE ),
	'add_new_item'      => __( 'Ajouter une nouvelle marque', THEME_NAME_SPACE ),
	'new_item_name'     => __( 'Nom de la nouvelle marque', THEME_NAME_SPACE ),
	'menu_name'         => __( 'Marque', THEME_NAME_SPACE ),
);

$marque_args = array(
	'hierarchical'      => true, // true = catégorie et false = étiquettes
	'labels'            => $marque_labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'marques' ),
);
register_taxonomy( 'marque', array('annonce'), $marque_args );