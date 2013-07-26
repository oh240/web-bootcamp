	<?php echo $this->element('header') ;?>
	<div class="container">
		
		<div class="alert alert-info">
			<?php echo $this->Session->flash(); ?>
		</div>
		
		<?php if($this->Session->check('Login.ID')) :?>
			<header>
				<?php echo $this->element('navbar') ;?>
			</header>
		<?php endif;?>
		
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php echo $this->element('footer') ;?>
