<?php
	$this->Html->addCrumb($project['Project']['name'],array());
?>
<h2><?php echo h($project['Project']['name']); ?></h2>
<hr />

<h3>タスクリスト</h3>
<div class="well">

    <?php foreach ($todos as $todo) : ?>

      <h4>
            <?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('controller'=>'todos','action'=>'delete',$todo['Todo']['id']),array('escape'=>false),'メインタスクを削除しますがよろしいですか？（サブタスクも削除されます。）',$todo['Todo']['id']);?>
						<i class="icon-chevron-right allow<?php echo $todo['Todo']['id']; ?>" onclick="hidesubs('<?php echo $todo['Todo']['id']; ?>');"></i>
            <?php echo h($todo['Todo']['name']) ;?>
      </h4>

        <div class="subtasks" id="subs<?php echo $todo['Todo']['id']; ?>">
					<ul class="act_tasks">
                <?php foreach ($todo['Task'] as $task) : ?>

                    <?php if ( $task['status'] == "0" ) : ?>

	                    <li id="task_<?php echo $task['id']; ?>">
	                     <div class="checkbox">
	                        <?php if ($task['rank'] == 1) :?>
	                            <span class="badge badge-success">
	                        <?php elseif ($task['rank'] == 2) :?>
	                            <span class="badge badge-warning">
	                        <?php elseif ($task['rank'] == 3) :?>
	                            <span class="badge badge-important">
	                        <?php else:?>
	                            <span class="badge">
	                         <?php endif;?>
	                            <?php echo $task['id']; ?>
	                            </span>
	                        <?php echo $this->Form->postLink('<input type="checkbox">', array('controller' => 'tasks', 'action' => 'chk', 'id'=>$task['id']), array('escape' => false)); ?>
	                        <?php echo $this->Form->postLink('<i class="icon-trash"></i>', array('controller' => 'tasks', 'action' => 'delete', 'id'=>$task['id']), array('escape' => false), 'タスクを削除しますがよろしいですか？'); ?>
									<?php echo $this->Html->link('<i class="icon-pencil"></i>', array('controller' => 'tasks', 'action' => 'edit','id'=>$task['id']),array('escape' => false)); ?>
	                       	<?php echo $this->Html->link($task['name'],array('controller'=>'tasks','action'=>'view','id'=>$task['id']));?>
	                       </div>

                    <?php endif ;?>

                <?php endforeach; ?>
					</ul>
				</div>

     <hr />

    <?php endforeach; ?>
     <div class="text-right">
     <?php echo $this->Html->link('タスクリストへ移動する',array('controller' => 'projects','id'=>$project['Project']['id'],'action' => 'tasklist'),array('class'=>'btn btn-success btn-large btn-block')); ?>
     </div>

</div>

<h3>掲示板</h3>

<div class="well">

	<div class="text-right">
		<?php echo $this->Html->link('掲示板一覧へ移動する',array('controller' => 'threads','project_id'=>$project['Project']['id'],'action' => 'index'),array('class'=>'btn btn-success btn-large btn-block')); ?>
	</div>

</div>

<?php if($project['Project']['user_id'] == $this->Session->read('Login.Id')): ?>

<h3>プロジェクト作成者管理権限</h3>

<div class="well clearfix">
<p>
    <?php echo $this->Html->link('<i class="icon-pencil icon-white"></i> プロジェクトの編集',array('action'=>'edit','id'=>$project['Project']['id']),array('class'=>'btn btn-info btn-large btn-block','escape'=>false));?>
</p>
<p>
    <?php echo $this->Form->postLink('<i class="icon-trash icon-white"></i> プロジェクトの削除',array('action'=>'delete','id'=>$project['Project']['id']),array('class'=>'btn btn-danger btn-large btn-block','escape'=>false),'プロジェクトをを削除しますがよろしいですか？（サブタスクも削除されます。）');?>
</p>


</div>

<?php endif;?>

