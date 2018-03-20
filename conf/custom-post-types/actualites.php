<?php

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = __('Actualités',THEME_NAME_SPACE);
    $submenu['edit.php'][5][0] = __('Actualités',THEME_NAME_SPACE);
    $submenu['edit.php'][10][0] = __('Ajouter une actualité',THEME_NAME_SPACE);
    $submenu['edit.php'][16][0] = __('Actualités Tags',THEME_NAME_SPACE);
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('Actualités',THEME_NAME_SPACE);
    $labels->singular_name = __('Actualités',THEME_NAME_SPACE);
    $labels->add_new = __('Ajouter une actualité',THEME_NAME_SPACE);
    $labels->add_new_item = __('Ajouter une actualité',THEME_NAME_SPACE);
    $labels->edit_item = __('Modifier l\'actualité',THEME_NAME_SPACE);
    $labels->new_item = __('Actualités',THEME_NAME_SPACE);
    $labels->view_item = __('voir l\'actualité',THEME_NAME_SPACE);
    $labels->search_items = __('Rechercher une actualité',THEME_NAME_SPACE);
    $labels->not_found = __('Aucune actualité trouvée',THEME_NAME_SPACE);
    $labels->not_found_in_trash = __('Aucune actualité trouvée dans la corbeille',THEME_NAME_SPACE);
    $labels->all_items = __('All actualité',THEME_NAME_SPACE);
    $labels->menu_name = __('Actualités',THEME_NAME_SPACE);
    $labels->name_admin_bar = __('Actualités',THEME_NAME_SPACE);
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );