<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            Web BootCamp:
            <?php echo $title_for_layout; ?>
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

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">Web BootCamp</a>
                    <div class="nav-collapse collapse clearfix">
                        <div class="pull-right">

                            <?php if ($this->Session->check('Login.Id')): ?>

                                <div class="white pull-left">
                                    ようこそ
                                    <?php echo $this->Session->read('Login.Nickname'); ?>
                                    さん
                                </div>
                            

                                <?php
                                echo $this->Html->link
                                        ('ログアウト', array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-info btn-mini'));
                                ?>

                            <?php else : ?>


                                <?php
                                echo $this->Html->link
                                        ('ログイン', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-primary btn-mini'));
                                ?>

                                <?php
                                echo $this->Html->link
                                        ('新規登録', array('controller' => 'users', 'action' => 'add'), array('class' => 'btn btn-success btn-mini'));
                                ?>

                            <?php endif; ?>
                        </div>

                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
