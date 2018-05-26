<div class="budgets view">
<h2><?php echo __('Budget'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($budget['Budget']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($budget['Item']['name'], array('controller' => 'items', 'action' => 'view', $budget['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($budget['Budget']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($budget['Budget']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($budget['Budget']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Budget'), array('action' => 'edit', $budget['Budget']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Budget'), array('action' => 'delete', $budget['Budget']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $budget['Budget']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Budgets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Budget'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
