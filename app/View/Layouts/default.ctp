	<?php echo $this->element('header') ;?>
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<header>
			<?php echo $this->element('navbar') ;?>
		</header>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->element('footer') ;?>
