<?php
		$this->Html->addCrumb($this->Session->read('Act_Project.name'),array('controller'=>'projects','action'=>'view','id'=>$this->params['project_id']));
		$this->Html->addCrumb('掲示板',array(),array('class'=>'active'));
?>

<h3>掲示板</h3>
<hr>
<table class="table table-bordered table-hover">
		<tr>
			<th><i class="icon-comment"></i> スレッド名</th>
			<th><i class="icon-time"></i> 日時</th>
		</tr>
		<?php foreach ($threads as $thread) :?>
		<tr>
			<td>
				<?php echo $this->Html->link($thread['Thread']['title'],array('controller'=>'threads','project_id'=>$this->params['project_id'],'action'=>'view','id'=>$thread['Thread']['id']));?>
			</td>
			<td class="table-date">
				<?php echo h($thread['Thread']['modified']);?>
			</td>
		</tr>
		<?php endforeach;?>
</table>
<div class="text-center">
  <ul class="pager">
  	<?php
  		$this->Paginator->options(
  			array('url' => array(
  				'project_id'=>$this->params['project_id'],
  				'controller'=>'threads',
  				//'action'=>'index',
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
<br>
<div class="text-right">
    <?php echo $this->Html->link('新規スレッド追加',array('controller' => 'threads','project_id'=>$this->params['project_id'],'action' => 'add'),array('class'=>'btn btn-success')); ?>
</div>
