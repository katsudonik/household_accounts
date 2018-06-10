<div >
<?php echo $this->Form->create('PurchaseSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Edit Purchase Schedule'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->element('schedule_elm');
		echo $this->Form->input('price');
		echo $this->Form->input('memo');
		echo $this->Form->input('store_name');
		echo $this->Form->input('purchases');
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