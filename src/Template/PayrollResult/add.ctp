<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Result
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payrollResult) ?>
    <fieldset>
        <?php
            echo $this->Form->input('employee_code');
            echo $this->Form->input('pay_group_id', ['options' => $payGroups, 'empty' => true]);
            echo $this->Form->input('period',['label'=>'Payroll Period']);
            echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true]);
            echo $this->Form->input('pay_component_value');
            echo $this->Form->input('paid_salary',['label'=>'Salary Paid']);
            echo $this->Form->input('run_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('run_time',['label'=>'Run Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Payroll Result'),['title'=>'Save Payroll Result','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
