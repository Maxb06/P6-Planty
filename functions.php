<?php

/**
** activation theme
**/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));

}

// public 'theme_location' => string 'primary' (length=7)

function admin_link( $items, $args ) {
  
  if ( $args->theme_location === 'primary' ) {  // le menu visible que dans le header

    if (is_user_logged_in() ) {
      $items .= '<li><a href="'.get_admin_url().'">Admin</a></li>'; // code pour ajouter Admin au menu
    }
  }
  
  return $items;
}

add_filter( 'wp_nav_menu_items', 'admin_link', 10, 2 ); 

?>