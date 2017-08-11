<?= $this->element('templateelmnt'); ?>
<div class="box box-success box-solid no-border">
	<div class="box-header with-border text-center">
        <h3 class="box-title">Add Absence Quota</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool popoverDelete">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <!-- /.box-tools -->
    </div>
    <?= $this->Form->create($absenceQuotum) ?>
    <fieldset>
        <?php
            echo $this->Form->input('employee_id', ['options' => $employees, 'class' => 'select2', 'disabled' => true]);
            echo $this->Form->input('time_type_id', ['options' => $timeTypes, 'empty' => true]);
            echo $this->Form->input('frequency_id', ['options' => $frequencies, 'empty' => true]);
            echo $this->Form->input('quota');
            echo $this->Form->input('balance',['label'=>'Leave Balance']);
            echo $this->Form->input('nxtexpiry',['label'=>'Next Expiry Date','class' => 'mptldp','type' => 'text','value' => !empty($absenceQuotum->nxtexpiry) ? $absenceQuotum->nxtexpiry->format($mptldateformat) : '','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('expirylot',['label'=>'Expiry Lot']);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <input type="button" value="Save" class="mptlsave btn btn-success pull-right" id="mptlsave"/>
    </div>
    <?= $this->Form->end() ?>
</div>
