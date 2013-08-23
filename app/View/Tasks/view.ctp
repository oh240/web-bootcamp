<?php
				$this->Html->addCrumb($task['Todo']['Project']['name'],array('controller'=>'projects','action'=>'tasklist','id'=>$task['Todo']['project_id']));
				$this->Html->addCrumb('タスクリスト',array('controller'=>'projects','action'=>'tasklist','id'=>$task['Todo']['project_id']));
		$this->Html->addCrumb($task['Task']['name'],array(),array('class'=>'active'));
?>
<br>
<div class="tasks view">
	<?php if ($task['Task']['status'] == 1):?>
	<h3 class="checkbox end">
		<?php echo $this->Form->postLink('<input type="checkbox" class="check_big" checked="checked"> ', array('controller' => 'tasks', 'id'=>$task['Task']['id'],'action' => 'unchk'), array('escape' => false)); ?>
	<?php else :?>
	<h3 class="checkbox">
		<?php echo $this->Form->postLink('<input type="checkbox" class="check_big">', array('controller' => 'tasks', 'id'=>$task['Task']['id'],'action' => 'chk',), array('escape' => false)); ?>
	<?php endif ;?>
	<?php echo h($task['Task']['name']);?>
	</h3>

	<hr>
	<h4><i class="icon-comment"></i> このサブタスクのコメント</h4>

	<div id="comments">
		<?php foreach($task['Comment'] as $comment) :?>

		<div class="media well">
		  <a class="pull-left thumbnail" href="#">
				<img src="http://placekitten.com/64/64" />
		  </a>
		  <?php if($comment['user_id'] === $this->Session->read('Login.Id')):?>
				<?php echo $this->Form->postLink('<i class="icon-trash pull-right"></i>', array('controller' => 'comments', 'action' => 'delete', 'id'=>$comment['id']), array('escape' => false),'コメントを削除しますがよろしいですか？'); ?>
			<?php endif; ?>
			<div class="media-body">
		    <h5 class="media-heading">
		    	<i class="icon-user"></i><?php echo h($comment['User']['nickname']);?>
		    </h5>
				<div class="comments-data">
					<i class="icon-time"></i><?php echo h($comment['created']);?>
				</div>
		    <!-- Nested media object -->
		    <div class="media">
		    	<?php echo h($comment['body']); ?>
		    </div>
		  </div>
		</div>
	<?php endforeach ;?>

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

