<div class="add_subtask">
  <p>
      <strong>
          サブタスクの変更
			</strong>
  </p>
<?php echo $this->Form->create('Task');?>
<?php echo $this->Form->input('name',array('label'=>false,'error'=>false));?>
<?php echo $this->Form->input('rank',array('type'=>'select','label'=>'優先度の設定','options'=>array('指定なし:(グレー)','低:(緑)','中:(黄)','高:(赤)')));?>
<?php echo $this->Form->hidden('id');?>
<?php echo $this->Form->hidden('todo_id');?>
<?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));?>
<?php echo $this->Form->submit('サブタスクを変更する',array('class'=>'btn btn-success btn-mini'));?>
<?php echo $this->Form->end();?>
</div>

