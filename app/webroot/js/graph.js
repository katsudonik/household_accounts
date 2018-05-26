
$(function(){
	$.ajax({
        url:'/purchase_histories/aggregate_c3',
        type:'GET',
        data:{
            'ym':$('.ym').val(),
        }
    })
    .done( (data) => {
        console.log(data);


        data['aggregateItemHistories'].forEach(function(record) {
              c3.generate({
            	  bindto: '#chart_' + record['id'],
            	  size: {
            	        height: 120,
            	        width: 120
            	  },
                  data: {
                      // iris data from R
                      columns: [
                          ['price', record['price']],
                          ['remain', record['remain']],
                      ],
                      type : 'pie',
                      onclick: function (d, i) { console.log("onclick", d, i); },
                      onmouseover: function (d, i) { console.log("onmouseover", d, i); },
                      onmouseout: function (d, i) { console.log("onmouseout", d, i); }
                  }
              });


        });

    })
    .fail( (data) => {
        $('.result').html(data);
        console.log(data);
    })
});



