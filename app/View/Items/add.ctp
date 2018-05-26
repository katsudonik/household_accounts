<div class="items form">
<?php echo $this->Form->create('Item'); ?>
	<fieldset>
		<legend><?php echo __('Add Item'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Items'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Budgets'), array('controller' => 'budgets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Budget'), array('controller' => 'budgets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Histories'), array('controller' => 'purchase_histories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase History'), array('controller' => 'purchase_histories', 'action' => 'add')); ?> </li>
	</ul>
</div>
