<header>
    <span class="badge badge-success">管理者</span>
    <h4 style="display: inline">申請を編集</h4>
</header>

<div id="content" class="text-center box24">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</div>

<div class="content row">
    <div class="col-sm-6 offset-sm-3">
        <div class="form_contents">
            <?php
                 echo $this->Form->create('RequestDetail', ['class' => 'form_inline']);
                 echo $this->Form->hidden('RequestDetail.user_id', array('default' => $login_user_id));
                 echo $this->Form->input('RequestDetail.date',  ['label' => ['text' => '日付']]);
                 echo $this->Form->input('RequestDetail.client', ['label' => ['text' => 'クライアント名'], 'class' => 'form-control']);
                 echo $this->Form->input('RequestDetail.transportation_id', ['options' => $transportation_id_list, 'label' => ['text' => '交通手段']]);
                 echo $this->Form->input('RequestDetail.from_station', ['class' => 'form-control', 'label' => '区間', 'placeholder' => '乗車駅']);
                 echo $this->Form->input('RequestDetail.to_station', ['class' => 'form-control', 'label' => '', 'placeholder' => '降車駅']);
                 echo $this->Form->input('RequestDetail.cost', ['class' => 'form-control', 'label' => '費用']);
                 echo $this->Form->input('RequestDetail.oneway_or_round', array(
                     'type' => 'select',
                     'options' => $oneway_or_round,
                     'label' => '往復or片道'
                 ));
                 echo $this->Form->input('RequestDetail.overview', ['class' => 'form-control', 'label' => '備考']);
            ?>
            <div class="text-right row">
                <div class="col-sm-7"></div>
                <div class="col-sm-3">
                    <?php echo $this->Form->button(__('Edit'), ['class' => 'btn btn-myset btn-block']);
                          echo $this->Form->end();
                    ?>
                </div>
                <div class="col-sm-2">
                    <button type="button" onclick="history.back()" class="btn page-link text-dark d-inline-block">Cancel</button>
                </div>
        </div>
    </div>
</div>

<footer></footer>

<?php echo $this->Html->css('mystyle'); ?>
