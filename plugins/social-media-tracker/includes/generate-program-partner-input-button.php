<?php
add_action('admin_menu', 'generate_partner_button');

function generate_partner_button(){
    global $current_user; // Use global
    wp_get_current_user(); // Make sure global is set, if not set it.
    if( user_can( $current_user, "subscriber" ) && !user_can($current_user, '"administrator')){
        add_menu_page('Enter Data', 'Enter Data', 'subscriber', 'Enter Data', 'generate_page');

    }
    function generate_page (){
        require_once 'enter-info.php';

    }


}
