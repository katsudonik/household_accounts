<ul id="menu">
    <li><span class="trn">Purchase_Histories</span>
        <ul class="child">
            <li><?php echo $this->Html->link(__('List'), array('controller' => 'purchase_histories', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'purchase_histories', 'action' => 'add')); ?></li>
        </ul>
    </li>
    <li><span class="trn">Purchase_Schedules</span>
        <ul class="child">
              <li><?php echo $this->Html->link(__('List'), array('controller' => 'purchase_schedules', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'purchase_schedules', 'action' => 'add')); ?> </li>
        </ul>
    </li>
    <li><span class="trn">Income_Histories</span>
        <ul class="child">
              <li><?php echo $this->Html->link(__('List'), array('controller' => 'income_histories', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'income_histories', 'action' => 'add')); ?> </li>
        </ul>
    </li>
    <li><span class="trn">Income_Schedules</span>
        <ul class="child">
              <li><?php echo $this->Html->link(__('List'), array('controller' => 'income_schedules', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'income_schedules', 'action' => 'add')); ?> </li>
        </ul>
    </li>
    <li><span class="trn">Aggregates</span>
        <ul class="child">
            <li><?php echo $this->Html->link(__('Aggregation_Year'), array('controller' => 'purchase_histories', 'action' => 'aggregate_by_year')); ?></li>
            <li><?php echo $this->Html->link(__('Aggregation_Month'), array('controller' => 'purchase_histories', 'action' => 'aggregate_by_month')); ?></li>
            <li><?php echo $this->Html->link(__('Sum_All'), array('controller' => 'purchase_histories', 'action' => 'sum_all')); ?></li>
        </ul>
    </li>
    <li><span class="trn">Items</span>
        <ul class="child">
            <li><?php echo $this->Html->link(__('List'), array('controller' => 'items', 'action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('New'), array('controller' => 'items', 'action' => 'add')); ?> </li>
        </ul>
    </li>
</ul>

