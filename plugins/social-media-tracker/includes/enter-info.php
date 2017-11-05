<h1>Enter the Info for your student here.</h1>
<?php
function d($obj) {
	echo '<pre>';
	print_r($obj);
	echo '</pre>';
}

//  function d($value){
//     if (is_array($value)){
//         echo '<pre>' .var_dump($value); echo '</pre>';die();
//     }
//     if (is_object($value)){
//        echo '<pre>'. print_r($value); echo '</pre>'; die();
//     }
//     else{
//         var_dump($value);die();
//     }
// }

$user = wp_get_current_user();

$args = array(
    'post_type' => 'program_partner',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'user',
            'value' => $user->ID
        ),
        array(
            'key' => 'additional_program_contacts_0_user_copy',
            'value' => $user->ID

        )
    )
        );
$usersPrograms = new WP_Query($args);
$theProgram = $usersPrograms->posts[0];
$theProgramID = $theProgram->ID;
// d($theProgramID);


$studentArgs = array (
    'post_type' => 'cee_members',
);

$students = new WP_Query($studentArgs);
$students = $students->posts;

$studentsSelectBox = [];
$counter = 0;
foreach($students as $student){
	// d($student);

	$programs = get_field('program', $student->ID);

	// check if the repeater field has rows of data
	if($programs) :
		if( have_rows('program', $student->ID) ):
			while( have_rows('program', $student->ID) ): the_row();
				$value = get_sub_field('name');
				// d($value->ID);
		        if ($value->ID == $theProgramID) :
					echo 'works <br />';

					$studentsSelectBox[$counter]['value'] = $student->ID;
					$studentsSelectBox[$counter]['text'] = $student->post_title;
					$counter ++;
		        endif;
			endwhile;
		endif;
	endif;
}
?>

<form class="" action="" method="post">
	<select name="student">
	    <?php foreach ($studentsSelectBox as $option) :?>
	        <option value="<?php echo $option['value']?>"><?php echo $option['text'];?></option>
	<?php endforeach;?>
	</select>
	<textarea class="notes" name="notes"></textarea>
	<button class="submit" type="submit" name="submit">Submit</button>
</form>

<?php

if(isset($_POST['submit'])):
	// d($_POST['student']);
echo 'Thank you for submitting your notes.';

if ( have_rows('program', $_POST['student'])) :
	$program = get_field('program', $_POST['student']);
	for ($i=0; $i < count(get_field('program', $_POST['student'])) ; $i++) :
		$programName = $program[$i]['name'];
		if ($programName != '') :
			if ($programName->ID == $theProgramID && $program[$i]['status'] == 'current') :
				$today = date('d/m/Y');
				// $row_id = add_row('field_59fe39149c2e2', $row, $students[0]->ID);
				// echo $row_id;

				//FIND OUT IF IT IS AN ARRAY ALREADY OR NOT
	            if( !is_array($program[$i]['notes']) ) {  //WE DONT HAVE ANY NOTES
	                $program[$i]['notes'] = array();
	            }
	            $addRow = array( //SET YOUR NEW ROW HERE
					'date_taken' => $today,
	                'note' => $_POST['notes'],
	            );
	            //ADD TO ARRAY
	            array_push($program[$i]['notes'], $addRow);

				$field_key = "field_59fe37e312391"; //FIELD KEY OF PARENT REPEATER 'media'
				update_field($field_key, $program, $_POST['student']);
			endif;
		endif;
	endfor;
endif;

endif;

?>
