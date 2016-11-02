<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Position
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
		<?= $this->Form->create($position) ?>
    <fieldset>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('effective_start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('positiontype');
            echo $this->Form->input('position_criticality');
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
            echo $this->Form->input('regular_temporary');
            echo $this->Form->input('target_fte');
            echo $this->Form->input('vacant');
            echo $this->Form->input('standard_hours');
            echo $this->Form->input('created_by');
            echo $this->Form->input('created_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('last_modified_by');
            echo $this->Form->input('last_modified_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('position_matrix_relationship');
            echo $this->Form->input('right_to_return');
            echo $this->Form->input('position_code');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('department_id', ['options' => $departments, 'empty' => true]);
            echo $this->Form->input('cost_center_id', ['options' => $costCentres, 'empty' => true]);
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('division_id', ['options' => $divisions, 'empty' => true]);
            echo $this->Form->input('pay_grade_id', ['options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('pay_range_id', ['options' => $payRanges, 'empty' => true]);
            echo $this->Form->input('parent_id', ['options' => $parents, 'empty' => true]);
            echo $this->Form->input('lft');
            echo $this->Form->input('rght');
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update Position'),['title'=>'Update Position','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>
