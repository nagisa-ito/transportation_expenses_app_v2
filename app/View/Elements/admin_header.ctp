<div class="box">

    <div class="left-content">
        <i class="fas fa-subway fa-2x header-icon"></i>
        <div class="display-cell pl-2">
            <?php
                if($this->params['admin']) {
                    echo $this->element('admin_badge');
                }
            ?>
        </div>
        <div class="title display-cell pl-2"><?php echo $title; ?></div>
    </div>
    
    <div class="text-right right-content align-middle">
        <?php if($is_loggedIn) : ?>
            <a href='javascript: history.back()' class="btn-black-green small mr-2">
                <i class="fas fa-arrow-left mr-1"></i>戻る
            </a>
            <?php
            echo $this->Html->link('<i class="fas fa-exchange-alt mr-1"></i>区間マスタ',
            array(
                'controller' => 'sections',
                'action' => 'index',
                $this->params['admin'],
            ),
             array(
                'class' => 'btn-black-pink small mr-2',
                'escape' => false,
                'target' => '_blank',
            ));

            if ($this->params['admin']) {
                $title = '<i class="fas fa-users mr-1"></i>ユーザー一覧';
                $url = array(
                    'controller' => 'users',
                    'action'     => 'user_lists',
                    'admin'      => true,
                );
                $option = array(
                    'class'  => 'btn-black-green small mr-2',
                    'escape' => false,
                );
            } else {
                $title = '<i class="fas fa-home mr-1"></i>HOMEへ';
                $url = array(
                    'controller' => 'users',
                    'action'     => 'index', 
                );
                $option = array(
                    'class'  => 'btn-black-green small mr-2',
                    'escape' => false,
                );
            }
            echo $this->Html->link($title, $url, $option);

            echo $this->Html->link('<i class="fas fa-sign-out-alt mr-1"></i>ログアウト',
                array(
                    'controller' => 'users',
                    'action' => 'logout',
                    'admin' => false,
                ),
                array(
                    'class' => 'btn-black-pink small mr-2',
                    'escape' => false,
            ));
            ?>
        <?php endif; ?>
     </div>
</div>
