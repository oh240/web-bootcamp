<div class="users form">
    <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
    <?php echo $this->Form->hidden('User.id',array('value'=>$this->request->data['User']['id'])); ?>
    <?php echo $this->Form->hidden('User.username',array('value'=>$this->request->data['User']['username'])); ?>
    <p>
        ニックネーム
        <?php echo $this->Form->input('User.nickname'); ?>
    </p>

    <p>
        新しいパスワード
        <?php echo $this->Form->input('new_password1', array('type' => 'password')); ?>
    </p>

    <p>
        新しいパスワード（確認用）
        <?php echo $this->Form->input('new_password2', array('type' => 'password')); ?>
    </p>

    <p>
        <?php echo $this->Form->submit('変更を保存する', array('class' => 'btn btn-success btn-small')); ?>
    </p>


    <?php echo $this->Form->end(); ?>
</div>
