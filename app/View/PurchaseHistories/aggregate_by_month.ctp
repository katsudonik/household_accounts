<div>
	<?php echo $this->Html->script('home'); ?>

	<?php
		$start = strtotime(date('Y-m') . '-01 -1 year');
		$end = strtotime(date('Y-m') . '-01 +1 year');

		$ret=array();
		$tmp = $end;
		while($tmp >= $start){
		  $ret[(date('Y-m', $tmp))] = date('Y-m', $tmp);
		  $tmp = strtotime('-1 month', $tmp);
		}
	?>
	<div class="select_ym">
		<span>
			<?php  echo $this->Form->input('Display_Month', ['type'=>'select', 'options'=> $ret, 'selected' => isset($_GET['ym']) ? $_GET['ym'] : date('Y-m'), 'class' => 'ym_aggs']);?>
    	</span>
    	<input type="hidden" class="ym" value="<?php echo $ym; ?>">
	</div>
</div>


<div>
	<h2 class="trn">Aggregation</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('budget_price'); ?></th>
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
			<?php echo $this->Html->link(__(h($purchaseHistory['budget_price'])), array('controller' => 'budgets', 'action' => 'edit', $purchaseHistory['budget_id'])); ?>
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
				<?php echo h($aggregateSumHistory['budget_price']); ?>
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
