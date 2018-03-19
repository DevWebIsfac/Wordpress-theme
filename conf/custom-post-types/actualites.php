<?php

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Actualités';
    $submenu['edit.php'][5][0] = 'Actualités';
    $submenu['edit.php'][10][0] = 'Ajouter une actualité';
    $submenu['edit.php'][16][0] = 'Actualités Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Actualités';
    $labels->singular_name = 'Actualités';
    $labels->add_new = 'Ajouter une actualité';
    $labels->add_new_item = 'Ajouter une actualité';
    $labels->edit_item = 'Modifier l\'actualité';
    $labels->new_item = 'Actualités';
    $labels->view_item = 'voir l\'actualité';
    $labels->search_items = 'Rechercher une actualité';
    $labels->not_found = 'Aucune actualité trouvée';
    $labels->not_found_in_trash = 'Aucune actualité trouvée dans la corbeille';
    $labels->all_items = 'All actualité';
    $labels->menu_name = 'Actualités';
    $labels->name_admin_bar = 'Actualités';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );