<div >
<?php echo $this->Form->create('Budget'); ?>
	<fieldset>
		<legend><?php echo __('Add Budget'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('price');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>