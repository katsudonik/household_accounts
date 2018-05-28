
$(function(){
	$('.ym').change(function() {
		location.href = "/purchase_histories/?ym=" + $(this).val();;
	});
	$('.ym_aggs').change(function() {
		location.href = "/purchase_histories/aggregate_by_month?ym=" + $(this).val();;
	});
	$('.y_aggs').change(function() {
		location.href = "/purchase_histories/aggregate_by_year?y=" + $(this).val();;
	});


	$('.cancel').hide();
	$('.submit').hide();

	$('._edit').on('click',function(){
		$tr = $(this).closest('tr');
		$tr.find('span').hide();
		$tr.find('input').show();
		$tr.find('select').show();
		$tr.find('.cancel').show();
		$tr.find('.submit').show();
		$tr.find('.delete').hide();
		$(this).hide();
	});

	$('.cancel').on('click',function(){
		$tr = $(this).closest('tr');
		$tr.find('span').show();
		$tr.find('input').hide();
		$tr.find('select').hide();
		$tr.find('.submit').hide();
		$tr.find('._edit').show();
		$tr.find('.delete').show();
		$(this).hide();
	});

	$('.submit').on('click',function(){
		$(this).closest('form').submit();
		$tr = $(this).closest('tr');
		$tr.find('input').each(function(i){
			console.log($(this).val());
		});

	});


});


