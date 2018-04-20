<header><h3>Add Request</h3></header>

<div class="text-center box24">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="content row">
    <div class="col-sm-6 offset-sm-3">
        <div class="form_contents">
            <?php
                 echo $this->Form->create('RequestDetail', ['class' => 'form_inline']);
                 echo $this->Form->hidden('RequestDetail.user_id', array('default' => $login_user_id));
                 echo $this->Form->input('RequestDetail.date', ['label' => ['text' => '日付']]);
                 echo $this->Form->input('RequestDetail.client',['label' => ['text' => 'クライアント名'], 'placeholder' => '訪問先が無い場合は空欄', 'class' => 'form-control']);
                 echo $this->Form->input('RequestDetail.transportation_id', array('options' => $transportation_id_list, 'label' => '交通手段'));
                 echo $this->Form->input('RequestDetail.from_station',  ['label' => ['text' => '定期区間'], 'placeholder' => '乗車駅', 'class' => 'form-control']);
                 echo $this->Form->input('RequestDetail.to_station', ['label' => ['text' => ''], 'placeholder' => '降車駅', 'class' => 'form-control']);
                 echo $this->Form->input('RequestDetail.cost', ['label' => ['text' => '費用'], 'class' => 'form-control', 'placeholder' => '定期代を考慮した金額を入力']);
                 echo $this->Form->input('RequestDetail.oneway_or_round', array(
                     'type' => 'select',
                     'options' => $oneway_or_round,
                     'label' => '往復or片道'
                 ));
                 echo $this->Form->input('RequestDetail.overview', ['label' => ['text' => '備考'], 'class' => 'form-control']);
            ?>
            <div class="text-right">
           <?php echo $this->Form->button(__('Add Request'), ['class' => 'btn btn-danger']);
                 echo $this->Form->end();
            ?>
             <button type="button" onclick="history.back()" class="btn page-link text-dark d-inline-block">Cancel</button>
            </div>
        </div>
    </div>
</div>

<footer class="footer"></footer>
<?php echo $this->Html->css('mystyle'); ?>