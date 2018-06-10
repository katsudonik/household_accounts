<div>
<?php echo $this->Form->create('PurchaseHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Purchase History'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('target_date', array(
		    'type' => 'text',
		    'class' => 'datepicker',
		    'default' => date('Y-m-d'),
		    'label' => 'target_date'
		));
		echo $this->Form->input('price');
		echo $this->Form->input('store_name', ['label' => 'store_name']);
		echo $this->Form->input('purchases', ['label' => 'purchases']);
		echo $this->Form->input('memo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>