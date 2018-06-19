<?php echo $this->element('term_selector', ['url' => '/income_schedules/?ym=']); ?>
<div >
	<h2 class="trn"><?php echo __('Income Schedules'); ?></h2>
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
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($incomeSchedules as $incomeSchedule): ?>
	<tr>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $incomeSchedule['Item']['name']; ?>
		</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['target_date']); ?>&nbsp;</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['target_start_date']); ?>&nbsp;</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['target_end_date']); ?>&nbsp;</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['price']); ?>&nbsp;</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['memo']); ?>&nbsp;</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['created']); ?>&nbsp;</td>
		<td><?php echo h($incomeSchedule['IncomeSchedule']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $incomeSchedule['IncomeSchedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $incomeSchedule['IncomeSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $incomeSchedule['IncomeSchedule']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $incomeSchedule['IncomeSchedule']['id']))); ?>
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
