<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Position
        <small>View</small>
      </h1>
      <ol class="breadcrumb">

        <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
        <?= $this->Form->create($position, array('role' => 'form')) ?>
        <fieldset>
          <?php
            echo $this->Form->input('position_code',['disabled' => true]);
            echo $this->Form->input('name',['label' => 'Title','disabled' => true]);
            echo $this->Form->input('effective_status',['label' => 'Status','disabled' => true]);
            echo $this->Form->input('effective_start_date',['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('effective_end_date',['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('positiontype',['label' => 'Type','disabled' => true]);
            echo $this->Form->input('position_criticality',['label' => 'Criticality','disabled' => true]);
            echo $this->Form->input('position_controlled',['disabled' => true]);
            echo $this->Form->input('multiple_incumbents_allowed',['disabled' => true]);
            echo $this->Form->input('comment',['disabled' => true]);
            echo $this->Form->input('incumbent',['disabled' => true]);
            echo $this->Form->input('change_reason',['disabled' => true]);
            echo $this->Form->input('description',['disabled' => true]);
            echo $this->Form->input('job_title',['disabled' => true]);
            echo $this->Form->input('job_code',['disabled' => true]);
            echo $this->Form->input('job_level',['disabled' => true]);
            echo $this->Form->input('employee_class',['disabled' => true]);
            echo $this->Form->input('regular_temporary',['disabled' => true]);
            echo $this->Form->input('target_fte',['label' => 'FTE','disabled' => true]);
            echo $this->Form->input('vacant',['disabled' => true]);
            echo $this->Form->input('standard_hours',['disabled' => true]);
            // echo $this->Form->input('created_by',['disabled' => true]);
            // echo $this->Form->input('created_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            // echo $this->Form->input('last_modified_by',['disabled' => true]);
            // echo $this->Form->input('last_modified_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('position_matrix_relationship',['disabled' => true]);
            echo $this->Form->input('right_to_return',['disabled' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('division_id', ['label' => 'Division','options' => $divisions, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('location_id', ['label' => 'Location','options' => $locations, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('cost_center_id', ['label' => 'Cost Center','options' => $costCentres, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('pay_grade_id', ['label' => 'Pay Grade','options' => $payGrades, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('pay_range_id', ['label' => 'Pay Range','options' => $payRanges, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('parent_id', ['label' => 'Parent Position','options' => $parents, 'empty' => true,'disabled' => true]);
            // echo $this->Form->input('lft',['disabled' => true]);
            // echo $this->Form->input('rght',['disabled' => true]);
          ?></fieldset>
          <!-- /.box-body -->
          <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Position'), ['action' => 'edit', $position['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  </div></section>
