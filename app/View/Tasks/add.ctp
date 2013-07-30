<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>

	<?php echo $this->Form->hidden('user_id',
		array('value'=>$this->Session->read('Login.Id')));
	?>

	<?php echo $this->Form->hidden('todo_id',
		array('value'=> $this->params['todo_id'] ));
	?>

	<?php echo $this->Form->input('name',
		array('label'=>false));
	?>
	
	<?php echo $this->Form->submit('サブタスクの追加',
			array('class'=>'btn btn-small btn-success'));
	?>
	
<?php $this->Form->end();?>
</div>

