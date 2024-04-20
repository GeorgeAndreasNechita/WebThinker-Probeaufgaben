<?php

get_header();

while (have_posts()) {
  the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <div><?php the_content(); ?></div>
    <?php 
    $post_id = get_the_ID();

    // Get coworker data
    $name = get_post_meta( $post_id, '_coworker_name', true );
    $surname = get_post_meta( $post_id, '_coworker_surname', true );
    $phone = get_post_meta( $post_id, '_coworker_phone', true );
    $email = get_post_meta( $post_id, '_coworker_email', true );
    
    // Display coworker data
    echo '<h2>' . $name . ' ' . $surname . '</h2>';
    echo '<p><strong>Phone:</strong> ' . $phone . '</p>';
    echo '<p><strong>Email:</strong> <a href="mailto:' . $email . '">' . $email . '</a></p>';
    ?>



<?php }

get_footer();

?>