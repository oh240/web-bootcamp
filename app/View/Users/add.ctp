<h2>新規ユーザー登録</h2>
<div class="users form well">
<?php echo $this->Form->create('User'); ?>
    <?php echo $this->Form->input('username',array('label'=>'ユーザーID')); ?>
    <?php echo $this->Form->input('nickname',array('label'=>'表示名(ニックネーム)')); ?>
    <?php echo $this->Form->input('password1',array('label'=>'パスワード(半角英数字のみ4文字以上)','type'=>'password')); ?>
    <?php echo $this->Form->input('password2',array('label'=>'パスワード(確認)','type'=>'password')); ?>
    <?php echo $this->Form->submit('登録する',array('class'=>'btn btn-success btn-small')); ?>
<?php echo $this->Form->end(); ?>
</div>
