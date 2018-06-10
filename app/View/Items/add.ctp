<div>
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php echo $this->Form->input('name');?>

	<?php  echo $this->Form->input('type', [
			    'label' => 'type',
			    'type'=>'select',
			    'options'=> [1 => '支出', 2 => '収入'],
	]);?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>