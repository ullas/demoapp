<section class="content-header">
  <h1>
    Job Info
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'JobInfos', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('position') ?></th>
                <th><?= $this->Paginator->sort('position_entry_date') ?></th>
                <th><?= $this->Paginator->sort('time_in_position') ?></th>
                <th><?= $this->Paginator->sort('company') ?></th>
                <th><?= $this->Paginator->sort('country_of_company') ?></th>
                <th><?= $this->Paginator->sort('business_unit') ?></th>
                <th><?= $this->Paginator->sort('division') ?></th>
                <th><?= $this->Paginator->sort('department') ?></th>
                <th><?= $this->Paginator->sort('location') ?></th>
                <th><?= $this->Paginator->sort('timezone') ?></th>
                <th><?= $this->Paginator->sort('cost_center') ?></th>
                <th><?= $this->Paginator->sort('job_code') ?></th>
                <th><?= $this->Paginator->sort('job_title') ?></th>
                <th><?= $this->Paginator->sort('local_job_title') ?></th>
                <!-- <th><?= $this->Paginator->sort('employee_class') ?></th>
                <th><?= $this->Paginator->sort('pay_grade') ?></th>
                <th><?= $this->Paginator->sort('regular_temp') ?></th>
                <th><?= $this->Paginator->sort('standard_hours') ?></th>
                <th><?= $this->Paginator->sort('working_days_per_week') ?></th>
                <th><?= $this->Paginator->sort('work_period') ?></th>
                <th><?= $this->Paginator->sort('fte') ?></th>
                <th><?= $this->Paginator->sort('is_full_time_employee') ?></th>
                <th><?= $this->Paginator->sort('is_shift_employee') ?></th>
                <th><?= $this->Paginator->sort('shift_code') ?></th>
                <th><?= $this->Paginator->sort('shift_rate') ?></th>
                <th><?= $this->Paginator->sort('shift_factor') ?></th>
                <th><?= $this->Paginator->sort('employee_type') ?></th>
                <th><?= $this->Paginator->sort('manager_category') ?></th>
                <th><?= $this->Paginator->sort('is_cross_border_worker') ?></th>
                <th><?= $this->Paginator->sort('is_competition_clause_active') ?></th>
                <th><?= $this->Paginator->sort('probation_period_end_date') ?></th>
                <th><?= $this->Paginator->sort('notes') ?></th>
                <th><?= $this->Paginator->sort('attachmentid') ?></th>
                <th><?= $this->Paginator->sort('custom_string1') ?></th>
                <th><?= $this->Paginator->sort('eeo_class') ?></th>
                <th><?= $this->Paginator->sort('change_reason_external') ?></th>
                <th><?= $this->Paginator->sort('radford_jobcode') ?></th>
                <th><?= $this->Paginator->sort('is_primary') ?></th>
                <th><?= $this->Paginator->sort('trackid') ?></th>
                <th><?= $this->Paginator->sort('employment_type') ?></th>
                <th><?= $this->Paginator->sort('is_eligible_for_car') ?></th>
                <th><?= $this->Paginator->sort('is_eligible_for_benefit') ?></th>
                <th><?= $this->Paginator->sort('international_org_code') ?></th>
                <th><?= $this->Paginator->sort('is_eligible_for_financial_plan') ?></th>
                <th><?= $this->Paginator->sort('amount_of_financial_plan') ?></th>
                <th><?= $this->Paginator->sort('supervisor_level') ?></th>
                <th><?= $this->Paginator->sort('ern_number') ?></th>
                <th><?= $this->Paginator->sort('sick_pay_supplement') ?></th>
                <th><?= $this->Paginator->sort('company_leaving_for') ?></th>
                <th><?= $this->Paginator->sort('is_side_line_job_allowed') ?></th>
                <th><?= $this->Paginator->sort('holiday_calendar_code') ?></th>
                <th><?= $this->Paginator->sort('work_schedule_code') ?></th>
                <th><?= $this->Paginator->sort('time_type_profile_code') ?></th>
                <th><?= $this->Paginator->sort('time_recording_profile_code') ?></th>
                <th><?= $this->Paginator->sort('time_recording_admissibility_code') ?></th>
                <th><?= $this->Paginator->sort('time_recording_variant') ?></th>
                <th><?= $this->Paginator->sort('default_overtime_compensation_variant') ?></th> 
                <th><?= $this->Paginator->sort('event') ?></th>
                <th><?= $this->Paginator->sort('event_reason') ?></th>
                <th><?= $this->Paginator->sort('notice_period') ?></th>
                <th><?= $this->Paginator->sort('expected_return_date') ?></th>
                <th><?= $this->Paginator->sort('pay_scale_area') ?></th>
                <th><?= $this->Paginator->sort('pay_scale_type') ?></th>
                <th><?= $this->Paginator->sort('pay_scale_group') ?></th>
                <th><?= $this->Paginator->sort('pay_scale_level') ?></th>
                <th><?= $this->Paginator->sort('job_entry_date') ?></th>
                <th><?= $this->Paginator->sort('time_in_job') ?></th>
                <th><?= $this->Paginator->sort('company_entry_date') ?></th>
                <th><?= $this->Paginator->sort('time_in_company') ?></th>
                <th><?= $this->Paginator->sort('location_entry_date') ?></th>
                <th><?= $this->Paginator->sort('time_in_location') ?></th>
                <th><?= $this->Paginator->sort('department_entry_date') ?></th>
                <th><?= $this->Paginator->sort('time_in_department') ?></th>
                <th><?= $this->Paginator->sort('pay_scale_level_entry_date') ?></th>
                <th><?= $this->Paginator->sort('time_in_pay_scale_level') ?></th>
                <th><?= $this->Paginator->sort('hire_date') ?></th>
                <th><?= $this->Paginator->sort('termination_date') ?></th>
                <th><?= $this->Paginator->sort('leave_of_absence_start_date') ?></th>
                <th><?= $this->Paginator->sort('leave_of_absence_return_date') ?></th>
                <th><?= $this->Paginator->sort('users_id') ?></th>
                <th><?= $this->Paginator->sort('emp_data_biographies_id') ?></th> -->
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobInfos as $jobInfo): ?>
            <tr>
                <td><?= $this->Number->format($jobInfo->id) ?></td>
                <td><?= h($jobInfo->position) ?></td>
                <td><?= h($jobInfo->position_entry_date) ?></td>
                <td><?= h($jobInfo->time_in_position) ?></td>
                <td><?= h($jobInfo->company) ?></td>
                <td><?= h($jobInfo->country_of_company) ?></td>
                <td><?= h($jobInfo->business_unit) ?></td>
                <td><?= h($jobInfo->division) ?></td>
                <td><?= h($jobInfo->department) ?></td>
                <td><?= h($jobInfo->location) ?></td>
                <td><?= h($jobInfo->timezone) ?></td>
                <td><?= h($jobInfo->cost_center) ?></td>
                <td><?= h($jobInfo->job_code) ?></td>
                <td><?= h($jobInfo->job_title) ?></td>
                <td><?= h($jobInfo->local_job_title) ?></td>
                <!-- <td><?= h($jobInfo->employee_class) ?></td>
                <td><?= h($jobInfo->pay_grade) ?></td>
                <td><?= h($jobInfo->regular_temp) ?></td>
                <td><?= $this->Number->format($jobInfo->standard_hours) ?></td>
                <td><?= $this->Number->format($jobInfo->working_days_per_week) ?></td>
                <td><?= h($jobInfo->work_period) ?></td>
                <td><?= $this->Number->format($jobInfo->fte) ?></td>
                <td><?= h($jobInfo->is_full_time_employee) ?></td>
                <td><?= h($jobInfo->is_shift_employee) ?></td>
                <td><?= h($jobInfo->shift_code) ?></td>
                <td><?= $this->Number->format($jobInfo->shift_rate) ?></td>
                <td><?= $this->Number->format($jobInfo->shift_factor) ?></td>
                <td><?= h($jobInfo->employee_type) ?></td>
                <td><?= h($jobInfo->manager_category) ?></td>
                <td><?= h($jobInfo->is_cross_border_worker) ?></td>
                <td><?= h($jobInfo->is_competition_clause_active) ?></td>
                <td><?= h($jobInfo->probation_period_end_date) ?></td>
                <td><?= h($jobInfo->notes) ?></td>
                <td><?= h($jobInfo->attachmentid) ?></td>
                <td><?= h($jobInfo->custom_string1) ?></td>
                <td><?= h($jobInfo->eeo_class) ?></td>
                <td><?= h($jobInfo->change_reason_external) ?></td>
                <td><?= h($jobInfo->radford_jobcode) ?></td>
                <td><?= h($jobInfo->is_primary) ?></td>
                <td><?= h($jobInfo->trackid) ?></td>
                <td><?= h($jobInfo->employment_type) ?></td>
                <td><?= h($jobInfo->is_eligible_for_car) ?></td>
                <td><?= h($jobInfo->is_eligible_for_benefit) ?></td>
                <td><?= h($jobInfo->international_org_code) ?></td>
                <td><?= h($jobInfo->is_eligible_for_financial_plan) ?></td>
                <td><?= $this->Number->format($jobInfo->amount_of_financial_plan) ?></td>
                <td><?= h($jobInfo->supervisor_level) ?></td>
                <td><?= $this->Number->format($jobInfo->ern_number) ?></td>
                <td><?= h($jobInfo->sick_pay_supplement) ?></td>
                <td><?= h($jobInfo->company_leaving_for) ?></td>
                <td><?= h($jobInfo->is_side_line_job_allowed) ?></td>
                <td><?= h($jobInfo->holiday_calendar_code) ?></td>
                <td><?= h($jobInfo->work_schedule_code) ?></td>
                <td><?= h($jobInfo->time_type_profile_code) ?></td>
                <td><?= h($jobInfo->time_recording_profile_code) ?></td>
                <td><?= h($jobInfo->time_recording_admissibility_code) ?></td>
                <td><?= h($jobInfo->time_recording_variant) ?></td>
                <td><?= h($jobInfo->default_overtime_compensation_variant) ?></td>
                <td><?= h($jobInfo->event) ?></td>
                <td><?= h($jobInfo->event_reason) ?></td>
                <td><?= h($jobInfo->notice_period) ?></td>
                <td><?= h($jobInfo->expected_return_date) ?></td>
                <td><?= h($jobInfo->pay_scale_area) ?></td>
                <td><?= h($jobInfo->pay_scale_type) ?></td>
                <td><?= h($jobInfo->pay_scale_group) ?></td>
                <td><?= h($jobInfo->pay_scale_level) ?></td>
                <td><?= h($jobInfo->job_entry_date) ?></td>
                <td><?= h($jobInfo->time_in_job) ?></td>
                <td><?= h($jobInfo->company_entry_date) ?></td>
                <td><?= h($jobInfo->time_in_company) ?></td>
                <td><?= h($jobInfo->location_entry_date) ?></td>
                <td><?= h($jobInfo->time_in_location) ?></td>
                <td><?= h($jobInfo->department_entry_date) ?></td>
                <td><?= h($jobInfo->time_in_department) ?></td>
                <td><?= h($jobInfo->pay_scale_level_entry_date) ?></td>
                <td><?= h($jobInfo->time_in_pay_scale_level) ?></td>
                <td><?= h($jobInfo->hire_date) ?></td>
                <td><?= h($jobInfo->termination_date) ?></td>
                <td><?= h($jobInfo->leave_of_absence_start_date) ?></td>
                <td><?= h($jobInfo->leave_of_absence_return_date) ?></td>
                <td><?= $this->Number->format($jobInfo->users_id) ?></td>
                <td><?= $this->Number->format($jobInfo->emp_data_biographies_id) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobInfo->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
