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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('Shift_JIS'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		for ($i=0,$len=count($css); $i<$len; $i++) {
			$this->Html->css($css[$i], null, array('inline'=>false));
		}
		for ($i=0,$len=count($script); $i<$len; $i++) {
			$this->Html->script($script[$i], array('inline'=>false));
		}

		$this->start('common-less');
		echo $this->Less->link($less, array('minify' => true, 'combine' => true));
		$this->end();
	?>
	<link href="<?php echo $this->Html->url('', true); ?>" rel="canonical" />
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->meta('keywords', $keywords);
		echo $this->Html->meta('description', $description);

		// echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('common-less');
		echo $this->fetch('custom-less');
		echo $this->fetch('script');
		echo $this->fetch('custom-script');
	?>
</head>
<?php $bodyId = $this->action . 'In' . $this->name; ?>
<body id="<?php echo $bodyId; ?>" class="<?php echo strtolower($this->name);?>">
	<div class="container">
		<?php echo $this->element('header'); ?>
		<?php //if ($this->name === 'area') echo $this->element('menu'); ?>
		<div class="content-wrapper clearfix">
			<?php echo $this->fetch('content'); ?>
			<?php echo $this->element('menu'); ?>
		</div>
		<?php echo $this->element('footer'); ?>
		<?php //echo $this->element('sql_dump'); ?>
	</div>


<?php
// 効果測定用タグ設置
	echo $this->element('measurementTag');
?>



</body>
</html>
