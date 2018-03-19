<?php


// Taxonomie : Option

$marque_labels = array(
	'name'              => _x( 'Options', 'taxonomy general name', THEME_NAME_SPACE ),
	'singular_name'     => _x( 'Option', 'taxonomy singular name', THEME_NAME_SPACE ),
	'search_items'      => __( 'Rechercher une option', THEME_NAME_SPACE ),
	'all_items'         => __( 'Toutes les options', THEME_NAME_SPACE ),
	'parent_item'       => __( 'Option parente', THEME_NAME_SPACE ),
	'parent_item_colon' => __( 'Option parente:', THEME_NAME_SPACE ),
	'edit_item'         => __( 'Modifier la option', THEME_NAME_SPACE ),
	'update_item'       => __( 'Mettre à jour la option', THEME_NAME_SPACE ),
	'add_new_item'      => __( 'Ajouter une nouvelle option', THEME_NAME_SPACE ),
	'new_item_name'     => __( 'Nom de la nouvelle option', THEME_NAME_SPACE ),
	'menu_name'         => __( 'Options', THEME_NAME_SPACE ),
);

$marque_args = array(
	'hierarchical'      => false, // true = catégorie et false = étiquettes
	'labels'            => $marque_labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'options' ),
);
register_taxonomy( 'options', array('annonce'), $marque_args );