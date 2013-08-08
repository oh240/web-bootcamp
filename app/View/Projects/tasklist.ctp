<h2>
    <?php echo $project['Project']['name']; ?>
</h2>

<hr>

<div class="well">

    <?php foreach ($todos as $todo) : ?>

        <h4>
            <?php echo $this->Html->link($todo['Todo']['name'], array('controller' => 'todos', 'action' => 'view', 'project_id' => $project['Project']['id'], 'id' => $todo['Todo']['id'])); ?>
        </h4>

        <ul class="subtasks">

            <?php foreach ($todo['Task'] as $task) : ?>

                <?php if ($task['status'] == 0) : ?>

                    <li id="task_<?php echo $task['id']; ?>">
                        <?php echo $this->Form->postLink('<i class="icon-edit"></i>', array('controller' => 'tasks', 'action' => 'chk', $task['id']), array('escape' => false), 'タスクを完了状態にしますがよろしいですか？', $task['id']); ?>
                        <?php echo $task['name']; ?>
                    </li>

                <?php else : ?>

                <?php endif; ?>

            <?php endforeach; ?>

            <li class="add_subtask">

                <p>
                    <strong> 
                        サブタスクの追加
                    </strong>
                </p>
                
               <?php echo $this->Form->create('Task', array('controller' => 'tasks', 'action' => 'add'), array('class' => 'sub_task'));?>
                
                <?php echo $this->Form->input('name',array('label'=>false));?>
                
                <?php echo $this->Form->hidden('todo_id',array('value'=>$todo['Todo']['id']));?>
                
                <?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));?>			
                
                <?php echo $this->Form->submit('サブタスクを追加する',array('class'=>'btn btn-success btn-mini'));?>
                
                <?php $this->Form->end();?>

            </li>

            <?php foreach ($todo['Task'] as $task) : ?>

                <?php if ($task['status'] == 1) : ?>

                    <li id="task_<?php echo $task['id']; ?>">
                        <i class="icon-ok-sign"></i>
                        <span class="end"><?php echo $task['name']; ?></span>
                        <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('escape' => false), 'タスクを削除しますがよろしいですか？', $task['id']); ?>
                        <?php echo $this->Form->postLink('<i class="icon-refresh"></i>', array('controller' => 'tasks', 'action' => 'unchk', $task['id']), array('escape' => false), 'タスク状態を変更しますがよろしいですか？', $task['id']); ?>
                    </li>

                <?php else : ?>

                <?php endif; ?>

            <?php endforeach; ?>

        </ul>

    <?php endforeach; ?>
    <br />
    
    <div id="main_task_add">
    <h3>新規メインタスクの追加</h3>
        <?php echo $this->Form->create('Todo', array('controller' => 'todos', 'action' => 'add'), array('class' => 'sub_task'));?>

        <?php echo $this->Form->input('Todo.name', array('label' => false)); ?>

        <?php echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));?>			

        <?php echo $this->Form->hidden('project_id', array('value' => $project['Project']['id']));?>			
        <?php echo $this->Form->submit('追加する', array('class' => 'btn btn-success')); ?>

        <?php $this->Form->end(); ?>
    </div>
</div>

