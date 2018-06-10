<?php echo $this->element('term_selector', ['url' => '/purchase_histories/aggregate_by_month?ym=']); ?>

<div>
	<h2 class="trn">Aggregation</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_price'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('remain'); ?></th>
			<th class="trn"><?php echo 'chart'; ?></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($aggregateItemHistories as $purchaseHistory): ?>
	<tr>
		<td>
			<?php echo h($purchaseHistory['name']); ?>
		</td>
		<td>
			<?php echo $this->Html->link(__(h($purchaseHistory['schedule_price'])), array('controller' => 'purchase_schedules', 'action' => 'edit', $purchaseHistory['schedule_id'])); ?>
		</td>
		<td>
			<?php echo h($purchaseHistory['price']); ?>
		</td>
		<td>
			<?php echo h($purchaseHistory['remain']); ?>
		</td>
		<td>
			<div id="chart_<?php echo h($purchaseHistory['id']); ?>"></div>
		</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<td>
			<b>
				Sum
			</b>
		</td>
		<td>
			<b>
				<?php echo h($aggregateSumHistory['schedule_price']); ?>
			</b>
		</td>
		<td>
			<b>
				<?php echo h($aggregateSumHistory['price']); ?>
			</b>
		</td>
		<td>
			<b>
				<?php echo h($aggregateSumHistory['remain']); ?>
			</b>
		</td>
	</tr>
	</tbody>
	</table>

</div>




<?php echo $this->Html->script('graph'); ?>
<script>aggregate_c3();</script>
