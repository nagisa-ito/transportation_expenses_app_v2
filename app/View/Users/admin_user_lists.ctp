    <header>
        <div class="row">
            <div class="col-sm-9">
                <span class="badge badge-success">管理者</span>
                <h3 style="display: inline">ユーザー一覧</h3>
            </div>
            <div class="col-sm-3 text-right">
                <button type="button" class="btn page-link text-dark d-inline-block" onclick="history.back()" >Back</button>
                <button class="btn btn-danger" onclick="location.href='<?php echo $this->html->url('/users/logout/'); ?>';">Logout</button>
            </div>
        </div>
    </header>

    <div class="text-center">
        <?php echo $this->Session->flash(); ?>
    </div>

    <div class="content row">
        <div class="col-sm-6 offset-sm-3">
            <div class="admin_contents list-group">
                <div>
                    <?php
                        echo $this->Form->create('User', ['url' => ['action' => "user_lists/$department_id"], 'type' => 'post', 'class' => "form-group"]);
                        echo $this->Form->hidden('department_id', ['default' => $department_id, 'class' => 'form-control']);
                        echo $this->Form->input('date', ['label' => '', 'type' => 'text', 'id' => 'year_month', 'placeholder' => $search_year_month, 'class' => 'form-control']);
                        echo $this->Form->button(__('選択'), ['class' => 'btn btn-myset float-right']);
                        echo $this->Form->end();
                    ?>
                </div>
                <br>
                <li class="list-group-item list-group-item-success d-flex justify-content-between align-items-center">
                    ユーザーを選択:
                </li>
                <?php foreach($users as $user) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php
                        if(isset($user['role'])) continue;
                        $user_id = $user['id'];
                        echo $this->Html->link($user['yourname'], array('controller' => 'users', 'action' => "admin_user_requests/$user_id"),
                                                                          array('class' => 'myset'));
                        foreach($each_user_month_costs as $month_cost) {
                            if($month_cost['request_details']['user_id'] == $user_id && $month_cost[0]['date'] == $search_year_month) {
                                echo '¥' . number_format($month_cost[0]['total_cost']);
                            }
                        }
                    ?>
                </li>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <footer class="footer"></footer>
