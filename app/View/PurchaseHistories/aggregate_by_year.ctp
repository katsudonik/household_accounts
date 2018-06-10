<?php echo $this->element('term_selector_y', ['url' => '/purchase_histories/aggregate_by_year?y=']); ?>

<div>
	<h2 class="trn">Aggregation_Year</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
	</tr>
	</thead>
	<tbody>

	<?php foreach ($aggregateItemHistories as $purchaseHistory): ?>
	<tr>
		<td>
			<?php echo h($purchaseHistory['name']); ?>
		</td>
		<td>
			<?php echo h($purchaseHistory['price']); ?>
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
				<?php echo h($aggregateSumHistory['price']); ?>
			</b>
		</td>
	</tr>
	</tbody>
	</table>

</div>

<div id="chart_item"></div>

<div id="chart_all"></div>

<?php echo $this->Html->script('graph'); ?>
<script>
aggregate_c3_item();
aggregate_c3_all();
</script>