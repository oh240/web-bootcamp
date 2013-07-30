			<h1 class="text-center">Web BootCamps</h1>
			<br>
			<br>
			<?php	
				echo $this->Form->create('User',array('class'=>'form-signin'));
			?>
			<br>
      <h2 class="form-signin-heading">ログイン</h2>
			
			<?php
				echo $this->Form->input('username',array('class'=>'input-block-level'));
				echo $this->Form->input('password',array('class'=>'input-block-level'));
			?>
			
      <label class="checkbox">
        <input type="checkbox" value="remember-me">パスワードを記憶させる
      </label>
			<br>
			<?php 
				echo $this->Html->link('新規登録',array('action'=>'add'),
				array("class"=>'btn btn-success btn-large'));
			?>
			<?php
				echo $this->Form->submit('ログイン',array('class'=>'btn btn-primary btn-large','div'=>false));
			?>
			<?php $this->Form->end();?>

