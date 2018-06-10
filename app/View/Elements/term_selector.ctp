<div>
	<?php echo $this->Html->script('term_selector'); ?>

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
			<?php  echo $this->Form->input('Display_Month', [
			    'data-url' => $url,
			    'class' => 'term_selector',
			    'type'=>'select',
			    'options'=> $ret,
			    'selected' => isset($_GET['ym']) ? $_GET['ym'] : date('Y-m')
			]);?>
    	</span>
	</div>
</div>