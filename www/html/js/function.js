function get_city_list(id){
	var a = id;
	//$('#city_data').html('');
		$.ajax({
			url: '/city/'+a,
			success: function(data){
				$('#city').html(data);
			}
		});
		return false;
}