<?php
		$this->Html->addCrumb('プロジェクト名','',array('controller'=>'projects','action'=>'view',));
		$this->Html->addCrumb('掲示板',array('action'=>'index','project_id'=>$this->params['project_id']));
		$this->Html->addCrumb($thread['Thread']['title'],array(),array('class'=>'active'));
?>
<table class="table table-bordered table-hover">
		<tr>
			<th><i class="icon-comment"></i> スレッド名</th>
			<th><i class="icon-wrench"></i> 管理</th>
		</tr>
		<tr>
			<td>
				<h4><?php echo h($thread['Thread']['title']);?></h4>
			</td>
			<td class="table-date">
				<?php echo $this->Html->link('<i class="icon-pencil"></i> 編集', array('controller'=>'threads','action'=>'edit','project_id'=>$this->params['project_id'],'id'=>$this->params['id']),array('escape'=>false));?>
				<br>
				<?php echo $this->Form->postLink('<i class="icon-trash"></i> 削除', array('controller'=>'threads','action'=>'delete','project_id'=>$this->params['project_id'],'id'=>$this->params['id']),array('escape'=>false),'スレッドを削除しますがよろしいですか?');?>
			</td>
		</tr>

		<tr>
			<td colspan="2">
				<div class="media">
				  <a class="pull-left thumbnail" href="#">
						<img src="http://placekitten.com/64/64" />
				  </a>
					<div class="media-body">
				    <h5 class="media-heading">
				    	<i class="icon-user"></i>
				    	<?php echo h($thread['User']['nickname']) ;?>
				    </h5>
						<div class="comments-data">
							<i class="icon-tag"></i>
							<?php echo h($thread['Thread']['id']) ;?>
							<i class="icon-time"></i>
							<?php echo h($thread['Thread']['created']) ;?>
						</div>
				    <!-- Nested media object -->
				    <div class="media">
				    	<?php echo h($thread['Thread']['body']);?>
				    </div>
				  </div>
				</div>
			</td>
		</tr>
</table>

<?php foreach ($replies as $reply) :?>
<div class="well">
	<div class="media">
	  <a class="pull-left thumbnail" href="#">
			<img src="http://placekitten.com/64/64" />
	  </a>
	  <?php if($reply['Reply']['user_id'] === $this->Session->read('Login.Id')):?>
				<?php echo $this->Form->postLink('<i class="icon-trash pull-right"></i>', array('controller' => 'replies', 'action' => 'delete', $reply['Reply']['id']), array('escape' => false),'リプライを削除しますがよろしいですか？'); ?>
		<?php endif; ?>
		<div class="media-body">
	    <h5 class="media-heading">
	    	<i class="icon-user"></i> <?php echo h($reply['User']['nickname']);?>
	    </h5>
			<div class="comments-data">
				<i class="icon-repeat"></i> <?php echo h($reply['Reply']['id']);?>
				<i class="icon-time"></i> <?php echo h($reply['Reply']['created']);?>
			</div>
	    <!-- Nested media object -->
	    <div class="media">
	    		<?php echo nl2br(h($reply['Reply']['body']));?>
	    </div>
	  </div>
	</div>
</div>
<?php endforeach ;?>

<br>

<div class="text-center">
  <ul class="pager">
  	<?php
  		$this->Paginator->options(
  			array('url' => array(
  				'project_id'=>$this->params['project_id'],
  				'controller'=>'threads',
  				'action'=>'view',
  				'id'=>$this->params['id'],
  			))
  		);
    ?>
    <li class="previous">
    	<?php if ($this->Paginator->hasPrev()): ?>
    		<?php echo $this->Paginator->prev('Prev');?>
    	<?php endif;?>
    </li>
    <li class="next">
    	<?php if ($this->Paginator->hasNext()): ?>
    		<?php echo $this->Paginator->next('next');?>
    	<?php endif;?>
    </li>
  </ul>
  	<hr>
    <?php echo $this->Paginator->counter();?>
</div>
<hr>
<div class="well comment-form">

	<h4>スレッドに対するリプライを投稿する</h4>

  <?php echo $this->Form->create('Reply',array('controller' => 'replies', 'action' => 'add'));?>

	 <?php echo $this->Form->input('Reply.body',array('label'=>false,'type'=>'textarea'));?>

   <?php echo $this->Form->hidden('Reply.thread_id',array('value'=>$thread['Thread']['id']));?>

   <?php echo $this->Form->hidden('Reply.user_id', array('value' => $this->Session->read('Login.Id')));?>

	 <?php echo $this->Form->submit('リプライを投稿する',array('class'=>'btn btn-success'));?>

   <?php echo $this->Form->end();?>

</div>

