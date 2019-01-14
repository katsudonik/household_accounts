<?php echo $this->element('term_selector', ['url' => '/purchase_histories/aggregate_by_month?ym=']); ?>

<div>
	<h2 class="trn">Aggregation_Month</h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('item_id'); ?></th>
			<th><?php echo $this->Paginator->sort('schedule_price'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('remain'); ?></th>
			<th class="trn"><a class="chart" href="javascript:void(0)"><b class="trn">chart</b></a></th>
	</tr>
	</thead>
	<tbody class="list">
	</tbody>
	</table>

</div>




<?php echo $this->Html->script('graph'); ?>
<script>
  aggregate_by_month();
  $(function(){
    $('.term_selector').change(function() {
      aggregate_by_month();
    });
    $('.chart').on('click',function(){
      render_pie_chart();
    });
  });

</script>
