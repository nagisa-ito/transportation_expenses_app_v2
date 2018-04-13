<html>
<body>

    <header></header>

    <div class="content row">
        <div class="container">
            <div class="col-sm-6 offset-sm-3 text-center" id="login_contents">
                <div id="login_title"><h2><?php echo h('Sign In'); ?></h2></div>
                <div id="login_form">
                    <?php
                        echo $this->Form->create('User', ['class' => 'form-group']);
                        echo $this->Form->input('username', ['label' => ['text' => ''], 'placeholder' => 'username', 'class' => 'form-control pad-bottom']);
                        echo $this->Form->input('password', ['label' => ['text' => ''], 'placeholder' => 'password', 'class' => 'form-control pad-bottom']);
                        echo $this->Form->button(__('Sign In'), ['class' => 'btn btn-danger btn-block mar-top', 'id' => 'login_button']);
                        echo $this->Form->end();
                    ?>
                </div>
                <?php echo $this->Html->link('Create an account', array('action' => 'add'), ['class' => 'small gold']); ?>
            </div>
        </div>
    </div>

    <footer class="footer"></footer>

</body>
<?php echo $this->Html->css('mystyle'); ?>
</html>
