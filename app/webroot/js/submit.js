$(function(){
	$('.submit').on('click',function(){
		$(this).closest('form').submit();
	});

	$('input').on("keydown",function(e){
		if(e.keyCode == 13){
			$(this).closest('form').submit();
		}
	});
});


