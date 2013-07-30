<h3>あなたの管理するプロジェクト一覧</h3>

<div class="well">
	
	<?php foreach($projects as $data): ?>
		<div class="clearfix">
			<h4>
				<?php echo $this->Html->link($data['Project']['name'],array('action'=>'view',$data['Project']['id']));?>
			</h4>
			<div class="pull-right">
						登録者:
						<?php echo $this->Html->link($data['User']['nickname'],array('controller'=>'users','action'=>'view',$data['User']['id']));?>
			</div>
		</div>
		<hr>
	<?php endforeach ;?>
	
	<?php echo $this->Form->create('Project');?>
		<legend><strong>新規プロジェクトの追加</strong></legend>
		<?php echo $this->Form->input('name',array('label'=>false));?>
		<?php echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$this->Session->read('Login.Id')));?>
		<?php echo $this->Form->submit('追加する',array('class'=>'btn btn-success'));?>
	<?php $this->Form->end();?>
	
</div>