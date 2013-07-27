<h2>
	<?php echo $project['Project']['name'];?>
</h2>

<hr>

<div class="well">
	<?php foreach ($todos as $todo) :?>
		
		<h4>
			<?php echo 
						$this->Html->link($todo['Todo']['name'],
						array('controller'=>'todos','action'=>'view',$todo['Todo']['id']));
			?>
		</h4>
		
		<form class="new_todo">
		
		<?php echo $this->Form->create('Todo',array('controller'=>'todos','action'=>'add')); ?>
		
			<?php 
						echo $this->Form->hidden('user_id',
						array('value'=> $todo['Project']['User']['id']));
			?>
			
			<?php //var_dump($todo['Task']); ?>
		
			<legend><strong>新規メインタスクの追加</strong></legend>
		
			<?php echo $this->Form->input('name',array('label'=>false));?>
			
			<?php echo $this->Form->submit('追加する',array('class'=>'btn btn-success'));?>
		
		<?php $this->Form->end(); ?>
		
		  <fieldset>
		  <legend><strong>新規メインタスクの追加</strong></legend>
				<p><textarea rows="1"></textarea></p>
				<p><button type="submit" class="btn btn-success">追加する</button></p>
		  </fieldset>
		</form>
	
				<ul class="subtasks">
						<li>
						  <label class="checkbox">
						 	 	<input type="checkbox">
								<a href="#">githubにデザインを作成して公開するまで</a>
								<a class="" href="#"><i class="icon-comment"></i></a>
								<a class="" href="#"><i class="icon-remove"></i></a>
						 </label>
						 
						</li>
						<li>
						  <label class="checkbox">
						 	 	<input type="checkbox">
								<a href="#">githubにデザインを作成して公開するまで</a>
								<a class="" href="#"><i class="icon-comment"></i></a>
								<a class="" href="#"><i class="icon-remove"></i></a>
						 </label>
						</li>
						<li>
						  <label class="checkbox">
						 	 	<input type="checkbox">
								<a href="#">githubにデザインを作成して公開するまで</a>
								<a class="" href="#"><i class="icon-comment"></i></a>
								<a class="" href="#"><i class="icon-remove"></i></a>
						 </label>
						</li>
						<li>
							<form method="get" accept-charset="utf-8" class="add_subtask">
								<p><strong><a href="#">新規サブタスクの追加</a></strong></p>
							</form>
						</li>
						
						<li>
								<strong>完了したサブタスク一覧</strong>
						</li>
						
						<li class="end">
						  <label class="checkbox">
						 	 	<input type="checkbox">
								<a href="#">githubにデザインを作成して公開するまで</a>
								7/31 
						 </label>
						</li>
				</ul>
					
	
	<?php endforeach; ?>
					
</div>

