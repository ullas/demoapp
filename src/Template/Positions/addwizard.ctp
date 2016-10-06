		<?= $this->element('stepformwizardelmnt', array('wcontent' => 'Position','wid' => '5')); ?>

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
            echo $this->Form->input('external_name');
            echo "<div class='form-group'><label>Effective Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_start_date'></div></div>";
            echo "<div class='form-group'><label>Effective End Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='effective_end_date'></div></div>";
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
            echo "<div class='form-group'><label>Created Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='created_date'></div></div>";
            echo $this->Form->input('last_modified_by');
            echo "<div class='form-group'><label>Last Modified Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='last_modified_date'></div></div>";
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
            echo $this->Form->input('parent_position_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
