	<?php echo $this->element('header') ;?>
	<div class="container">
		<div class="alert alert-info">
			<?php echo $this->Session->flash(); ?>
		</div>
		
		<?php if($this->Session->check('Login.Id')):?>
			<header>
				<?php echo $this->element('navbar') ;?>
			</header>
		<?php endif;?>
		
		<div id="main">
				<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>
	<?php echo $this->element('footer') ;?>
