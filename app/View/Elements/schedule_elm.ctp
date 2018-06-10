
		<a class="point trn" href="javascript:void(0)">point</a>
		<a class="term trn" href="javascript:void(0)">term</a>

		<?php echo $this->Html->script('schedule'); ?>
<?php
echo $this->Form->input('target_date', array('type' => 'text', 'id' => "datepicker_target_date", 'class' => 'target_date', 'label' => ['class' => 'target_date']));
echo $this->Form->input('target_start_date', array('type' => 'text', 'id' => "datepicker_target_start_date", 'class' => 'target_start_date', 'label' => ['class' => 'target_start_date']));
echo $this->Form->input('target_end_date', array('type' => 'text', 'id' => "datepicker_target_end_date", 'class' => 'target_end_date', 'label' => ['class' => 'target_end_date']));

?>