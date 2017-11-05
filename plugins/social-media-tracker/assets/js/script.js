jQuery(document).ready(function($){
    $('.enter-member-data').click(function(){
        var studentId = $('.cee_member').find(':selected').val();
        var studentNotes = $('.cee_notes').val();
        var fieldstoValidate = [studentId, studentNotes];
        var valid = validate(fieldstoValidate);
        if (valid){
            var data = {
                action: 'hit_my_ajax',
                studentId: studentId,
                studentNotes: studentNotes,
            }

            $.post(myAjax.ajax_url, data, function(response){
                if (JSON.parse(response).result === 'success'){
                    alert('you did it!');
                }
            })
        }
        else {
            alert('some fields are empty');
        }
    });
    function validate(field){
        var formValid = true;        
        $.each(field, function(index, value){
            if (value === undefined || value === ""){
                formValid =  false;
            }
        });
        console.log(formValid);
        return formValid;
    }
});
