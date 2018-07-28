<?php echo $this->Html->script('home'); ?>
<?php echo $this->element('term_selector', ['url' => '/purchase_histories/?ym=']); ?>

<div>
	<h2 class="trn"><?php echo __('Purchase_Histories'); ?></h2>
	<?php echo $this->Form->create('PurchaseHistory',[
	    'url' => array('controller' => 'purchase_histories', 'action' => 'bulk_edit'),
	    'inputDefaults' => ['label' => false,'div' => false,'style' => 'display:none;']]);?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th style="width:15px;"><b class="trn">id</b></th>
			<th style="width:85px;"><b class="trn">item_name</b></th>
			<th style="width:136px;"><b class="trn">target_date</b></th>
			<th style="width:38px;"><b class="trn">price</b></th>
			<th style="width:250px;"><b class="trn">store_name</b></th>
			<th style="width:250px;"><b class="trn">purchases</b></th>
			<th style="width:250px;"><b class="trn">memo</b></th>
			<th class="actions"><b class="trn">Actions</b></th>
	</tr>
	</thead>
	<tbody class="list">

	</tbody>
	</table>
<?php echo $this->Form->end(); ?>
</div>

		<a class="add trn" href="javascript:void(0)">+</a>

<script>
$(function() {
<?php
#foreach($purchaseHistories as $i => $data){
#    echo "$('#datepicker_{$i}').datepicker({dateFormat: 'yy-mm-dd'});";
#}
?>

});

$(function(){
        render_purchase_histories_list();
        $('.term_selector').change(function() {
             render_purchase_histories_list();
        });


	$('.add').on('click',function(){
             $.ajax({
                    type: 'GET',
                    url: '/files/tmp_new.html',
                    dataType: 'html',
                    success: function(data) {
                        $data = $(data);
                        add_datepicker($data.find('.date'));

                        $('.list').append($data);
                    },
                    error:function() {
                        alert('問題がありました。');
                    }
             });
	});
});





</script>
<?php echo $this->Html->script('graph'); ?>
<style>
.price{
    width: 110px;
}
.item_name{
    height:29px;
    width: 80px;
}
.date{
    width: 130px;
}
</style>
