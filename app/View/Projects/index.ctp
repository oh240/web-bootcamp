<h3>プロジェクト一覧</h3>

<div class="well">
	
	<?php foreach($projects as $project): ?>
		<div class="clearfix">
			<h4>
			<?php echo $this->Html->link(h($project['Project']['name']),
      array('controller'=>'projects','action'=>'view','id'=>$project['Project']['id']));?>
			</h4>
			<div class="pull-right">
						登録者: <?php echo h($project['User']['nickname']);?>
			</div>
		</div>
		<hr>
	<?php endforeach ;?>
	
	<?php echo $this->Form->create('Project');?>
		<h3></h3>
		<?php echo $this->Form->input('name',array('label'=>false));?>
		<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('Login.Id')));?>
		<?php echo $this->Form->submit('追加する',array('class'=>'btn btn-success'));?>
	<?php $this->Form->end();?>
	
</div>
