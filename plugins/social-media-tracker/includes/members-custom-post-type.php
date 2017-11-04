<?php
function create_member_post_type()
{
    register_post_type('Members',
    [
    'labels' => [
        'name' => __('Members'),
        'singular_name' => __('Member'),
    ],
    'public' => true,
    'has_archive' => true,
    'show_in_menu' => true,
	'menu_icon' => 'dashicons-id-alt',
	]
	);
}
add_action('init', 'create_member_post_type');

// function my_acf_set_repeater( $value, $post_id, $field ){
//
//     // echo '<pre>'; print_r($value); echo '</pre>';
//
//     // this one should consists array of the names
//     $settings_values = get_field('medication_types','option');
//
//     $i = 0;
//
//     foreach( $settings_values as $settings_value ){
//
//       $value[$i]['field_582e293d22e63'] = $settings_value['type'];
//
//       $i++;
//
//     }
//
//     //echo '<pre>'; print_r($value); echo '</pre>';
//
//     return $value;
//
// }
//
// add_filter('acf/load_value/name=medication', 'my_acf_set_repeater', 10, 3);
//
//
// function acf_load_location_list_field_choices(  $values, $post_id, $field  ) {
// 	global $current_user;
// 	// get the locations
// 	$args = array(
// 		'post_type'         => 'member',
// 		'post_status'       => 'publish',
// 		'author'			=>	$current_user->ID,
// 		'posts_per_page'    => 1
// 	);
//
// 	$loc = query_posts($args);
// 	while ( have_posts() ) : the_post();
// 		// the store location
// 		$availableLoc = get_field('location');
// 	endwhile;
// 	wp_reset_query();
//
// 	$i = 0;
// 	$j = 0;
// 	foreach($availableLoc as $location) {
// 		$value[$j]['field_59020c12a5297'] = $location['city_name'];
//
// 		$j++;
// 	}
//
// 	// return the field
// 	return $value;
//
// }
//
// // add this mailing list filter
// add_filter('acf/load_value/key=field_59035148f1860', 'acf_load_location_list_field_choices', 10, 3);
