<div >
<?php echo $this->Form->create('PurchaseSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Purchase Schedule'); ?></legend>

	<?php
		echo $this->Form->input('item_id');
		echo $this->element('schedule_elm');
		echo $this->Form->input('price');
		echo $this->Form->input('store_name', ['label' => 'store_name']);
		echo $this->Form->input('purchases', ['label' => 'purchases']);
		echo $this->Form->input('memo');
	?>

	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<script>
$(function() {
	$('#datepicker_target_date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#datepicker_target_start_date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#datepicker_target_end_date').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>