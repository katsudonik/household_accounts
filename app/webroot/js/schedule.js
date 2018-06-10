$(function(){
	$('.target_start_date').hide();
	$('.target_end_date').hide();

	$('.point').on('click',function(){
		$('.target_start_date').val('');
		$('.target_end_date').val('');
		$('.target_start_date').hide();
		$('.target_end_date').hide();
		$('.target_date').show();
	});

	$('.term').on('click',function(){
		$('.target_date').val('');
		$('.target_date').hide();
		$('.target_start_date').show();
		$('.target_end_date').show();
	});
});


