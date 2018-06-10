$(function(){
	$('.term_selector').change(function() {
		location.href = $(this).data('url') + $(this).val();;
	});
	$('.y_aggs').change(function() {
		location.href = "/purchase_histories/aggregate_by_year?y=" + $(this).val();;
	});
});


