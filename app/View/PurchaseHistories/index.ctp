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
			<?php  echo $this->Form->input('Display_Month', ['class' => 'change_ym', 'type'=>'select', 'options'=> $ret, 'selected' => isset($_GET['ym']) ? $_GET['ym'] : date('Y-m')]);?>
    	</span>
	</div>
</div>

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
			<th style="width:136px;"><b class="trn">purchase_date</b></th>
			<th style="width:38px;"><b class="trn">price</b></th>
			<th style="width:250px;"><b class="trn">store_name</b></th>
			<th style="width:250px;"><b class="trn">purchases</b></th>
			<th style="width:250px;"><b class="trn">memo</b></th>
			<th class="actions"><b class="trn">Actions</b></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($purchaseHistories as $i => $purchaseHistory): ?>
	<tr>

		<td>
			<?php echo $this->Html->link(__(h($purchaseHistory['PurchaseHistory']['id'])), array('action' => 'view', $purchaseHistory['PurchaseHistory']['id'])); ?>
			<?php echo $this->Form->input('id', ['value' => h($purchaseHistory['PurchaseHistory']['id']), 'name' => 'data[PurchaseHistory][id][]', 'class' => '_id']); ?>
		</td>
		<td>
			<span><span class="item_id_before"><?php echo $purchaseHistory['PurchaseHistory']['item_id']; ?></span><?php echo $this->Html->link($purchaseHistory['Item']['name'], array('controller' => 'items', 'action' => 'view', $purchaseHistory['Item']['id'])); ?></span>
			<?php echo $this->Form->input('item_id', ['selected' => $purchaseHistory['PurchaseHistory']['item_id'], 'name' => 'data[PurchaseHistory][item_id][]', 'class' => 'item_name', 'label' => false,]); ?>
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
			<span><?php echo h($purchaseHistory['PurchaseHistory']['store_name']); ?></span>
			<?php echo $this->Form->input('store_name', ['value' => h($purchaseHistory['PurchaseHistory']['store_name']), 'name' => 'data[PurchaseHistory][store_name][]']);?>
		</td>
		<td>
			<span><?php echo h($purchaseHistory['PurchaseHistory']['purchases']); ?></span>
			<?php echo $this->Form->input('purchases', ['value' => h($purchaseHistory['PurchaseHistory']['purchases']), 'name' => 'data[PurchaseHistory][purchases][]']);?>
		</td>
		<td>
			<span><?php echo h($purchaseHistory['PurchaseHistory']['memo']); ?></span>
			<?php echo $this->Form->input('memo', ['value' => h($purchaseHistory['PurchaseHistory']['memo']), 'name' => 'data[PurchaseHistory][memo][]']);?>
		</td>
		<td class="actions"  style="text-align: left">
			<a class="_edit trn" href="javascript:void(0)">Edit</a>
			<a class="cancel trn" href="javascript:void(0)">Cancel</a>
			<a class="submit trn" href="javascript:void(0)">Submit</a>
			<a class="delete trn" href="javascript:void(0)" data-id="<?php echo h($purchaseHistory['PurchaseHistory']['id']) ?>">Delete</a>
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