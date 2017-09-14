<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Cost Center
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo $this->Url->build(array('controller' => 'CostCentres', 'action' => 'index')); ?>"><i class="fa fa-mail-reply"></i> Back</a></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($costCentre) ?>
    <fieldset>
        <?php
            echo $this->Form->input('external_code',['label' => 'Cost Center Code']);
            echo $this->Form->input('name',['label' => 'Cost Center Name']);
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose']);
            echo $this->Form->input('effective_start_date', ['label' => 'Start Date','value' => !empty($costCentre->effective_start_date) ? $costCentre->effective_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date', ['label' => 'End Date','class' => 'mptldp','value' => !empty($costCentre->effective_end_date) ? $costCentre->effective_end_date->format($mptldateformat) : '','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('parent_cost_center');
            echo $this->Form->input('cost_center_manager');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Cost Center'),['title'=>'Update Cost Center','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>
