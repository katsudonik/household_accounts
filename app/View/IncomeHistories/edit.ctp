<div class="incomeHistories form">
<?php echo $this->Form->create('IncomeHistory'); ?>
	<fieldset>
		<legend><?php echo __('Edit Income History'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('item_id');
		echo $this->Form->input('income_date');
		echo $this->Form->input('price');
		echo $this->Form->input('memo');
		echo $this->Form->input('target_start_date');
		echo $this->Form->input('target_end_date');
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IncomeHistory.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('IncomeHistory.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Income Histories'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
