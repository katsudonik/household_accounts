<div>
<?php echo $this->Form->create('IncomeHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Income History'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('income_date', array('type' => 'text', 'id' => "datepicker_target_date"));
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
});
</script>