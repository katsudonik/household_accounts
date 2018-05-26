
$(function(){
	$('.ym').change(function() {
		location.href = "/purchase_histories/?ym=" + $(this).val();;
	});
});



