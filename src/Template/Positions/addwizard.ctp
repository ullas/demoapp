<?= $this->element('templateelmnt'); ?>

<section class="content" style="padding: 1px;min-height:150px;">
	<?= $this->element('stepformwizardelmnt', array('wcontent' => 'Position','wid' => '5')); ?>
</section>

<section class="content-header">
      <h1>
        Position
        <small>Add</small>
      </h1>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($position) ?>
    <fieldset>
        <?php
            echo $this->Form->input('position_code');
            echo $this->Form->input('name',['label' => 'Title']);
            echo $this->Form->input('effective_status',['label' => 'Status','class'=>'select2','options' => array('Active', 'Inactive')]);
            echo $this->Form->input('effective_start_date',['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date',['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('positiontype',['label' => 'Type']);
            echo $this->Form->input('position_criticality',['label' => 'Criticality']);
            echo $this->Form->input('position_controlled');
            echo $this->Form->input('multiple_incumbents_allowed');
            echo $this->Form->input('comment');
            echo $this->Form->input('incumbent');
            echo $this->Form->input('change_reason');
            echo $this->Form->input('description');
            echo $this->Form->input('job_title');
            echo $this->Form->input('job_code');
            echo $this->Form->input('job_level');
            echo $this->Form->input('employee_class');
			echo $this->Form->input('regular_temporary',['label'=>'Regular/Temporary','class'=>'select2','options' => array('Regular'=>'Regular','Temporary'=> 'Temporary')]);            echo $this->Form->input('target_fte',['label' => 'FTE']);
            echo $this->Form->input('vacant');
            echo $this->Form->input('standard_hours');
            // echo $this->Form->input('created_by');
            // echo $this->Form->input('created_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            // echo $this->Form->input('last_modified_by');
            // echo $this->Form->input('last_modified_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('position_matrix_relationship');
            echo $this->Form->input('right_to_return');
            echo $this->Form->input('business_unit_id', ['options' => $businessUnits, 'empty' => true]);
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('division_id', ['label' => 'Division','options' => $divisions, 'empty' => true]);
            echo $this->Form->input('department_id', ['label' => 'Department','options' => $departments, 'empty' => true]);
            echo $this->Form->input('location_id', ['label' => 'Location','options' => $locations, 'empty' => true]);
            echo $this->Form->input('cost_center_id', ['label' => 'Cost Center','options' => $costCentres, 'empty' => true]);
            echo $this->Form->input('pay_grade_id', ['label' => 'Pay Grade','options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('pay_range_id', ['label' => 'Pay Range','options' => $payRanges, 'empty' => true]);
            echo $this->Form->input('parent_id', ['label' => 'Parent Position','options' => $parents, 'empty' => true]);
            // echo $this->Form->input('lft');
            // echo $this->Form->input('rght');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'pull-right']) ?>
    <?= $this->Form->end() ?>
</div></div></section>
