<?php 
function create_student_post_type()
{
    register_post_type('students',
    [
    'labels' => [
        'name' => __('Students'),
        'singular_name' => __('Student'),
    ],
    'public'      => true,
    'has_archive' => true,
    'show_in_menu' => true
]
);
}
add_action('init', 'create_student_post_type');