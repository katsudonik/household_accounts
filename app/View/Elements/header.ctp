<ul id="menu">
    <li>Purchase History
        <ul class="child">
            <li><?php echo $this->Html->link(__('List Purchase Histories'), array('controller' => 'purchase_histories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('New Purchase History'), array('controller' => 'purchase_histories', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li>Items
        <ul class="child">
            <li><?php echo $this->Html->link(__('List Item'), array('controller' => 'items', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('New Item'), array('controller' => 'items', 'action' => 'add')); ?> </li>
        </ul>
    </li>
    <li>Budgets
        <ul class="child">
              <li><?php echo $this->Html->link(__('List Budgets'), array('controller' => 'budgets', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Budgets'), array('controller' => 'budgets', 'action' => 'add')); ?> </li>
        </ul>
    </li>
</ul>

