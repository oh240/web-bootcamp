	<?php echo $this->element('header') ;?>
	
	<div class="container">
	
		<?php echo $this->Session->flash(); ?>
	
		<div id="main">
			<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>
	<?php echo $this->element('footer') ;?>
