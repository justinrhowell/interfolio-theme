<?php

function interfolio_nav_menu_objects($sorted_menu_items, $args){
    if ($args->theme_location == 'menu-2') {
        $args->menu_class .= " row";
        foreach($sorted_menu_items as $item) { 
            if($item->menu_item_parent) {
                $item->classes[] = 'footer-children';
            }else {
                $item->classes[] = 'col-3 footer-links';
            }
        }
    }else if ($args->theme_location == 'menu-3') {
        foreach($sorted_menu_items as $item) {
            $item->classes[] = 'bottom-footer-items';
        }
    }

    return $sorted_menu_items;
}
add_filter('wp_nav_menu_objects', 'interfolio_nav_menu_objects', 10, 2);

add_filter('nav_menu_submenu_css_class', function($classes, $args){
    if($args->menu->slug == 'main-menu'){
        $classes[] = 'container';
    }
    return $classes;
}, 10, 2);