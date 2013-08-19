<div class="add_subtask">
  <p>
      <strong> 
          サブタスクの変更
			</strong>
  </p>
<?php echo $this->Form->create('Task',array('controller' => 'tasks', 'action' => 'edit'));?>
<?php echo $this->Form->hidden('terid');?>
<?php echo $this->Form->input('name',array('label'=>false));?>
<?php echo $this->Form->input('rank',         array('type'=>'select','label'=>'優先度の設定','options'=>array('指定なし','低:(緑)','中:(黄)','高:(赤)')));?>
<?php echo $this->Form->hidden('todo_id');?>
<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));?>
<?php echo $this->Form->submit('サブタスクを変更する',array('class'=>'btn btn-success btn-mini'));?>
<?php echo $this->Form->end();?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Task.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Task.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?></li>
	</ul>
</div>
