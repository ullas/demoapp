<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Data
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payrollData) ?>
    <fieldset>
        <?php
            echo $this->Form->input('employee_code');
            echo $this->Form->input('pay_component_id', ['options' => $payComponents, 'empty' => true]);
            echo $this->Form->input('pay_component_value');
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Payroll Data'),['title'=>'Save Payroll Data','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
