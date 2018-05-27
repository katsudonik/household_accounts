
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
});



