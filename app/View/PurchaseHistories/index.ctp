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
		<td>
			<?php echo $this->Html->link(__(h($purchaseHistory['PurchaseHistory']['id'])), array('action' => 'view', $purchaseHistory['PurchaseHistory']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($purchaseHistory['Item']['name'], array('controller' => 'items', 'action' => 'view', $purchaseHistory['Item']['id'])); ?>
		</td>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['purchase_date']); ?>&nbsp;</td>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['price']); ?>&nbsp;</td>
		<td><?php echo h($purchaseHistory['PurchaseHistory']['memo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $purchaseHistory['PurchaseHistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseHistory['PurchaseHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseHistory['PurchaseHistory']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
<tr>
	<td>
		<?php echo $this->Html->link(__('+'), array('action' => 'add')); ?>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
	<td>
	</td>
</tr>
	</tbody>
	</table>

</div>
<div class="purchaseHistories index">
	<h2>Aggregation</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('budget_price'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('remain'); ?></th>
			<th><?php echo 'chart'; ?></th>
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

<div class="actions">


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
	<span><?php echo $this->Form->input('Display Month', ['type'=>'select', 'options'=> $ret,
	'selected' => isset($_GET['ym']) ? $_GET['ym'] : date('Y-m')
	, 'class' => 'ym']); ?></span>
</div>


	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Purchase History'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Budgets'), array('controller' => 'budgets', 'action' => 'index')); ?> </li>
	</ul>
</div>

<div><input type="hidden" class="ym" value="<?php echo $ym; ?>"></div>
