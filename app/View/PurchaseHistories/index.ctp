<div class="purchaseHistories index">
	<h2><?php echo __('Purchase Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('purchase_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('memo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($purchaseHistories as $purchaseHistory): ?>
	<tr>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($purchaseHistory['Item']['name'], array('controller' => 'items', 'action' => 'view', $purchaseHistory['Item']['id'])); ?>
		</td>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['purchase_date']); ?>&nbsp;</td>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['price']); ?>&nbsp;</td>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['memo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $purchaseHistory['PurchaseHistory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $purchaseHistory['PurchaseHistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseHistory['PurchaseHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseHistory['PurchaseHistory']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>
<div class="purchaseHistories index">
	<h2>集計</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('remain'); ?></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($aggregateHistories as $purchaseHistory): ?>
	<tr>
		<td>
			<?php echo h($purchaseHistory['Item']['name']); ?>
		</td>
		<td>
			<?php echo h($purchaseHistory[0]['price']); ?>&nbsp;
		</td>
		<td>
			<?php echo h($purchaseHistory[0]['remain']); ?>&nbsp;
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Purchase History'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Budgets'), array('controller' => 'budgets', 'action' => 'index')); ?> </li>
	</ul>
</div>
