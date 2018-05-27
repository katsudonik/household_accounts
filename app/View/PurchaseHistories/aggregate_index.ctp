<div>
	<h2>Aggregation</h2>
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
