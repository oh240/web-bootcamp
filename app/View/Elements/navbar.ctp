<ul class="nav nav-pills">
    
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
	
  <li>
		<?php echo $this->Html->link('掲示板',array('controller'=>'comments','action'=>'index')); ?>
	</li>
	
  <li>
		<?php echo $this->Html->link('Wikiページ',array('controller'=>'wikis','action'=>'index')); ?>
	</li>
	
  <li>
		<?php echo $this->Html->link('ユーザー設定',array('controller'=>'users','action'=>'edit',$this->Session->read('Login.Id'))); ?>
  </li>
  
</ul>
