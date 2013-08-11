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
                               <?php echo $this->Form->postLink('<i class="icon-edit"></i>', array('controller'=>'tasks','action'=>'chk',$task['id']),array('escape'=>false),'タスクを完了しますがよろしいですか？',$task['id']);?>
                               <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller'=>'tasks','action'=>'delete',$task['id']),array('escape'=>false),'タスクを削除しますがよろしいですか？',$task['id']);?>
                               <?php echo $task['name']; ?>
                        </li>
                    
                    <?php endif ;?>

                <?php endforeach; ?>

        </ul>
    
     <hr />

    <?php endforeach; ?>
     <div class="text-right">
     <?php echo $this->Html->link('タスクリストへ移動する',array('controller' => 'projects', 'action' => 'tasklist', $project['Project']['id']),array('class'=>'btn btn-success')); ?>
     </div>

</div>