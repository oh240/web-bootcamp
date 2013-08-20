<div class="threads form">
<?php echo $this->Form->create('Thread'); ?>
	<fieldset>
		<legend><?php echo __('Edit Thread'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Thread.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Thread.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Threads'), array('action' => 'index')); ?></li>
	</ul>
</div>
