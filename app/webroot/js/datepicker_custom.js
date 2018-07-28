function add_datepicker($elm){
   datepicker_cnt = $('.date').length
   $elm.attr('id', '#datepicker_' + datepicker_cnt);
   $elm.removeClass('hasDatepicker');
   $elm.datepicker({dateFormat: 'yy-mm-dd'});
}
