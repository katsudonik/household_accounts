<div class="incomeHistories view">
<h2><?php echo __('Income History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($incomeHistory['IncomeHistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($incomeHistory['Item']['name'], array('controller' => 'items', 'action' => 'view', $incomeHistory['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Income Date'); ?></dt>
		<dd>
			<?php echo h($incomeHistory['IncomeHistory']['income_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($incomeHistory['IncomeHistory']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo'); ?></dt>
		<dd>
			<?php echo h($incomeHistory['IncomeHistory']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($incomeHistory['IncomeHistory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($incomeHistory['IncomeHistory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Income History'), array('action' => 'edit', $incomeHistory['IncomeHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Income History'), array('action' => 'delete', $incomeHistory['IncomeHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $incomeHistory['IncomeHistory']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Income Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Income History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
