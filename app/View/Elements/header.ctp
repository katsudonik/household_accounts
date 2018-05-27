<ul id="menu">
    <li>Purchase History
        <ul class="child">
            <li><?php echo $this->Html->link(__('List'), array('controller' => 'purchase_histories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'purchase_histories', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li>Items
        <ul class="child">
            <li><?php echo $this->Html->link(__('List'), array('controller' => 'items', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'items', 'action' => 'add')); ?> </li>
        </ul>
    </li>
    <li>Budgets
        <ul class="child">
              <li><?php echo $this->Html->link(__('List'), array('controller' => 'budgets', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'budgets', 'action' => 'add')); ?> </li>
        </ul>
    </li>
</ul>

