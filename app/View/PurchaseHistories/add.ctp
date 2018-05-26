<div class="purchaseHistories form">
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Purchase Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
