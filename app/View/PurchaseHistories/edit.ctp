<div class="purchaseHistories form">
<?php echo $this->Form->create('PurchaseHistory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Purchase History'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('purchase_date');
		echo $this->Form->input('price');
		echo $this->Form->input('memo');
		echo $this->Form->input('dalete_flag');
		echo $this->Form->input('daleted');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PurchaseHistory.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('PurchaseHistory.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Purchase Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
