<?php echo $this->Form->input('schedule_end_date', array(
    'type' => 'text',
    'id' => "datepicker",
    'class' => 'schedule_end_date',
    'default' => $this->request->query('end') ? $this->request->query('end') : date('Y-m-d'),
    'label' => ['class' => ['trn'], 'text' => 'schedule_end_date']
));?>

<script>
$(function(){
	$('.schedule_end_date').on('change',function(){
		location.href = location.protocol + "//" + location.hostname + ":" + location.port + location.pathname + "?end=" + $(this).val();
	});
});
</script>

<table cellpadding="0" cellspacing="0">
<thead>
<tr>
	<td>
		<span class="trn">incomeH</span>
	</td>
	<td>
		<?php echo h($incomeH); ?>
	</td>
</tr>
<tr>
	<td>
		<span class="trn">purchaseH</span>
	</td>
	<td>
		<?php echo h($purchaseH); ?>
	</td>
</tr>
<tr>
	<td>
		<b class="trn">history</b>
	</td>
	<td>
		<b><?php echo h($history); ?></b>
	</td>
</tr>
<tr>
	<td>
		<span class="trn">incomeS</span>
	</td>
	<td>
		<?php echo h($incomeS); ?>
	</td>
</tr>
<tr>
	<td>
		<span class="trn">purchaseS</span>
	</td>
	<td>
		<?php echo h($purchaseS); ?>
	</td>
</tr>
<tr>
	<td>
		<b class="trn">schedule</b>
	</td>
	<td>
		<b><?php echo h($schedule); ?></b>
	</td>
</tr>
<tr>
	<td>
		<b class="trn">toal</b>
	</td>
	<td>
		<b><?php echo h($toal); ?></b>
	</td>
</tr>
