$(function(){
	$('.term_selector').change(function() {
		location.href = $(this).data('url') + $(this).val();;
	});
});


