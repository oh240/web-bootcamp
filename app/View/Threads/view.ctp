<div class="threads view">
<h2><?php echo __('Thread'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project Id'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['project_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($thread['Thread']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Thread'), array('action' => 'edit', $thread['Thread']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Thread'), array('action' => 'delete', $thread['Thread']['id']), null, __('Are you sure you want to delete # %s?', $thread['Thread']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Threads'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Thread'), array('action' => 'add')); ?> </li>
	</ul>
</div>
