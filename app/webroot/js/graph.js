
function display_loading(){
    $('.list').empty();
    $('.list').append("<img src=\"/img/loading01_r3_c5.gif\"/>");
}

function ajax_get(url, params, fnc, dataType){
  display_loading();
  $(function(){
    request = {
      url: url,
      type:'GET',
      data: params
    }
    
    if(dataType != undefined){
      request['dataType'] = dataType; 
    }


    $.ajax(request)
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

function render_purchase_histories_list(){
  ajax_get(
    '/purchase_histories/index_ajax', 
    {
      'ym':$('.term_selector').val(),
    },
    (function (data){
      ajax_get(
        '/files/tmp_purchase_histories_list.html', 
        {}, 
        (function(html){
          $('.list').empty();
          $.each(data.purchaseHistories,function(index,record){
            _record = record.PurchaseHistory;
            console.log(_record);
            $html = $(html);
            $html.find('._id').val(_record.id);
            $html.find('.td_id span').text(_record.id);

            append_item_list($html.find('.item_name'));
            $html.find('.item_id_before').text(_record.item_id);
            $html.find('.item_name').val($html.find('.item_id_before').text());
            $html.find('.td_item_id .label').text($html.find('.item_name option:selected').text());

            $html.find('.target_date').find('.date').attr('value', _record.target_date);
            $html.find('.target_date span').text(_record.target_date);
            add_datepicker($html.find('.date'));

            $html.find('.td_price').find('input').attr('value', _record.price);
            $html.find('.td_price span').text(_record.price);
            $html.find('.td_store_name').find('input').attr('value', _record.store_name);
            $html.find('.td_store_name span').text(_record.store_name);
            $html.find('.td_purchases').find('input').attr('value', _record.purchases);
            $html.find('.td_purchases span').text(_record.purchases);
            $html.find('.td_memo').find('input').attr('value', _record.memo);
            $html.find('.td_memo span').text(_record.memo);
            $html.find('.delete').attr('data-id', _record.id);
            $('.list').append($html);

          });
        }),
        'html'
     )
    })
  );
}

var item_list;
function render_item_list(){
  ajax_get(
    '/purchase_histories/item_list',
    {
    },
    (function (data){
      item_list = data.items
    })
  );
}


function append_item_list(select_elm){
          $.each(item_list,function(index,label){
            $(select_elm).append("<option value=\"" + index + "\">" + label + "</option>");
          });
}
