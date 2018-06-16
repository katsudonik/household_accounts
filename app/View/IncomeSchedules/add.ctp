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
		<a class="submit trn" href="javascript:void(0)">Submit</a>
	</fieldset>
<?php echo $this->Form->end(); ?>

</div>
<script>
$(function() {
	$('#datepicker_target_date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#datepicker_target_start_date').datepicker({dateFormat: 'yy-mm-dd'});
	$('#datepicker_target_end_date').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>