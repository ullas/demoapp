<?= $this->element('templateelmnt'); ?>

<section class="content-header">
      <h1>
       Pay Component
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payComponent) ?>
    <fieldset>
        <legend><?= __('Add Pay Component') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
			echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_component_type');
            echo $this->Form->input('is_earning');
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('pay_component_value');
            echo $this->Form->input('recurring');
            echo $this->Form->input('base_pay_component_group');
            echo $this->Form->input('tax_treatment');
            echo $this->Form->input('can_override');
            echo $this->Form->input('self_service_description');
            echo $this->Form->input('display_on_self_service');
            echo $this->Form->input('used_for_comp_planning');
            echo $this->Form->input('target');
            echo $this->Form->input('is_relevant_for_advance_payment');
            echo $this->Form->input('max_fraction_digits');
            echo $this->Form->input('unit_of_measure');
            echo $this->Form->input('rate');
            echo $this->Form->input('number');
            echo $this->Form->input('external_code');
            echo $this->Form->input('frequency_id', ['options' => $frequencies, 'empty' => true]);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save PayComponent'),['title'=>'Save PayComponent','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
<!-- Date picker -->
<?php
$this->Html->css([  'AdminLTE./plugins/datepicker/datepicker3' ], ['block' => 'css']);
$this->Html->script([ 'AdminLTE./plugins/datepicker/bootstrap-datepicker' ], ['block' => 'script']); ?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () { 
     $('#start_date').datepicker({ autoclose: true }); 
     $('#end_date').datepicker({ autoclose: true }); 
  });
</script>
<?php $this->end(); ?>
