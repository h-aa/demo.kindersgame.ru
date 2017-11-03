function get_subject_teachers(id){
	var a = id;
	$('#select3_data').html('');
		$.ajax({
			url: '/subject_teachers/'+a,
			success: function(data){
				$('#select3_data').html(data);
			}
		});
		return false;
}

function get_teacher_time_to_lesson(){
    var a = $("#lesson_add").serialize();
    $('#select5_data').html('');
    $.ajax({
		type: "POST",
		url: '/free_teacher_time_to_lesson',
		data: a,
		success: function(data) {
			$("#select5_data").html(data);
            
		}
	});
	return false;    
}