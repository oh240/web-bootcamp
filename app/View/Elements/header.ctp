<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $title_for_layout; ?> : Web BootCamp

        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <?php
            echo $this->Html->meta('icon');
            echo $this->Html->css('style');
            echo $this->Html->css('bootstrap');
            echo $this->Html->css('bootstrap-responsive');
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
        ?>

        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    </head>

    <body>

    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <?php echo $this->Html->link('Web Bootcamp',array('controller'=>'projects','action'=>'/'),array('class'=>'brand'));?>
          <div class="nav-collapse collapse navbar-responsive-collapse">
            <ul class="nav pull-right">
            <li>
                <?php if ($this->Session->check('Login.Id') ) :?>
                    <a href="">
                        <i class="icon-user icon-white"></i>
                        <?php echo $this->Session->read('Login.Nickname');?>
                    </a>
                <?php endif;?>
            </li>
            <li>
                <?php if ($this->Session->check('Login.Id') ) :?>
                    <?php echo $this->Html->link('<i class="icon-wrench icon-white"></i> ユーザーの設定',array('controller'=>'users','action'=>'edit',$this->Session->read('Login.Id')),array('escape'=>false));?>
                <?php else :?>
                    <?php echo $this->Html->link('<i class="icon-plus-sign  icon-white"></i> 新規登録',array('controller'=>'users','action'=>'add'),array('escape'=>false));?>
                <?php endif;?>
             </li>
             <li>
                <?php if ($this->Session->check('Login.Id') ) :?>
                    <?php echo $this->Html->link('<i class="icon-share-alt icon-white"></i> ログアウト',array('controller'=>'users','action'=>'logout'),array('escape'=>false));?>
                <?php else :?>
                    <?php echo $this->Html->link('<i class="icon-user icon-white"></i> ログイン',array('controller'=>'users','action'=>'login'),array('escape'=>false));?>
                <?php endif;?>
             </li>
            </ul>
          </div><!-- /.nav-collapse -->
        </div>
      </div><!-- /navbar-inner -->
    </div><!-- /navbar -->