<div>
<h2><?php echo __('Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($item['Item']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($item['Item']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($item['Item']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($item['Item']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Budgets'); ?></h3>
	<?php if (!empty($item['Budget'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['Budget'] as $budget): ?>
		<tr>
			<td><?php echo $budget['id']; ?></td>
			<td><?php echo $budget['item_id']; ?></td>
			<td><?php echo $budget['price']; ?></td>
			<td><?php echo $budget['created']; ?></td>
			<td><?php echo $budget['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'budgets', 'action' => 'view', $budget['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'budgets', 'action' => 'edit', $budget['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'budgets', 'action' => 'delete', $budget['id']), array('confirm' => __('Are you sure you want to delete # %s?', $budget['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Budget'), array('controller' => 'budgets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Purchase Histories'); ?></h3>
	<?php if (!empty($item['PurchaseHistory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Item Id'); ?></th>
		<th><?php echo __('Purchase Date'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Memo'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($item['PurchaseHistory'] as $purchaseHistory): ?>
		<tr>
			<td><?php echo $purchaseHistory['id']; ?></td>
			<td><?php echo $purchaseHistory['item_id']; ?></td>
			<td><?php echo $purchaseHistory['purchase_date']; ?></td>
			<td><?php echo $purchaseHistory['price']; ?></td>
			<td><?php echo $purchaseHistory['memo']; ?></td>
			<td><?php echo $purchaseHistory['created']; ?></td>
			<td><?php echo $purchaseHistory['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'purchase_histories', 'action' => 'view', $purchaseHistory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'purchase_histories', 'action' => 'edit', $purchaseHistory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'purchase_histories', 'action' => 'delete', $purchaseHistory['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseHistory['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Purchase History'), array('controller' => 'purchase_histories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
