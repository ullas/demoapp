<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Status
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payrollStatus) ?>
    <fieldset>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('payroll_area_id', ['options' => $payrollArea, 'empty' => true]);
            echo $this->Form->input('current_period');
            echo $this->Form->input('earliest_retro_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('payroll_lock');            
            echo $this->Form->input('lock_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('lock_time',['label'=>'Lock Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            
        
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Payrollstatus'),['title'=>'Save Payrollstatus','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>



</section>




<?php echo $this->fetch('scriptBotton'); ?>
<script type="text/javascript">
$(document).ready(function(){
  $('.timepicker').timepicker({
    showInputs: false
  });
});
</script>