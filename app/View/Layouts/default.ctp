<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php $this->assign('title', '家計簿'); ?>
		<?php echo $this->fetch('title'); ?>
	</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

	<script>
	$(function() {
		$('legend').addClass('trn');
	});
	</script>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('dropdown');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery.translate');
		echo $this->Html->script('translate');
		echo $this->fetch('script');
		echo $this->Html->script('dropdown');
	?>


	 <script>$(function() {$('#datepicker').datepicker({dateFormat: 'yy-mm-dd'});});</script>

	<link href="/css/lib/c3/c3.css" rel="stylesheet">
	<script src="/js/lib/c3/c3.js"></script>
	<script src="https://d3js.org/d3.v3.min.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php echo $this->element('header'); ?>
		</div>
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		<ul>
<li><a class="lang_selector trn" href="#" data-value="jp">Japanese</a> | <a class="lang_selector trn" href="#" data-value="en">English</a></li>
</ul>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
