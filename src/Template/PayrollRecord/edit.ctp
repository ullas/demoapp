<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Record
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payrollRecord) ?>
    <fieldset>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('payroll_area_id', ['options' => $payrollArea, 'empty' => true]);
            echo $this->Form->input('period',['label'=>'Payroll Period']);
            echo $this->Form->input('run_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('run_time',['label'=>'Run Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Payroll Record'),['title'=>'Update Payroll Record','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
