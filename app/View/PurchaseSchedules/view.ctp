<div class="purchaseSchedules view">
<h2><?php echo __('Purchase Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseSchedule['Item']['name'], array('controller' => 'items', 'action' => 'view', $purchaseSchedule['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Date'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['target_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target Start Date'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['target_start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target End Date'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['target_end_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Store Name'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['store_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchases'); ?></dt>
		<dd>
			<?php echo h($purchaseSchedule['PurchaseSchedule']['purchases']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase Schedule'), array('action' => 'edit', $purchaseSchedule['PurchaseSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase Schedule'), array('action' => 'delete', $purchaseSchedule['PurchaseSchedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseSchedule['PurchaseSchedule']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Schedule'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
