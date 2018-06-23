function aggregate_c3(){
	$(function(){
		function render_c3(data){
			data['aggregateItemHistories'].forEach(function(record) {
	              c3.generate({
	            	  bindto: '#chart_' + record['id'],
	            	  size: {
	            	        height: 120,
	            	        width: 120
	            	  },
	                  data: {
	                      type : 'pie',
	                      columns: [
	                          ['price', record['price']],
	                          ['remain', record['remain']],
	                      ],
	                  }
	              });
	        });
		}

		$.ajax({
	        url:'/purchase_histories/aggregate_c3',
	        type:'GET',
	        data:{
	            'ym':$('.ym').val(),
	        }
	    })
	    .done( (data) => {
	        console.log(data);
	        render_c3(data);
	    })
	    .fail( (data) => {
	        $('.result').html(data);
	        console.log(data);
	    });
	});
}

function aggregate_c3_item(){
	$(function(){
  		function render_c3(data){
	        	columns = [];
	                data['aggregateItemHistories'].forEach(function(record) {
                                $('.list').append("<tr><td>" + record['name'] + "</td><td>" + record['price'] + "</td></tr>"); 
	            	 	columns.push([record['name'], record['price']]);
	                });
                        $('.list').append("<tr><td>Sum</td><td><b>" + data['aggregateSumHistory']['price'] + "</b></td></tr>");

	            	c3.generate({
	            	 	bindto: '#chart_item',
	            	         data: {
	            	             columns: columns,
	            	             type : 'pie',
	            	     }
	            	});
		}

	    $.ajax({
	        url:'/purchase_histories/aggregate_by_item',
	        type:'GET',
	        data:{
	            'y':$('.y').val(),
	        }
	    })
	    .done( (data) => {
	        console.log(data);
	        render_c3(data);
	    })
	    .fail( (data) => {
	        $('.result').html(data);
	        console.log(data);
	    });
	});
}

function aggregate_c3_all(){
	$(function(){
		function render_c3(data){
			c3.generate({
	      	  bindto: '#chart_all',
	            data: {
	                columns: data['aggregateItemHistories'],
	            }
	        });
		}

	    $.ajax({
	        url:'/purchase_histories/aggregate_timeline',
	        type:'GET',
	        data:{
	            'y':$('.y').val(),
	        }
	    })
	    .done( (data) => {
	        console.log(data);
	        render_c3(data);
	    })
	    .fail( (data) => {
	        $('.result').html(data);
	        console.log(data);
	    });
	});
}
