<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Payroll Status
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
    <?= $this->Form->create($payrollStatus, array('role' => 'form')) ?>
    <fieldset>
    <?php
            echo $this->Form->input('code',['disabled' => true]);
            echo $this->Form->input('pay_group_id', ['options' => $payGroups, 'disabled' => true]);
            echo $this->Form->input('current_period',['label'=>'Payroll Period','disabled' => true]);
            echo $this->Form->input('earliest_retro_date',['label'=>'Earliest Retroactive Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('payroll_lock',['disabled' => true]);
            echo $this->Form->input('lock_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('lock_time',['label'=>'Lock Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>'],'disabled' => true]);
        ?></fieldset>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Payroll Status'), ['action' => 'edit', $payrollStatus['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
          <?= $this->Form->end() ?>
</div></div></section>
