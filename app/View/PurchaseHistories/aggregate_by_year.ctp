<div>
	<?php echo $this->Html->script('home'); ?>

	<?php
		$start = strtotime(date('Y') . '-01-01 -5 year');
		$end = strtotime(date('Y') . '-01-01');

		$ret=array();
		$tmp = $end;
		while($tmp >= $start){
		  $ret[(date('Y', $tmp))] = date('Y', $tmp);
		  $tmp = strtotime('-1 year', $tmp);
		}
	?>
	<div class="select_ym">
		<span>
			<?php  echo $this->Form->input('Display Year', ['type'=>'select', 'options'=> $ret, 'selected' => isset($_GET['y']) ? $_GET['y'] : date('Y'), 'class' => 'y_aggs']);?>
    	</span>
    	<input type="hidden" class="y" value="<?php echo $_GET['y']; ?>">
	</div>
</div>
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
<script>
aggregate_c3_item();
aggregate_c3_all();
</script>