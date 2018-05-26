<div class="purchaseHistories view">
<h2><?php echo __('Purchase History'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchaseHistory['PurchaseHistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Item'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseHistory['Item']['name'], array('controller' => 'items', 'action' => 'view', $purchaseHistory['Item']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Date'); ?></dt>
		<dd>
			<?php echo h($purchaseHistory['PurchaseHistory']['purchase_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($purchaseHistory['PurchaseHistory']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Memo'); ?></dt>
		<dd>
			<?php echo h($purchaseHistory['PurchaseHistory']['memo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purchaseHistory['PurchaseHistory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($purchaseHistory['PurchaseHistory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase History'), array('action' => 'edit', $purchaseHistory['PurchaseHistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase History'), array('action' => 'delete', $purchaseHistory['PurchaseHistory']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseHistory['PurchaseHistory']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Histories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase History'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Items'), array('controller' => 'items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
	</ul>
</div>
