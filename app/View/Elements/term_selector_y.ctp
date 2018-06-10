<div>
	<?php echo $this->Html->script('term_selector'); ?>

	<?php
		$start = strtotime(date('Y') . '-01-01 -5 year');
		$end = strtotime(date('Y') . '-01-01');

		$ret=array();
		$tmp = $end;
		while($tmp >= $start){
		  $ret[(date('Y', $tmp))] = date('Y', $tmp);
		  $tmp = strtotime('-1 year', $tmp);
		}
	?>
	<div class="select_ym">
		<span>
			<?php  echo $this->Form->input('Display_Year', [
			    'label' => 'Display_Year',
			    'data-url' => $url,
			    'class' => 'term_selector',
			    'type'=>'select',
			    'options'=> $ret,
			    'selected' => isset($_GET['y']) ? $_GET['y'] : date('Y')
			]);?>
    	</span>
	</div>
</div>