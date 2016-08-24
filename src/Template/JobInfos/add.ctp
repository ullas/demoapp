<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Job Infos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="jobInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($jobInfo) ?>
    <fieldset>
        <legend><?= __('Add Job Info') ?></legend>
        <?php
            echo $this->Form->input('position');
            echo $this->Form->input('position_entry_date', ['empty' => true]);
            echo $this->Form->input('time_in_position');
            echo $this->Form->input('company');
            echo $this->Form->input('country_of_company');
            echo $this->Form->input('business_unit');
            echo $this->Form->input('division');
            echo $this->Form->input('department');
            echo $this->Form->input('location');
            echo $this->Form->input('timezone');
            echo $this->Form->input('cost_center');
            echo $this->Form->input('job_code');
            echo $this->Form->input('job_title');
            echo $this->Form->input('local_job_title');
            echo $this->Form->input('employee_class');
            echo $this->Form->input('pay_grade');
            echo $this->Form->input('regular_temp');
            echo $this->Form->input('standard_hours');
            echo $this->Form->input('working_days_per_week');
            echo $this->Form->input('work_period');
            echo $this->Form->input('fte');
            echo $this->Form->input('is_full_time_employee');
            echo $this->Form->input('is_shift_employee');
            echo $this->Form->input('shift_code');
            echo $this->Form->input('shift_rate');
            echo $this->Form->input('shift_factor');
            echo $this->Form->input('employee_type');
            echo $this->Form->input('manager_category');
            echo $this->Form->input('is_cross_border_worker');
            echo $this->Form->input('is_competition_clause_active');
            echo $this->Form->input('probation_period_end_date', ['empty' => true]);
            echo $this->Form->input('notes');
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
            echo $this->Form->input('expected_return_date', ['empty' => true]);
            echo $this->Form->input('pay_scale_area');
            echo $this->Form->input('pay_scale_type');
            echo $this->Form->input('pay_scale_group');
            echo $this->Form->input('pay_scale_level');
            echo $this->Form->input('job_entry_date', ['empty' => true]);
            echo $this->Form->input('time_in_job');
            echo $this->Form->input('company_entry_date', ['empty' => true]);
            echo $this->Form->input('time_in_company');
            echo $this->Form->input('location_entry_date', ['empty' => true]);
            echo $this->Form->input('time_in_location');
            echo $this->Form->input('department_entry_date', ['empty' => true]);
            echo $this->Form->input('time_in_department');
            echo $this->Form->input('pay_scale_level_entry_date', ['empty' => true]);
            echo $this->Form->input('time_in_pay_scale_level');
            echo $this->Form->input('hire_date', ['empty' => true]);
            echo $this->Form->input('termination_date', ['empty' => true]);
            echo $this->Form->input('leave_of_absence_start_date', ['empty' => true]);
            echo $this->Form->input('leave_of_absence_return_date', ['empty' => true]);
            echo $this->Form->input('users_id');
            echo $this->Form->input('emp_data_biographies_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
