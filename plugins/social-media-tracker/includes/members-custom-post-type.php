<?php
function create_member_post_type()
{
    register_post_type('cee_members',
    [
    'labels' => [
        'name' => __('CEE Members'),
        'singular_name' => __('CEE Member'),
    ],
    'public' => true,
    'has_archive' => true,
    'show_in_menu' => true,
	'menu_icon' => 'dashicons-id-alt',
	]
	);
}
add_action('init', 'create_member_post_type');

	

