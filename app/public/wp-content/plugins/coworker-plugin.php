<?php
/*
 * Plugin Name: Coworker Plugin
 */

 function coworker_post_type() {
   // Coworker Post Type
   register_post_type('coworker', array(
     'show_in_rest' => true,
     'supports' => array('title', 'editor'),
     'public' => true,
     'labels' => array(
       'name' => 'Coworkers',
       'add_new_item' => 'Add New Coworker',
       'edit_item' => 'Edit Coworker',
       'all_items' => 'All Coworkers',
       'singular_name' => 'Coworker'
     ),
     'menu_icon' => 'dashicons-businessman'
   ));
 }
 
 add_action('init', 'coworker_post_type');

function custom_coworker_template($single_template) {
  global $post;

  if ($post->post_type == 'coworker') {
      // Get the template file path
      $template = locate_template(array('single-coworker.php'));
      
      // Check if the template file exists
      if (!$template) {
          // If the template file doesn't exist in the theme, use the plugin template
          $template = plugin_dir_path(__FILE__) . 'single-coworker.php';
      }
      return $template;
  }
  return $single_template;
}
add_filter('single_template', 'custom_coworker_template');
