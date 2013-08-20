<h3>プロジェクト一覧</h3>

<div class="well">

	<?php foreach($projects as $project): ?>
		<div class="clearfix">
			<h4>
			<?php echo $this->Html->link($project['Project']['name'],array('controller'=>'projects','action'=>'view','id'=>$project['Project']['id']));?>
			</h4>
			<div class="pull-right">
					登録者: <?php echo h($project['User']['nickname']);?>
			</div>
		</div>
		<hr>
	<?php endforeach ;?>

	<h4>新規プロジェクトの追加</h4>
	<br>
	<?php echo $this->Form->create('Project',array('controller' => 'projects', 'action' => 'add'));?>
		<?php echo $this->Form->input('Project.name',array('label'=>false));?>
		<?php echo $this->Form->input('Project.user_id',array('type'=>'hidden','value'=>$this->Session->read('Login.Id')));?>
		<?php echo $this->Form->submit('追加する',array('class'=>'btn btn-success'));?>
	<?php echo $this->Form->end();?>

</div>
