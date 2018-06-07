
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
	$('.item_id_before').hide();
	$('._id').show();

	$('._edit').on('click',function(){
		$tr = $(this).closest('tr');
		$tr.find('span').hide();
		$tr.find('input').show();
		$tr.find('select').show();
		$tr.find('.cancel').show();
		$tr.find('.submit').show();
		$tr.find('.delete').hide();
		$(this).hide();
		$tr.find('.price').focus();
	});

	$('.cancel').on('click',function(){
		$tr = $(this).closest('tr');
		$tr.find('span').show();
		$('.item_id_before').hide();
		$tr.find('input').hide();

		$tr.find('input').each(function(i){
			$(this).val($(this).prev('span').text());
		});
		$tr.find('select').each(function(i){
			$(this).val($(this).prev('span').find('.item_id_before').text());
		});

		$tr.find('select').hide();
		$tr.find('.submit').hide();
		$tr.find('._edit').show();
		$tr.find('.delete').show();
		$(this).hide();
	});

	$('.delete').on('click',function(){
		$tr = $(this).closest('tr');
	    $.ajax({
	        url:'/purchase_histories/delete_ajax',
	        type:'POST',
	        data:{
	        	'id' : $(this).data('id'),
	        }
	    })
	    .done( (data) => {
	        console.log(data);
	        $tr.hide();
	    })
	    .fail( (data) => {
	        console.log(data);
	    });
	});

	$('.submit').on('click',function(){
		$(this).closest('form').submit();
	});

	$('input').on("keydown",function(e){
		if(e.ctrlKey && e.keyCode == 81){
			$(this).closest('form').submit();
		}
	});


});


