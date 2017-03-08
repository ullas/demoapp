<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Payroll Area
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($payrollArea) ?>
    <fieldset>
        <?php
        	echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('business_unit_id', ['options' => $businessUnits, 'empty' => true]);
            echo $this->Form->input('division_id', ['options' => $divisions, 'empty' => true]);
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Payroll'),['title'=>'Save Payroll','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
