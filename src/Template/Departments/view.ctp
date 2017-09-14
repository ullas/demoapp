<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Department
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
        <?= $this->Form->create($department, array('role' => 'form')) ?>
          <fieldset>
          	<?php
            	echo $this->Form->input('external_code',['label' => 'Department Code','disabled' => true]);
            	echo $this->Form->input('name',['label' => 'Department Name','disabled' => true]);
            	echo $this->Form->input('description',['disabled' => true]);
            	echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive'), 'empty' => 'Choose','disabled' => true]);
            	echo $this->Form->input('effective_start_date', ['label' => 'Start Date','value' => !empty($department->effective_start_date) ? $department->effective_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('effective_end_date', ['label' => 'End Date','class' => 'mptldp','value' => !empty($department->effective_end_date) ? $department->effective_end_date->format($mptldateformat) : '','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('parent_id',['options' => $parents,'disabled' => true, 'empty' => true]);
            	echo $this->Form->input('head_of_unit',['label' => 'Head of Department','disabled' => true]);
            	echo $this->Form->input('cost_center_id', ['options' => $costCentres, 'empty' => true,'disabled' => true]);
          	?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Department'), ['action' => 'edit', $department['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div>
  </section>
