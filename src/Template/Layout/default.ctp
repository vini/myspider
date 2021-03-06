<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('project.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
	<header>
		<div class="header-content">
			<?php echo $this->element('header'); ?>
		</div>
	</header>
	
    <?= $this->Flash->render() ?>	
	
    <div class="container clearfix">
		<div class="content">
			<?= $this->fetch('content') ?>
		</div>
    </div>
	
    <footer>
		<div class="footer-content">
			<?php echo $this->element('footer'); ?>
		</div>
    </footer>
	
	<?= $this->Html->script('base/jquery-1.12.1.min.js') ?>		
	
	<script type="text/javascript">
		base_url = '<?= $this->Url->build('/') ?>';
	</script>
			
	<?= $this->fetch('scriptBottom') ?>
</body>
</html>
