<div class="purchaseSchedules form">
<?php echo $this->Form->create('PurchaseSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Purchase Schedule'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('target_date');
		echo $this->Form->input('target_start_date');
		echo $this->Form->input('target_end_date');
		echo $this->Form->input('price');
		echo $this->Form->input('memo');
		echo $this->Form->input('store_name');
		echo $this->Form->input('purchases');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchase Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
