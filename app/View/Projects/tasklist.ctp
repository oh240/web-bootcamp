<h2>
    <?php echo $project['Project']['name']; ?>のタスクリスト
</h2>

<hr>

<?php echo $this->element('navbar'); ?>

<div class="well">

    <?php foreach ($todos as $todo) : ?>
    
        <br />

        <h4>
              <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller'=>'todos','action'=>'delete',$todo['Todo']['id']),array('escape'=>false),'メインタスクを削除しますがよろしいですか？（サブタスクも削除されます。）',$todo['Todo']['id']);?>
              <?php echo $todo['Todo']['name'] ;?>
        </h4>
    
        <br />
    
        <ul class="subtasks">

            <?php foreach ($todo['Task'] as $task) : ?>

                <?php if ($task['status'] == 0) : ?>

                    <li id="task_<?php echo $task['id']; ?>">
                        
                        <span class="badge"><?php echo $task['id']; ?></span>
                        
                        <?php echo $this->Form->postLink('<i class="icon-edit"></i>', array('controller' => 'tasks', 'action' => 'chk', $task['id']), array('escape' => false), 'タスクを完了しますがよろしいですか？', $task['id']); ?>
                        <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('escape' => false), 'タスクを削除しますがよろしいですか？', $task['id']); ?>                        
                        
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
                
               <?php echo $this->Form->create('Task',array('controller' => 'tasks', 'action' => 'add'));?>
                
                <?php echo 
                        $this->Form->input('Task.name',
                        array('label'=>false));?>
                
                <?php echo $this->Form->hidden('Task.todo_id',array('value'=>$todo['Todo']['id']));?>
                
                <?php echo $this->Form->hidden('Task.user_id', array('value' => $this->Session->read('Login.Id')));?>			
                
                <?php echo $this->Form->submit('サブタスクを追加する',array('class'=>'btn btn-success btn-mini'));?>
                
                <?php echo $this->Form->end();?>
                
                
                <?php foreach ($todo['Task'] as $task) : ?>

                    <?php if ($task['status'] == 1) : ?>

                        <li id="task_<?php echo $task['id']; ?>" class="end">
                            
                            <?php echo $task['id']; ?>
                            
                            <?php echo $this->Form->postLink('<i class="icon-check"></i>', array('controller' => 'tasks', 'action' => 'unchk', $task['id']), array('escape' => false), 'タスクを未完了状態にしますがよろしいですか？', $task['id']); ?>
                           <?php echo $this->Form->postLink('<i class="icon-remove"></i>', array('controller' => 'tasks', 'action' => 'delete', $task['id']), array('escape' => false), 'タスクを削除しますがよろしいですか？', $task['id']); ?>                
                            <?php echo $task['name']; ?>
                         
                        </li>

                    <?php else : ?>

                    <?php endif; ?>

                <?php endforeach; ?>

            </li>

        </ul>

    <?php endforeach; ?>
    <br />
    
    <div id="main_task_add">
    
        <h4>新規メインタスクの追加</h4>
        <br />
        <?php echo $this->Form->create('Todo', 
                array('controller' => 'todos', 'action' => 'add'));?>

        <?php echo $this->Form->input('Todo.name', array('label' => false)); ?>
         <br />
        <?php echo $this->Form->hidden('Todo.user_id', array('value' => $this->Session->read('Login.Id')));?>			

        <?php echo $this->Form->hidden('Todo.project_id', array('value' => $project['Project']['id']));?>			
        <?php echo $this->Form->submit('追加する', array('class' => 'btn btn-success')); ?>
         
        <?php echo $this->Form->end(); ?>
    </div>
</div>

