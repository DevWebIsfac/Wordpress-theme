<?php
// Taxonomie : TYPE

$marque_labels = array(
	'name'              => _x( 'Types', 'taxonomy general name', THEME_NAME_SPACE ),
	'singular_name'     => _x( 'Type', 'taxonomy singular name', THEME_NAME_SPACE ),
	'search_items'      => __( 'Rechercher un type', THEME_NAME_SPACE ),
	'all_items'         => __( 'Toutes les marques', THEME_NAME_SPACE ),
	'parent_item'       => __( 'Type parente', THEME_NAME_SPACE ),
	'parent_item_colon' => __( 'Type parente:', THEME_NAME_SPACE ),
	'edit_item'         => __( 'Modifier le type', THEME_NAME_SPACE ),
	'update_item'       => __( 'Mettre à jour le type', THEME_NAME_SPACE ),
	'add_new_item'      => __( 'Ajouter un nouveau type', THEME_NAME_SPACE ),
	'new_item_name'     => __( 'Nom de le nouveau type', THEME_NAME_SPACE ),
	'menu_name'         => __( 'Type', THEME_NAME_SPACE ),
);

$marque_args = array(
	'hierarchical'      => true, // true = catégorie et false = étiquettes
	'labels'            => $marque_labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'types-de-voiture' ),
);
register_taxonomy( 'type', array('annonce'), $marque_args );