<?php function d($value){
    if (is_array($value)){
        echo '<pre>' .var_dump($value); echo '</pre>';die();
    }
    if (is_object($value)){
       echo '<pre>'. print_r($value); echo '</pre>'; die();
    }
    else{
        var_dump($value);die();
    }
}?>
<?php $user = wp_get_current_user();

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
$theProgramID = $usersPrograms->posts[0]->ID;

$studentArgs = array (
    'post_type' => 'cee_members', 
    'meta_query' => array (
        array(
            'program_%_name' => $theProgramID
            )
    )
);

$students = new WP_Query($studentArgs);
$students = $students->posts;
$studentsSelectBox = [];
$counter = 0;
foreach($students as $student){
    $studentsSelectBox[$counter]['value'] = $student->ID;
    $studentsSelectBox[$counter]['text'] = $student->post_title;
    $counter ++;
}
?>

<h1>Enter the Info for your CEE member here.</h1>

<select class="cee_member" name="student">
    <?php foreach ($studentsSelectBox as $option) :?>
        <option value="<?php echo $option['value']?>"><?php echo $option['text'];?></option>
<?php endforeach;?>    
</select>
<textarea class="cee_notes">
</textarea>
<button class="submit enter-member-data">Submit</button>