<ul id="menu">
    <li><span class="trn">Purchase_History</span>
        <ul class="child">
            <li><?php echo $this->Html->link(__('List'), array('controller' => 'purchase_histories', 'action' => 'index'), array('class'=> 'trn')); ?></li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'purchase_histories', 'action' => 'add'), array('class'=> 'trn')); ?></li>
        </ul>
    </li>
    <li><span class="trn">Items</span>
        <ul class="child">
            <li><?php echo $this->Html->link(__('List'), array('controller' => 'items', 'action' => 'index'), array('class'=> 'trn')); ?></li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'items', 'action' => 'add'), array('class'=> 'trn')); ?> </li>
        </ul>
    </li>
    <li><span class="trn">Budgets</span>
        <ul class="child">
              <li><?php echo $this->Html->link(__('List'), array('controller' => 'budgets', 'action' => 'index'), array('class'=> 'trn')); ?> </li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'budgets', 'action' => 'add'), array('class'=> 'trn')); ?> </li>
        </ul>
    </li>
    <li><span class="trn">Aggregates</span>
        <ul class="child">
            <li><?php echo $this->Html->link(__('Year'), array('controller' => 'purchase_histories', 'action' => 'aggregate_by_year'), array('class'=> 'trn')); ?></li>
            <li><?php echo $this->Html->link(__('Month'), array('controller' => 'purchase_histories', 'action' => 'aggregate_by_month'), array('class'=> 'trn')); ?></li>
        </ul>
    </li>
</ul>

