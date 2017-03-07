<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Payroll Area
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
    <?= $this->Form->create($payrollArea, array('role' => 'form')) ?>
    	<fieldset><?php
    		echo $this->Form->input('code',['disabled' => true]);
            echo $this->Form->input('name',['disabled' => true]);
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('business_unit_id', ['options' => $businessUnits, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('division_id', ['options' => $divisions, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true,'disabled' => true]);
            
        ?></fieldset></div>
<div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit PayrollArea'), ['action' => 'edit', $payrollArea['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></section>