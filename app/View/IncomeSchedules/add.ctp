<div>
<?php echo $this->Form->create('IncomeSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Income Schedule'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->element('schedule_elm');
		echo $this->Form->input('price');
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