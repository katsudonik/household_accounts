<?php echo $this->element('term_selector', ['url' => '/income_histories/?ym=']); ?>
<div>
	<h2 class="trn"><?php echo __('Income Histories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('income_date'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('memo'); ?></th>
			<th class="actions trn"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($incomeHistories as $incomeHistory): ?>
	<tr>
		<td><?php echo h($incomeHistory['IncomeHistory']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $incomeHistory['Item']['name']; ?>
		</td>
		<td><?php echo h($incomeHistory['IncomeHistory']['income_date']); ?>&nbsp;</td>
		<td><?php echo h($incomeHistory['IncomeHistory']['price']); ?>&nbsp;</td>
		<td><?php echo h($incomeHistory['IncomeHistory']['memo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $incomeHistory['IncomeHistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $incomeHistory['IncomeHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $incomeHistory['IncomeHistory']['id']))); ?>
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
