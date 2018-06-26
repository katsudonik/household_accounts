
function display_loading(){
    $('.list').append("<img src=\"/img/loading01_r3_c5.gif\"/>");
}



function render_c3(data){
  $(function(){
      localStorage.setItem('cache_data', JSON.stringify(data));
      $('.list').empty();
      data['aggregateItemHistories'].forEach(function(record) {
        $('.list').append("<tr><td>" + record['name'] + "</td><td>" + record['schedule_price'] + "</td><td>" + record['price'] + "</td><td>" + record['remain'] + "</td><td><div id=chart_"  + record['id'] + "></div></td></tr>");
      });

      _data = data['aggregateSumHistory'];
      $('.list').append("<tr><td>Sum</td><td><b>" + _data['schedule_price'] + "</b></td><td><b>" + _data['price'] + "</b></td><td><b>" + _data['remain'] + "</b></td></tr>");
  });
}


function aggregate_c3(fnc){
  display_loading();
  $(function(){
    $.ajax({
      url:'/purchase_histories/aggregate_by_item',
      type:'GET',
      data:{
          'ym':$('.term_selector').val(),
          'term_type': 'm',
      }
    })
    .done( (data) => {
        console.log(data);
        fnc(data);
    })
    .fail( (data) => {
        $('.result').html(data);
        console.log(data);
    });
  });
}

function aggregate_c3_pie(){
  $(function(){
    function render_c3_pie(data){
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

      render_c3_pie(JSON.parse(localStorage.getItem('cache_data')));
  });
}

function aggregate_c3_item(){
	$(function(){
  		function render_c3(data){
	        	columns = [];
                        $('.list').empty();
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

            display_loading();
	    $.ajax({
	        url:'/purchase_histories/aggregate_by_item',
	        type:'GET',
	        data:{
                    'term_type': 'y',
                    'y':$('.term_selector').val(),
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
                    'y':$('.term_selector').val(),
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
