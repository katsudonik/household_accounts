<?php echo $this->element('term_selector_y', ['url' => '/purchase_histories/aggregate_by_year?y=']); ?>

<div>
	<h2 class="trn">Aggregation_Year</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
	</tr>
	</thead>
	<tbody class="list">

	</tbody>
	</table>



</div>

<div id="chart_item"></div>

<div id="chart_all"></div>

<?php echo $this->Html->script('graph'); ?>
<script>
  aggregate_by_year();
  aggregate_to_line_chart();
  
  $(function(){
          $('.term_selector').change(function() {
            aggregate_by_year();
            aggregate_to_line_chart();
          });
  });
</script>
