<div class="incomeHistories form">
<?php echo $this->Form->create('IncomeHistory'); ?>
	<fieldset>
		<legend><?php echo __('Add Income History'); ?></legend>
	<?php
		echo $this->Form->input('item_id');
		echo $this->Form->input('income_date');
		echo $this->Form->input('price');
		echo $this->Form->input('memo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Income Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
