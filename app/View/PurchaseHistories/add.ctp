<div>
<?php echo $this->Form->create('PurchaseHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Purchase History'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('purchase_date', array('type' => 'text', 'class' => 'datepicker', 'default' => date('Y-m-d')));
		echo $this->Form->input('price');
		echo $this->Form->input('memo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>