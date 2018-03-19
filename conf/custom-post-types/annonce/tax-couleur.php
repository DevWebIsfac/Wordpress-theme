<?php

// Taxonomie : Couleur

$marque_labels = array(
	'name'              => _x( 'Couleur', 'taxonomy general name', THEME_NAME_SPACE ),
	'singular_name'     => _x( 'Couleur', 'taxonomy singular name', THEME_NAME_SPACE ),
	'search_items'      => __( 'Rechercher un couleur', THEME_NAME_SPACE ),
	'all_items'         => __( 'Toutes les marques', THEME_NAME_SPACE ),
	'parent_item'       => __( 'Couleur parente', THEME_NAME_SPACE ),
	'parent_item_colon' => __( 'Couleur parente:', THEME_NAME_SPACE ),
	'edit_item'         => __( 'Modifier la couleur', THEME_NAME_SPACE ),
	'update_item'       => __( 'Mettre à jour la couleur', THEME_NAME_SPACE ),
	'add_new_item'      => __( 'Ajouter une nouvelle couleur', THEME_NAME_SPACE ),
	'new_item_name'     => __( 'Nom de la nouvelle couleur', THEME_NAME_SPACE ),
	'menu_name'         => __( 'Couleur', THEME_NAME_SPACE ),
);

$marque_args = array(
	'hierarchical'      => false, // true = catégorie et false = étiquettes
	'labels'            => $marque_labels,
	'show_ui'           => true,
	'show_admin_column' => true,
	'query_var'         => true,
	'rewrite'           => array( 'slug' => 'couleurs' ),
);
register_taxonomy( 'couleur', array('annonce'), $marque_args );