<h2>
<?php echo $project['Project']['name'];?>
</h2>

<hr>

<div class="well">

<?php foreach ($todos as $todo) :?>

<h4>
<?php echo $this->Html->link($todo['Todo']['name'],
		array('controller'=>'todos','action'=>'view',$todo['Todo']['id']));

?>
</h4>

<ul class="subtasks">

<?php foreach ($todo['Task'] as $task) :?>
<li>
<?php echo $task['name'];?>
</li>

<?php endforeach ;?>

<li class="add_subtask">

<p>
	<strong>
	<?php echo $this->Html->link('サブタスクの追加',array('controller'=>'tasks','action'=>'add'));
	?>
	</strong>
</p>


</li>

</ul>

<?php endforeach; ?>

<?php echo $this->Form->create('Todo',
		array('controller'=>'todos','action'=>'add'),
		array('class'=>'new_todo'));
?>

<legend><strong>新規メインタスクの追加</strong></legend>

<?php echo $this->Form->input('name',array('label'=>false));?>

<?php 
echo $this->Form->hidden('user_id',
		array('value'=> $this->Session->read('Login.Id')));
?>			

<?php 
echo $this->Form->hidden('project_id',
		array('value'=> $project['Project']['id']));
?>			

<?php echo $this->Form->submit('追加する',array('class'=>'btn btn-success'));?>

<?php $this->Form->end(); ?>				


</div>

