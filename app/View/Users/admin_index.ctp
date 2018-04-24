<html>
<body>

    <header>
        <div class="row">
            <div class="col-sm-10">
                <span class="badge badge-success">管理者</span>
                <h3 style="display: inline"><?php echo h('部署一覧'); ?></h3>
            </div>
            <div class="col-sm-2 text-right">
                <button class="btn btn-danger" onclick="location.href='<?php echo $this->html->url('/users/logout/'); ?>';">Logout</button>
            </div>
        </div>
    </header>

    <div class="content row">
        <div class="col-sm-6 offset-sm-3">
            <div class="admin_contents list-group">
                <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">部署を選択:</li>
                <?php foreach($departments as $key => $department) : ?>
                    <a><?php echo $this->Html->link($department, array('controller' => 'users', 'action' => "admin_user_lists/$key"),
                                                                 array('class' => 'list-group-item d-flex justify-content-between align-items-center myset'));
                    ?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <footer></footer>

    <?php echo $this->Html->css('mystyle'); ?>

</body>
</html>
