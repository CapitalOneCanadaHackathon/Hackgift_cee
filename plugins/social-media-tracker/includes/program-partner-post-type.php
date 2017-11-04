<?php

function add_program_partner_post_type(){
    register_post_type( 'program_partner',
    array(
      'labels' => array(
        'name' => __( 'Program Partners' ),
        'singular_name' => __( 'Program Partner' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action('init', 'add_program_partner_post_type');