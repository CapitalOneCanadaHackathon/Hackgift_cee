
<?php
/*
    Plugin Name: Social Media Tracker
   Plugin URI: http://my-awesomeness-emporium.com
   Description: a plugin to track social media activity of users
   Version: 1.0
   Author: Survivors
   Jquery Version: 1.7.2

*/

//INCLUDES
require_once plugin_dir_path( __FILE__ ) . 'includes/program-partner-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/generate-program-partner-input-button.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/members-custom-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/acf_fields.php';

//PLUGIN RESOURCES
function admin_load_js(){
    wp_enqueue_style('social_media_css', plugin_dir_url(__FILE__) . 'assets/css/main.css');
    wp_enqueue_script( 'social_media_js', plugin_dir_url( __FILE__ ) . 'assets/js/script.js',  array('jquery'), '1.7.2' );
    wp_localize_script('social_media_js', 'myAjax', array('ajax_url' => admin_url( 'admin-ajax.php')));

}
add_action('admin_enqueue_scripts', 'admin_load_js');

function allow_wildcards( $where ) {
    global $wpdb;
    $where = str_replace(
    "meta_key = 'program_%_name",
    "meta_key LIKE 'program_%_name",
    $wpdb->remove_placeholder_escape($where)
    );
    return $where;
    }

    add_filter('posts_where', 'allow_wildcards');

    add_action("wp_ajax_hit_my_ajax", "hit_my_ajax");

    function hit_my_ajax(){
        $result = array (
            'result' => 'success'
        );

        echo json_encode($result);
        exit();
    }
