<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Job
                <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content"><div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($jobinfo) ?>
    <fieldset>
        <?php
            echo $this->Form->input('position_id', ['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-briefcase"></i></div>'],'class'=>'select2','options' => $positions, 'empty' => true]);
            echo $this->Form->input('position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_position');
            echo $this->Form->input('legal_entity_id',['class'=>'select2']);
			echo $this->Form->input('business_unit_id',['class'=>'select2']);
            echo $this->Form->input('division_id',['class'=>'select2']);
            echo $this->Form->input('cost_centre_id',['class'=>'select2']);
            echo $this->Form->input('pay_grade_id',['class'=>'select2']);
            echo $this->Form->input('location_id',['class'=>'select2']);
            echo $this->Form->input('department_id',['class'=>'select2']);
            echo $this->Form->input('country_of_company',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('timezone');
            echo $this->Form->input('job_code');
            echo $this->Form->input('job_title');
            echo $this->Form->input('local_job_title');
            echo $this->Form->input('employee_class');
            echo $this->Form->input('regular_temp',['label'=>'Regular/Temporary','class'=>'select2','options' => array('Regular', 'Temporary'), 'empty' => true]);
            echo $this->Form->input('standard_hours');
            echo $this->Form->input('working_days_per_week');
            echo $this->Form->input('work_period');
            echo $this->Form->input('fte');
            echo $this->Form->input('is_full_time_employee');
            echo $this->Form->input('is_shift_employee');
            echo $this->Form->input('shift_code');
            echo $this->Form->input('shift_rate');
            echo $this->Form->input('shift_factor',['label'=>'Shift Percentage']);
            echo $this->Form->input('employee_type');
            echo $this->Form->input('manager_category');
            echo $this->Form->input('is_cross_border_worker');
            echo $this->Form->input('is_competition_clause_active');
            echo $this->Form->input('probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            
            echo $this->Form->input('attachmentid');
            echo $this->Form->input('custom_string1');
            echo $this->Form->input('eeo_class');
            echo $this->Form->input('change_reason_external');
            echo $this->Form->input('radford_jobcode');
            echo $this->Form->input('is_primary');
            echo $this->Form->input('trackid');
            echo $this->Form->input('employment_type');
            echo $this->Form->input('is_eligible_for_car');
            echo $this->Form->input('is_eligible_for_benefit');
            echo $this->Form->input('international_org_code');
            echo $this->Form->input('is_eligible_for_financial_plan');
            echo $this->Form->input('amount_of_financial_plan');
            echo $this->Form->input('supervisor_level');
            echo $this->Form->input('ern_number');
            echo $this->Form->input('sick_pay_supplement');
            echo $this->Form->input('company_leaving_for');
            echo $this->Form->input('is_side_line_job_allowed');
            echo $this->Form->input('holiday_calendar_code');
            echo $this->Form->input('work_schedule_code');
            echo $this->Form->input('time_type_profile_code');
            echo $this->Form->input('time_recording_profile_code');
            echo $this->Form->input('time_recording_admissibility_code');
            echo $this->Form->input('time_recording_variant');
            echo $this->Form->input('default_overtime_compensation_variant');
            echo $this->Form->input('event');
            echo $this->Form->input('event_reason');
            echo $this->Form->input('notice_period');
            echo $this->Form->input('expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('pay_scale_area');
            echo $this->Form->input('pay_scale_type');
            echo $this->Form->input('pay_scale_group');
            echo $this->Form->input('pay_scale_level');
            echo $this->Form->input('job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_job');
            echo $this->Form->input('company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_company');
            echo $this->Form->input('location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_location');
            echo $this->Form->input('department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_department');
            echo $this->Form->input('pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('time_in_pay_scale_level');
            echo $this->Form->input('hire_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('termination_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('leave_of_absence_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            
			echo $this->Form->input('notes',['type'=>'textArea']);
        ?>
    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Job'),['title'=>'Save Job','class'=>'pull-right']) ?> 
</div>
    <?= $this->Form->end() ?>
</div></div>
</section>
