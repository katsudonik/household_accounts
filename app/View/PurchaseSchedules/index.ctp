<?php echo $this->element('term_selector', ['url' => '/purchase_schedules/?ym=']); ?>

<div>
	<h2 class="trn"><?php echo __('Purchase Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('target_date'); ?></th>
			<th><?php echo $this->Paginator->sort('target_start_date'); ?></th>
			<th><?php echo $this->Paginator->sort('target_end_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('memo'); ?></th>
			<th><?php echo $this->Paginator->sort('store_name'); ?></th>
			<th><?php echo $this->Paginator->sort('purchases'); ?></th>
			<th class="actions trn"><?php echo __('Actions'); ?></th>

	</tr>
	</thead>
	<tbody>
	<?php foreach ($purchaseSchedules as $purchaseSchedule): ?>
	<tr>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $purchaseSchedule['Item']['name']; ?>
		</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['target_date']); ?>&nbsp;</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['target_start_date']); ?>&nbsp;</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['target_end_date']); ?>&nbsp;</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['price']); ?>&nbsp;</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['memo']); ?>&nbsp;</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['store_name']); ?>&nbsp;</td>
		<td><?php echo h($purchaseSchedule['PurchaseSchedule']['purchases']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $purchaseSchedule['PurchaseSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseSchedule['PurchaseSchedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseSchedule['PurchaseSchedule']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
