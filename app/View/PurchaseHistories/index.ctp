<div>
	<?php echo $this->Html->script('home'); ?>

	<?php
		$start = strtotime(date('Y-m') . '-01 -1 year');
		$end = strtotime(date('Y-m') . '-01 +1 year');

		$ret=array();
		$tmp = $end;
		while($tmp >= $start){
		  $ret[(date('Y-m', $tmp))] = date('Y-m', $tmp);
		  $tmp = strtotime('-1 month', $tmp);
		}
	?>
	<div class="select_ym">
		<span>
			<?php  echo $this->Form->input('Display Month', ['type'=>'select', 'options'=> $ret, 'selected' => isset($_GET['ym']) ? $_GET['ym'] : date('Y-m'), 'class' => 'ym']);?>
    	</span>
    	<input type="hidden" class="ym" value="<?php echo $ym; ?>">
	</div>
</div>

<div>
	<h2><?php echo __('Purchase Histories'); ?></h2>
	<?php echo $this->Form->create('PurchaseHistory',[
	    'url' => array('controller' => 'purchase_histories', 'action' => 'bulk_edit'),
	    'inputDefaults' => ['label' => false,'div' => false,'style' => 'display:none;']]);?>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><b>id</b></th>
			<th><b>item_id</b></th>
			<th><b>purchase_date</b></th>
			<th><b>price</b></th>
			<th><b>memo</b></th>
			<th class="actions"><b>Actions</b></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($purchaseHistories as $i => $purchaseHistory): ?>
	<tr>

		<td>
			<?php echo $this->Html->link(__(h($purchaseHistory['PurchaseHistory']['id'])), array('action' => 'view', $purchaseHistory['PurchaseHistory']['id'])); ?>
			<?php echo $this->Form->input('id', ['value' => h($purchaseHistory['PurchaseHistory']['id']), 'name' => 'data[PurchaseHistory][id][]']); ?>
		</td>
		<td>
			<span><span class="item_id_before"><?php echo $purchaseHistory['PurchaseHistory']['item_id']; ?></span><?php echo $this->Html->link($purchaseHistory['Item']['name'], array('controller' => 'items', 'action' => 'view', $purchaseHistory['Item']['id'])); ?></span>
			<?php echo $this->Form->input('item_id', ['selected' => $purchaseHistory['PurchaseHistory']['item_id'], 'name' => 'data[PurchaseHistory][item_id][]', 'class' => 'item_name']); ?>
		</td>
		<td class="purchase_date" >
			<span><?php echo h($purchaseHistory['PurchaseHistory']['purchase_date']); ?></span>
			<?php echo $this->Form->input('purchase_date', array('type' => 'text', 'id' => "datepicker_{$i}", 'value' => h($purchaseHistory['PurchaseHistory']['purchase_date']), 'name' => 'data[PurchaseHistory][purchase_date][]', 'class' => 'date')); ?>
		</td>
		<td class="price" >
			<span><?php echo h($purchaseHistory['PurchaseHistory']['price']);?></span>
			 <?php echo $this->Form->input('price', ['type' => 'text', 'value' => h($purchaseHistory['PurchaseHistory']['price']), 'name' => 'data[PurchaseHistory][price][]', 'class' => 'price', 'maxlength' => '7']);?>
		</td>
		<td>
			<span><?php echo h($purchaseHistory['PurchaseHistory']['memo']); ?></span>
			<?php echo $this->Form->input('memo', ['value' => h($purchaseHistory['PurchaseHistory']['memo']), 'name' => 'data[PurchaseHistory][memo][]']);?>
		</td>
		<td class="actions">
			<a class="_edit" href="javascript:void(0)">Edit</a>
			<a class="cancel" href="javascript:void(0)">Cancel</a>
			<a class="submit" href="javascript:void(0)">Submit</a>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseHistory['PurchaseHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseHistory['PurchaseHistory']['id']), 'class' => 'delete')); ?>
		</td>
	</tr>
<?php endforeach; ?>
<tr>
	<td>
		<?php echo $this->Html->link(__('+'), array('action' => 'add')); ?>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
</tr>
	</tbody>
	</table>
<?php echo $this->Form->end(); ?>
</div>


<script>
$(function() {
<?php
foreach($purchaseHistories as $i => $data){
    echo "$('#datepicker_{$i}').datepicker({dateFormat: 'yy-mm-dd'});";
}
?>

});
</script>

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