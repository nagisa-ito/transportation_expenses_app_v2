<?php echo $this->Html->css('user_index'); ?>
<script>
    var year_month = "<?php echo $year_month; ?>";
    var user_id = "<?php echo $user['id']; ?>";
</script>

<header>
    <?php
        echo $this->element('admin_header', array(
            'title' => '交通費精算表',
            'is_loggedIn' => 1,
            'is_admin' => $this->params['admin'],
        ));
    ?>
</header>

<div class="text-center">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="content row">
    <?php echo $this->element('profile_data'); ?>

    <!--右の要素-->
    <div class="col-sm-9">
        <div id="total_cost_area">
            <div class="strong_str table-cell pr-2">
                <b><?php echo date('Y年m月', strtotime($year_month));?>分</b>
            </div>
            <div class="table-cell">
                <?php
                    if($is_confirm) {
                        echo $this->element('confirm_badge');
                    } else {
                        echo $this->Html->link('<i class="fas fa-clipboard-check mr-1"></i>確定する', '#',
                                    array(
                                        'class' => 'btn-black-green small',
                                        'id' => 'confirm_button',
                                        'escape' => false,
                        ));
                    }
                ?>
            </div>
            <div class="strong_str mt-3">合計金額</div>
            <h1 class="text-right numerals"><b id="total_cost"><?php echo '¥ ' . number_format($total_cost); ?></b></h1>
        </div>

        <div id="request-details-area">
            <?php
                if ($this->params['admin']) {
                    echo $this->Html->link('<i class="fas fa-download"></i> CSVダウンロード', array(
                        'controller' => 'request_details',
                        'action' => "admin_requestdetail_csv_download",
                        $user['id'],
                        $year_month,
                    ),
                    array('class' => 'btn btn-green float-right', 'escape' => false));
                }
            ?>
        <table class="table">

            <thead class="thead">
                <tr>
                    <?php
                        foreach ($column_names as $column_name) {
                            if($column_name != '利用区間') {
                                echo '<th scope="col">' . h($column_name) . '</th>';
                                continue;
                            }
                            echo '<th scope="col" colspan="2">' . h($column_name) . '</th>';
                        }
                    ?>
                    <?php if (!$is_confirm || $this->params['admin']): ?>
                        <th scope="col">操作</th>
                    <?php endif; ?>
                </tr>
            </thead>

            <!--一覧をループで表示-->
            <tbody>
                <?php foreach ($requests as $request) : ?>
                    <tr id="request_<?php echo h($request['id']); ?>">
                        <th scope="row"><?php echo h($request['id']); ?></th>
                        <td><?php echo h($request['date'])?></td>
                        <td>
                            <?php
                                $state = Configure::read('trans_category');
                                echo $state[$request['trans_type']];
                            ?>
                        </td>
                        <td>
                            <?php
                                $state = Configure::read('oneway_or_round');
                                echo $state[$request['oneway_or_round']];
                            ?>
                        </td>
                        <td><?php echo h($request['transportation_name'])?></td>
                        <td><?php echo h($request['client'])?></td>
                        <td><?php echo h($request['from_station'])?></td>
                        <td><?php echo h($request['to_station'])?></td>
                        <td><?php echo h($request['cost'])?></td>
                        <td><?php echo h($request['overview'])?></td>
                        <!-- 未確定または管理者ユーザーのとき -->
                        <?php if (!$is_confirm || $this->params['admin']) : ?>
                            <td>
                                <?php
                                    //編集・削除を実行
                                    echo $this->Html->link('<i class="fas fa-pen"></i>',
                                        array(
                                            'action' => 'edit',
                                            $user['id'],
                                            $year_month,
                                            $request['id'],
                                        ),
                                        array(
                                        'escape' => false,
                                        'class' => 'btn btn-purple mr-1 edit mb-1',
                                        )
                                    );
                                    echo $this->Html->link('<i class="fas fa-trash-alt"></i>',
                                        '#',
                                        array(
                                            'class' => 'delete btn btn-purple mb-1',
                                            'data-request_id' => $request['id'],
                                            'data-user_id' => $user['id'],
                                            'data-year_month' => $year_month,
                                            'escape' => false,
                                        )
                                    );
                                ?>
                            </td>
                        <?php endif; ?>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</table>

<?php $total_cost = '¥' . number_format($total_cost);?>
<script>
    var total_cost = '<?php echo $total_cost; ?>';
    var year_month2 = '<?php echo $year_month; ?>';
</script>

