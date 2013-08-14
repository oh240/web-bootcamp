<ul class="nav nav-pills">
  <li>
		<?php echo $this->Html->link('プロジェクト一覧',array('controller'=>'projects','action'=>'index')); ?>
	</li>
    
  <?php if ( $this->action == 'view' ) :?>
    <li class="active">
  <?php else : ?>
    <li>
  <?php endif ; ?>
		<?php echo $this->Html->link('プロジェクト概要',array('controller'=>'projects','action'=>'view',$project['Project']['id'])); ?>
	</li>
  
  <?php if ( $this->action == 'tasklist' ) :?>
    <li class="active">
  <?php else : ?>
    <li>
  <?php endif ; ?>
		<?php echo $this->Html->link('タスクリスト',
            array('controller'=>'projects','action'=>'tasklist',$project['Project']['id'])); ?>
	</li>
  
</ul>
