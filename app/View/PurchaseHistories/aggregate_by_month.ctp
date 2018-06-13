<?php echo $this->element('term_selector', ['url' => '/purchase_histories/aggregate_by_month?ym=']); ?>

<div>
	<h2 class="trn">Aggregation_Month</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_price'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('remain'); ?></th>
			<th class="trn"><a class="chart" href="javascript:void(0)"><b class="trn">chart</b></a></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($aggregateItemHistories as $purchaseHistory): ?>
	<tr>
		<td>
			<?php echo h($purchaseHistory['name']); ?>
		</td>
		<td>
			<?php echo h($purchaseHistory['schedule_price']); ?>
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
<script>
$(function(){
	$('.chart').on('click',function(){
		aggregate_c3();
	});
});
</script>
