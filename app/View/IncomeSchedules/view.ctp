<div class="incomeSchedules view">
<h2><?php echo __('Income Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($incomeSchedule['Item']['name'], array('controller' => 'items', 'action' => 'view', $incomeSchedule['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Date'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['target_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Start Date'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['target_start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target End Date'); ?></dt>
		<dd>
			<?php echo h($incomeSchedule['IncomeSchedule']['target_end_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Income Schedule'), array('action' => 'edit', $incomeSchedule['IncomeSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Income Schedule'), array('action' => 'delete', $incomeSchedule['IncomeSchedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $incomeSchedule['IncomeSchedule']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Income Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Income Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
