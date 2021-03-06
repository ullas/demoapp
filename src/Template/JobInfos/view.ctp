<?= $this->element('templateelmnt'); ?>
<section class="content-header">
  <h1>
    Job
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
  	<?= $this->Form->create($jobInfo, array('role' => 'form')) ?>
    <fieldset><?php
            echo $this->Form->input('position_id', ['disabled' => true,'class'=>'select2','options' => $positions, 'empty' => true]);
            echo $this->Form->input('position_entry_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_position',['disabled' => true]);
            echo $this->Form->input('legal_entity_id',['class'=>'select2','disabled' => true]);
			      echo $this->Form->input('business_unit_id',['disabled' => true,'class'=>'select2']);
            echo $this->Form->input('division_id',['disabled' => true,'class'=>'select2']);
            echo $this->Form->input('department_id',['disabled' => true,'class'=>'select2']);
            echo $this->Form->input('cost_centre_id',['label' => 'Cost Center','disabled' => true,'class'=>'select2']);
            echo $this->Form->input('location_id',['disabled' => true,'class'=>'select2']);
            echo $this->Form->input('country_of_company',['disabled' => true]);
            echo $this->Form->input('timezone',['disabled' => true]);
            echo $this->Form->input('job_code',['label' => 'Job Classification','disabled' => true]);
            echo $this->Form->input('job_title',['disabled' => true]);
            echo $this->Form->input('local_job_title',['disabled' => true]);
            echo $this->Form->input('employee_class',['disabled' => true]);
            echo $this->Form->input('pay_grade_id',['disabled' => true,'class'=>'select2']);
            echo $this->Form->input('regular_temp',['disabled' => true,'label'=>'Regular/Temporary','class'=>'select2','options' => array('Regular', 'Temporary'), 'empty' => true]);
            echo $this->Form->input('standard_hours',['label' => 'Standard Weekly Hours','disabled' => true]);
            echo $this->Form->input('working_days_per_week',['disabled' => true]);
            echo $this->Form->input('work_period',['disabled' => true]);
            echo $this->Form->input('fte',['label' => 'FTE','disabled' => true]);
            echo $this->Form->input('is_full_time_employee',['disabled' => true]);
            echo $this->Form->input('is_shift_employee',['disabled' => true]);
            echo $this->Form->input('shift_code',['disabled' => true]);
            echo $this->Form->input('shift_rate',['disabled' => true]);
            echo $this->Form->input('shift_factor',['label'=>'Shift Percent','disabled' => true]);
            echo $this->Form->input('employee_type',['disabled' => true]);
			      echo $this->Form->input('manager_id1',['label'=>'Manager 1','disabled' => true]);
			      echo $this->Form->input('manager_id2',['label'=>'Manager 2','disabled' => true]);
			      echo $this->Form->input('manager_id3',['label'=>'Manager 3','disabled' => true]);
			      echo $this->Form->input('manager_id4',['label'=>'Manager 4','disabled' => true]);
			      echo $this->Form->input('manager_id5',['label'=>'Manager 5','disabled' => true]);
            echo $this->Form->input('is_cross_border_worker',['disabled' => true]);
            echo $this->Form->input('is_competition_clause_active',['disabled' => true]);
            echo $this->Form->input('probation_period_end_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('notes',['disabled' => true,'type'=>'textArea']);
            echo $this->Form->input('attachmentid',['label'=>'Attachment','disabled' => true]);
            echo $this->Form->input('custom_string1',['label'=>'Custom String 1','disabled' => true]);
            echo $this->Form->input('eeo_class',['label'=>'EEO Class','disabled' => true]);
            echo $this->Form->input('change_reason_external',['label'=>'Event Reason External','disabled' => true]);
            echo $this->Form->input('radford_jobcode',['disabled' => true]);
            echo $this->Form->input('is_primary',['disabled' => true]);
            echo $this->Form->input('trackid',['label'=>'Track Id','disabled' => true]);
            echo $this->Form->input('employment_type',['disabled' => true]);
            echo $this->Form->input('is_eligible_for_car',['disabled' => true]);
            echo $this->Form->input('is_eligible_for_benefit',['disabled' => true]);
            echo $this->Form->input('international_org_code',['disabled' => true]);
            echo $this->Form->input('is_eligible_for_financial_plan',['disabled' => true]);
            echo $this->Form->input('amount_of_financial_plan',['disabled' => true]);
            echo $this->Form->input('supervisor_level',['disabled' => true]);
            echo $this->Form->input('ern_number',['label'=>'Employee Record Number','disabled' => true]);
            echo $this->Form->input('sick_pay_supplement',['disabled' => true]);
            echo $this->Form->input('company_leaving_for',['disabled' => true]);
            echo $this->Form->input('is_side_line_job_allowed',['label'=>'Sideline Job Allowed','disabled' => true]);
            echo $this->Form->input('holiday_calendar_id',['disabled' => true,'class'=>'select2', 'empty' => true]);
            echo $this->Form->input('work_schedule_id',['disabled' => true,'class'=>'select2', 'empty' => true]);
            echo $this->Form->input('time_type_profile_id',['label'=>'Time Profile','disabled' => true,'class'=>'select2', 'empty' => true]);
            echo $this->Form->input('time_recording_profile_code',['label'=>'Time Recording Profile','disabled' => true]);
            echo $this->Form->input('time_recording_admissibility_code',['label'=>'Time Recording Admissibility','disabled' => true]);
            echo $this->Form->input('time_recording_variant',['disabled' => true]);
            echo $this->Form->input('default_overtime_compensation_variant',['disabled' => true]);
            echo $this->Form->input('event',['disabled' => true]);
            echo $this->Form->input('event_reason',['disabled' => true]);
            echo $this->Form->input('notice_period',['disabled' => true]);
            echo $this->Form->input('expected_return_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_scale_area',['disabled' => true]);
            echo $this->Form->input('pay_scale_type',['disabled' => true]);
            echo $this->Form->input('pay_scale_group',['disabled' => true]);
            echo $this->Form->input('pay_scale_level',['disabled' => true]);
            echo $this->Form->input('job_entry_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_job',['disabled' => true]);
            echo $this->Form->input('company_entry_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_company',['disabled' => true]);
            echo $this->Form->input('location_entry_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_location',['disabled' => true]);
            echo $this->Form->input('department_entry_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_department',['disabled' => true]);
            echo $this->Form->input('pay_scale_level_entry_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_pay_scale_level',['disabled' => true]);
            echo $this->Form->input('hire_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('termination_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('leave_of_absence_start_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('leave_of_absence_return_date', ['disabled' => true,'class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

        ?></fieldset>
        <div class="box-footer">
          	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Job'), ['action' => 'edit', $jobInfo['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div><?= $this->Form->end() ?>
</div></div></section>
