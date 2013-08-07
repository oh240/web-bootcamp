<br />
<h2><?php echo $project['Project']['name']; ?></h2>
<hr />
<h3>タスクリスト</h3>
<div class="well">

    <?php foreach ($todos as $todo) : ?>

        <h4>
            <?php
            echo $this->Html->link($todo['Todo']['name'], array('controller' => 'todos', 'action' => 'view',
                'project_id' => $project['Project']['id'], 'id' => $todo['Todo']['id']));
            ?>
        </h4>

        <ul class="subtasks">

                <?php foreach ($todo['Task'] as $task) : ?>
            
                    <?php if ( $task['status'] == "0" ) : ?>
            
                        <li id="task_<?php echo $task['id']; ?>">
                            <label class="checkbox">
                                <?php echo $this->Form->checkbox($task['id'], array('value' => $task['status'], 'class' => 'closed', 'data-task-id' => $task['id'])); ?>
                                <?php echo $this->Html->link($task['name'], array('controller' => 'tasks', 'action' => 'view', $task['id']));
                                ?>
                               <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller'=>'tasks','action'=>'delete',$task['id']),array('escape'=>false),'タスクを削除しますがよろしいですか？',$task['id']);?>
                            </label>
                        </li>
                    
                    <?php endif ;?>

                <?php endforeach; ?>

        </ul>
    
     <hr />

    <?php endforeach; ?>
     <h5 class="text-right">
     <?php echo $this->Html->link('タスクリストへ移動する',array('controller' => 'projects', 'action' => 'tasklist', $project['Project']['id'])); ?>
     </h5>

</div>

<h3>掲示板</h3>
<div class="well">
    <h3 class="text-center">新しい投稿はありません</h3>
</div>

<h3>Wikiページ</h3>
<div class="well">
    <h3 class="text-center">ユーザー西尾拓也によって更新されています。</h3>
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