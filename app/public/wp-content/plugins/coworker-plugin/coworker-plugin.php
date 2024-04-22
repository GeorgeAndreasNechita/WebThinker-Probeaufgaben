<?php
/*
 * Plugin Name: Coworker Plugin
 * Description: A custom plugin for adding a new post of type coworker and showing it in the frontend
 * Version: 1.0
 * Author: George Andreas Nechita
 */

// Register custom post type for coworker
function register_coworker_post_type() {
  $labels = array(
      'name'               => _x( 'Coworkers', 'post type general name', 'textdomain' ),
      'singular_name'      => _x( 'Coworker', 'post type singular name', 'textdomain' ),
      'menu_name'          => _x( 'Coworkers', 'admin menu', 'textdomain' ),
      'name_admin_bar'     => _x( 'Coworker', 'add new on admin bar', 'textdomain' ),
      'add_new'            => _x( 'Add New', 'coworker', 'textdomain' ),
      'add_new_item'       => __( 'Add New Coworker', 'textdomain' ),
      'new_item'           => __( 'New Coworker', 'textdomain' ),
      'edit_item'          => __( 'Edit Coworker', 'textdomain' ),
      'view_item'          => __( 'View Coworker', 'textdomain' ),
      'all_items'          => __( 'All Coworkers', 'textdomain' ),
      'search_items'       => __( 'Search Coworkers', 'textdomain' ),
      'parent_item_colon'  => __( 'Parent Coworkers:', 'textdomain' ),
      'not_found'          => __( 'No coworkers found.', 'textdomain' ),
      'not_found_in_trash' => __( 'No coworkers found in Trash.', 'textdomain' )
  );

  $args = array(
      'labels'             => $labels,
      'description'        => __( 'Description.', 'textdomain' ),
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'coworker' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail', ),
  );

  register_post_type( 'coworker', $args );
}
add_action( 'init', 'register_coworker_post_type' );

// Add custom fields for coworker
function coworker_custom_fields() {
  add_meta_box(
      'coworker_fields',
      __( 'Coworker Details', 'textdomain' ),
      'coworker_fields_callback',
      'coworker',
      'normal',
      'default'
  );
}
add_action( 'add_meta_boxes', 'coworker_custom_fields' );

function coworker_fields_callback( $post ) {
  wp_nonce_field( 'coworker_meta_box', 'coworker_meta_box_nonce' );

  $name = get_post_meta( $post->ID, '_coworker_name', true );
  $surname = get_post_meta( $post->ID, '_coworker_surname', true );
  $phone = get_post_meta( $post->ID, '_coworker_phone', true );
  $email = get_post_meta( $post->ID, '_coworker_email', true );

  echo '<p><label for="coworker_name">' . __( 'Name', 'textdomain' ) . '</label>';
  echo '<input type="text" id="coworker_name" name="coworker_name" value="' . esc_attr( $name ) . '" size="25"  style="margin-left: 20px;" /></p>';

  echo '<p><label for="coworker_surname">' . __( 'Surname', 'textdomain' ) . '</label>';
  echo '<input type="text" id="coworker_surname" name="coworker_surname" value="' . esc_attr( $surname ) . '" size="25"  style="margin-left: 20px;" /></p>';

  echo '<p><label for="coworker_phone">' . __( 'Phone', 'textdomain' ) . '</label>';
  echo '<input type="text" id="coworker_phone" name="coworker_phone" value="' . esc_attr( $phone ) . '" size="25"  style="margin-left: 20px;" /></p>';

  echo '<p><label for="coworker_email">' . __( 'Email', 'textdomain' ) . '</label>';
  echo '<input type="text" id="coworker_email" name="coworker_email" value="' . esc_attr( $email ) . '" size="25"  style="margin-left: 20px;" /></p>';
}

// Save custom field data for coworker
function save_coworker_custom_fields( $post_id ) {
  if ( ! isset( $_POST['coworker_meta_box_nonce'] ) ) {
      return;
  }

  if ( ! wp_verify_nonce( $_POST['coworker_meta_box_nonce'], 'coworker_meta_box' ) ) {
      return;
  }

  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
      return;
  }

  if ( isset( $_POST['post_type'] ) && 'coworker' != $_POST['post_type'] ) {
      return;
  }

  if ( ! current_user_can( 'edit_post', $post_id ) ) {
      return;
  }

  if ( isset( $_POST['coworker_name'] ) ) {
      update_post_meta( $post_id, '_coworker_name', sanitize_text_field( $_POST['coworker_name'] ) );
  }

  if ( isset( $_POST['coworker_surname'] ) ) {
      update_post_meta( $post_id, '_coworker_surname', sanitize_text_field( $_POST['coworker_surname'] ) );
  }

  if ( isset( $_POST['coworker_phone'] ) ) {
      update_post_meta( $post_id, '_coworker_phone', sanitize_text_field( $_POST['coworker_phone'] ) );
  }

  if ( isset( $_POST['coworker_email'] ) ) {
      update_post_meta( $post_id, '_coworker_email', sanitize_email( $_POST['coworker_email'] ) );
  }
}
add_action( 'save_post', 'save_coworker_custom_fields' );
