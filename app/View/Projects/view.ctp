<br />
<h2><?php echo $project['Project']['name']; ?></h2>
<hr />

<?php echo $this->element('navbar'); ?>

<h3>タスクリスト</h3>
<div class="well">

    <?php foreach ($todos as $todo) : ?>

        <h4>
               <?php echo $todo['Todo']['name']; ?>
        </h4>

        <ul class="subtasks">

                <?php foreach ($todo['Task'] as $task) : ?>
            
                    <?php if ( $task['status'] == "0" ) : ?>
            
	                    <li id="task_<?php echo $task['id']; ?>">
	                     <label class="checkbox">
	                        <?php if ($task['rank'] == 1) :?>
	                            <span class="badge badge-success">
	                        <?php elseif ($task['rank'] == 2) :?>
	                            <span class="badge badge-warning"> 
	                        <?php elseif ($task['rank'] == 3) :?>
	                            <span class="badge badge-important">
	                        <?php else:?>
	                            <span class="badge">
	                         <?php endif;?>
	                            <?php echo $task['id']?>
	                            </span>
	                        <?php echo $this->Form->postLink('<input type="checkbox">', array('controller' => 'tasks', 'action' => 'chk', $task['id']), array('escape' => false)); ?>
	                        <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('escape' => false), 'タスクを削除しますがよろしいですか？', $task['id']); ?>
	                        <?php echo $task['name']; ?>
	                       </label>
                    
                    <?php endif ;?>

                <?php endforeach; ?>

        </ul>
    
     <hr />

    <?php endforeach; ?>
     <div class="text-right">
     <?php echo $this->Html->link('タスクリストへ移動する',array('controller' => 'projects', 'action' => 'tasklist', $project['Project']['id']),array('class'=>'btn btn-success')); ?>
     </div>

</div>