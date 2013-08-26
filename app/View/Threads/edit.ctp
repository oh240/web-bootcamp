<h2>スレッドの内容を変更する</h2>
<hr />
<div class="well add_solo">
<br />
<?php echo $this->Form->create('Thread');?>
<p>
     <strong>スレッド名</strong>
</p>
<?php echo $this->Form->input('title',array('label'=>false,'class'=>'span11','error'=>false));?>

<p>
     <strong>スレッドの内容</strong>
</p>
<?php echo $this->Form->input('body',array('type'=>'textarea','label'=>false,'class'=>'span11','error'=>false));?>

<?php echo $this->Form->hidden('project_id', array('value' => $this->params['project_id']));?>

<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));?>

<?php echo $this->Form->hidden('id', array('value' => $this->params['id']));?>

<?php echo $this->Form->submit('変更を行う',array('class'=>'btn btn-success btn-large btn-block'));?>
<?php echo $this->Form->end();?>
</div>

