	<?php
		$this->Html->addCrumb('プロジェクト名','',array('controller'=>'projects','action'=>'view',));
		$this->Html->addCrumb('掲示板',array('action'=>'index','project_id'=>$this->params['project_id']),array('class'=>'active'));
		$this->Html->addCrumb('新規スレッド追加',array(),array('class'=>'active'));
?>

	<h3>新規スレッド追加</h3>
	<hr>
	<div class="well comment-form">

    <?php echo $this->Form->create('Thread');?>
			<p><strong>スレッドタイトル</strong></p>
    	 <?php echo $this->Form->input('Thread.title',array('label'=>false));?>
			<p><strong>スレッド本文</strong></p>
		 <?php echo $this->Form->input('Thread.body',array('label'=>false,'type'=>'textarea'));?>

     <?php echo $this->Form->hidden('Thread.project_id',array('value'=>$this->params['project_id']));?>

     <?php echo $this->Form->hidden('Thread.user_id', array('value' => $this->Session->read('Login.Id')));?>

		 <?php echo $this->Form->submit('新規スレッドを追加する',array('class'=>'btn btn-success'));?>

     <?php echo $this->Form->end();?>

	 </div>