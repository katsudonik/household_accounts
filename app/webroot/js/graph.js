
function display_loading(){
    $('.list').append("<img src=\"/img/loading01_r3_c5.gif\"/>");
}

function ajax_get(url, params, fnc){
  display_loading();
  $(function(){
    $.ajax({
      url: url,
      type:'GET',
      data: params
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

function render_list_month(data){
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


function render_pie_chart(){
  $(function(){
      data = JSON.parse(localStorage.getItem('cache_data'));
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
  });
}


function render_year(data){
  $(function(){
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
  });
}

function aggregate_by_month(){
  ajax_get('/purchase_histories/aggregate_by_item', {
   'ym':$('.term_selector').val(),
   'term_type': 'm',
  }, render_list_month);
}

function aggregate_by_year(){
  ajax_get('/purchase_histories/aggregate_by_item', {
    'y':$('.term_selector').val(),
    'term_type': 'y',
  }, render_year);
}


function render_line_chart(data){
  $(function(){
    c3.generate({
      bindto: '#chart_all',
      data: {
        columns: data['aggregateItemHistories'],
      }
    });
  });
}

function aggregate_to_line_chart(){
  ajax_get('/purchase_histories/aggregate_timeline', {
    'y':$('.term_selector').val(),
  }, render_line_chart);
}
