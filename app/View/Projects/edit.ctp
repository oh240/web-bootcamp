<h2>プロジェクトの変更</h2>
<hr />
<div class="well add_solo">
<br />
<?php echo $this->Form->create('Project');?>
<p>
     <strong>新規プロジェクトの名前</strong>
</p>
<?php echo $this->Form->input('name',array('label'=>false,'class'=>'span11'));?>

<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));?>

<?php echo $this->Form->hidden('id', array('value' => $this->request->data['Project']['id']));?>

<?php echo $this->Form->submit('変更を行う',array('class'=>'btn btn-success btn-large btn-block'));?>
<?php echo $this->Form->end();?>
</div>

