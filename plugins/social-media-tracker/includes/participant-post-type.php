<?php
function create_social_post_type()
{
    register_post_type('social_media_tracker',
    [
    'labels' => [
        'name' => __('Social Media Tracker'),
        'singular_name' => __('Social Media Tracker'),
    ],
    'public' => true,
    'has_archive' => true,
    'show_in_menu' => true,
	'menu_icon' => 'dashicons-share',
	]
	);
}
add_action('init', 'create_social_post_type');
