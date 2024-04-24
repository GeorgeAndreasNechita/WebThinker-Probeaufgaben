<?php

function my_theme_enqueue_styles() {
  wp_enqueue_style( 'my_theme_style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function activate_appearance_menu(){
  register_nav_menu('header_menu','Header Menu Location');
}

add_action( 'after_setup_theme', 'activate_appearance_menu' );