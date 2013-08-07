<h2>
    <?php echo $project['Project']['name']; ?>
</h2>

<hr>

<div class="well">

    <?php foreach ($todos as $todo) : ?>

        <h4>
            <?php
            echo $this->Html->link($todo['Todo']['name'], array('controller' => 'todos', 'action' => 'view', 'project_id' => $project['Project']['id'], 'id' => $todo['Todo']['id']));?>
        </h4>

        <ul class="subtasks">

            <?php foreach ($todo['Task'] as $task) : ?>

                <?php if ($task['status'] == 0) : ?>

                    <li id="task_<?php echo $task['id']; ?>">
                        <label class="checkbox">
                            <?php
                            echo $this->Form->checkbox($task['id'], array('value' => $task['status'], 'class' => 'closed', 'data-task-id' => $task['id']));
                            ?>
                            <?php echo $task['name']; ?>
                            <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller'=>'tasks','action'=>'delete',$task['id']),array('escape'=>false),'タスクを削除しますがよろしいですか？',$task['id']);?>
                        </label>
                    </li>

                <?php else : ?>

                <?php endif; ?>

            <?php endforeach; ?>

            <li class="add_subtask">

                <p>
                    <strong> 
                        <?php echo $this->Html->link('サブタスクの追加', array('controller' => 'tasks', 'action' => 'add', 'project_id' => $project['Project']['id'], 'todo_id' => $todo['Todo']['id']));?>
                    </strong>
                </p>

            </li>

            <?php foreach ($todo['Task'] as $task) : ?>

                <?php if ($task['status'] == 1) : ?>

                    <li id="task_<?php echo $task['id']; ?>" class="end">
                        <label class="checkbox">
                            <input type="checkbox" disabled="disabled" checked="checked">
                            <?php echo $task['name']; ?>
                            <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller'=>'tasks','action'=>'delete',$task['id']),array('escape'=>false),'タスクを削除しますがよろしいですか？',$task['id']);?>
                        </label>
                    </li>

                <?php else : ?>

                <?php endif; ?>

            <?php endforeach; ?>

        </ul>

    <?php endforeach; ?>

    <?php
    echo $this->Form->create('Todo', array('controller' => 'todos', 'action' => 'add'), array('class' => 'new_todo'));
    ?>

    <legend><strong>新規メインタスクの追加</strong></legend>

    <?php echo $this->Form->input('name', array('label' => false)); ?>

    <?php
    echo $this->Form->hidden('user_id', array('value' => $this->Session->read('Login.Id')));
    ?>			

    <?php
    echo $this->Form->hidden('project_id', array('value' => $project['Project']['id']));
    ?>			

    <?php echo $this->Form->submit('追加する', array('class' => 'btn btn-success')); ?>

    <?php $this->Form->end(); ?>				


</div>

<script>
    $(function() {
        $('.closed').click(function(e) {
            $.post('<?php echo $this->webroot; ?>tasks/chk/' + $(this).data('task-id'), {}, function(res) {
                $('#task_' + res.id).fadeOut();
            }, "json");
        });
    });
</script>

