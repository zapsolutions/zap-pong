<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('ZAP Pong', 'ZAP Pong');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('custom');
		echo $this->Html->script('//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js');
		echo $this->Html->script('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="content">
			<div class="container">
				<?php echo $this->element('navbar'); ?>
				<div id="flash-row" class="row-fluid">
					<div class="span11 offset1">
						<?php echo $this->Session->flash(); ?>
					</div>
				</div>
				<?php echo $this->fetch('content'); ?>
				<div id="footer" class="row-fluid">
					<div class="span11 offset1">
						<?php
						echo $this->Html->link(
							$this->Html->image('github_icon.png', array('alt' => 'ZAP Pong Github Repository', 'border' => '0')),
							'https://github.com/bcrowe/zap-pong',
							array('target' => '_blank', 'escape' => false)
						);
					 	echo $this->Html->link(
							$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
							'http://www.cakephp.org/',
							array('target' => '_blank', 'escape' => false)
						);
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
