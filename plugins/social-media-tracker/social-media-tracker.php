
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
require_once plugin_dir_path( __FILE__ ) . 'includes/participant-post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/generate-student-field-group-acf.php';

//PLUGIN RESOURCES
function admin_load_js(){
    wp_enqueue_style('social_media_css', plugin_dir_url(__FILE__) . 'assets/css/main.css');
    wp_enqueue_script( 'social_media_js', plugin_dir_url( __FILE__ ) . 'assets/js/script.js',  array('jquery'), '1.7.2' );
}
add_action('admin_enqueue_scripts', 'admin_load_js');

