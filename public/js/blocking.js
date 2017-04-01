$(document).ready(function(){
	$(".unblock_vehicle").click(function(){
		blocking_id = $(this).attr('id');
		console.log(blocking_id);
		$.ajax({
			type: 'POST',
			url: 'http://localhost/digiwizards/public/block_vehicle',
				headers: {
       				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
			data: {
				'blocking_id':blocking_id
			},
			success: function(data) {
				console.log(data);
				$("#row_"+blocking_id).text('');
			},
			error: function(data){
				console.log(data);
			}				
		})
	});
});