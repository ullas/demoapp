<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Payroll Result
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payrollResult, array('role' => 'form')) ?>
    <?php
            echo $this->Form->input('employee_code',['disabled' => true]);
            echo $this->Form->input('pay_group_id', ['options' => $payGroups, 'disabled' => true]);
            echo $this->Form->input('period',['label'=>'Payroll Period','disabled' => true]);
            echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'disabled' => true]);
            echo $this->Form->input('pay_component_value',['disabled' => true]);
            echo $this->Form->input('paid_salary',['label'=>'Salary Paid','disabled' => true]);
            echo $this->Form->input('run_date',['value' => !empty($payrollResult->run_date) ? $payrollResult->run_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('run_time',['label'=>'Run Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>'],'disabled' => true]);

            ?></div>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Payroll Result'), ['action' => 'edit', $payrollResult['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></section>
