<div class="tasks view">
	<?php if ($task['Task']['status'] == 1):?>
	<h3 class="checkbox end">
		<?php echo $this->Form->postLink('<input type="checkbox" class="check_big" checked="checked">', array('controller' => 'tasks', 'action' => 'unchk', $task['Task']['id']), array('escape' => false)); ?>
	<?php else :?>
	<h3 class="checkbox">
		<?php echo $this->Form->postLink('<input type="checkbox" class="check_big">', array('controller' => 'tasks', 'action' => 'chk', $task['Task']['id']), array('escape' => false)); ?>
	<?php endif?>
		<?php echo h($task['Task']['name']);?>
	</h3>
	<hr>
	
	<h4><i class="icon-comment"></i> このサブタスクのコメント</h4>
	
	<div id="comments">
		<div class="media well">
		  <a class="pull-left thumbnail" href="#">
				<img src="http://placekitten.com/64/64" />
		  </a>
			<div class="media-body">
		    <h5 class="media-heading"><i class="icon-user"></i> 鈴井貴之</h5>
				<div class="comments-data">
					<i class="icon-calendar"></i>2013/09/22(水)
					<i class="icon-time"></i>09:11
				</div>
		    <!-- Nested media object -->
		    <div class="media">
					サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!サイコロの旅パート6実施します!!
		    </div>
		  </div>
		</div>
		
		<div class="well comment-form">
			
		<h4>コメントを投稿する</h4>
		
    <?php echo $this->Form->create('Comment',array('controller' => 'comments', 'action' => 'add'));?>
   	 
		 <?php echo $this->Form->input('Comment.body',array('label'=>false,'type'=>'textarea'));?>

     <?php echo $this->Form->hidden('Comment.task_id',array('value'=>$task['Task']['id']));?>
     
     <?php echo $this->Form->hidden('Comment.user_id', array('value' => $this->Session->read('Login.Id')));?>			
     
		 <?php echo $this->Form->submit('コメントを投稿する',array('class'=>'btn btn-success'));?>
		 
     <?php echo $this->Form->end();?>
		 
	 </div>
		
		
	</div>
	

	
</div>
