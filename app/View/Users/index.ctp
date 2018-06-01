<html>
<body>
	<header>
		<div class="row">
		<div class="col-sm-9">
			<?php
				if($this->params['admin']) {
					echo $this->element('admin_badge');
				}
			?>
			<h4 style="display: inline">交通費精算表</h4>
		</div>
		<div class="col-sm-3 text-right">
			<?php
				if($this->params['admin']) {
					echo $this->element('admin_back_to_user_lists');
				}
			?>
			<button class="btn btn-danger"
				onclick="location.href='<?php echo $this->html->url('/users/logout/'); ?>';">
			ログアウト</button>
		</div>
	</header>

	<div class="text-center">
        <?php echo $this->Session->flash(); ?>
    </div>

	<div class="content row">
		<div class="col-sm-3 text-center">
			<div id="profile-area">
				<div class="list-unstyled">
					<li><?php echo h($login_user['yourname']); ?><li>
					<br>
					<li><?php echo h($departments[$login_user['department_id']]); ?></li>
					<br>
					<table class="table table-bordered">
    					<th>定期区間</th>
						<th><?php echo h($login_user['pass_from_station']); ?></th>
						<th><?php echo h($login_user['pass_to_station']); ?></th>
					</table>
				</div>
				<div class="row mb-2">
					<div class="col-sm-8 offset-sm-2"><button class="btn btn-myset btn-block" onClick = "location.href='<?php echo $this->html->url("/requestdetails/add/$login_user[id]");?>';">申請を追加</button></div>
				</div>
				<a href='#' class="caution small show-modal">
					指定の年月の申請を確定する<br>
					※申請がない場合も申請してください
				</a>
			</div>
		</div>
		<div class="col-sm-9">
			<div id="requests-area">
				<h4>申請一覧</h4>
				<ul class="list-group">
					<?php foreach($group_by_month as $each_month_request) : ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<?php
								$print_date = $each_month_request['confirm_months']['date'];
								$print_date = date('Y年m月', strtotime($print_date));
								$year_name = $each_month_request['confirm_months']['date'];
                            ?>
                            <?php
                                if(!$each_month_request['confirm_months']['is_no_request']) {
                                    echo $this->Html->link($print_date, array(
    																			'controller' => 'requestdetails',
    																			'action' => "/index/$login_user_id/$year_name/",
    																		), ['class' => 'myset']);
                                } else {
                                    echo $this->Html->link($print_date, '#', array('class' => 'myset'));
                                }

                                if($each_month_request['confirm_months']['is_confirm'] == true) {
                                    echo '確定済';
                                }
							?>
							<div class="pull-right">
                                <?php
                                    if(!$each_month_request['confirm_months']['is_no_request']) {
                                        echo '¥ ' . number_format($each_month_request[0]['total_cost']);
                                        echo $this->Html->link($each_month_request[0]['count']. '件',
                                                array(
                                                        'controller' => 'requestdetails',
                                                        'action' => "/index/$login_user_id/$year_name/",
                                                    ), ['class' => 'myset']);
                                    } else {
                                        echo '¥ 0 ';
                                        echo $this->Html->link('0件', '#', array('class' => 'myset'));
                                    }
                                ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>

	<footer class="footer"></footer>

	<!--モーダルウィンドウ-->
	<div id="modal_window" class="modal_window text-center">
		<a href='#' class="modal_window_close"></a>
		<h1>確定したい月を選択してください :</h1>
		<div class="modal_window_contents">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<?php
                        echo $this->Form->input('date',
                                                ['label' => '',
                                                  'type' => 'text',
                                                    'id' => 'no_request_month',
                                                 'class' => 'form-control',
                                                 'value' => date('Y-m')]);
                        echo $this->Form->hidden('user_id', ['value' => $login_user_id, 'id' => 'no_request_user_id']);
                    ?>
				</div>
			</div>
			<p>申請を確定してもよろしいですか？</p>
			<?php
				echo $this->Html->link('<button type="button" class="btn btn-myset" id="no_request">確定</button>',
                                        '#', ['escape' => false]);
			?>
			<button class="btn .page-link.text-dark.d-inline-block">キャンセル</button>
		</div>
	</div>
	<!---->

	<?php echo $this->Html->css('modal'); ?>
	<?php echo $this->Html->script('modal'); ?>
</body>
</html>
