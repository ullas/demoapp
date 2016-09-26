<section class="content-header">
  <h1>
    Job info
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
    <table class="table table-hover">
        <tr>
            <th><?= __('Position') ?></th>
            <td><?= h($jobInfo->position) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In Position') ?></th>
            <td><?= h($jobInfo->time_in_position) ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= h($jobInfo->company) ?></td>
        </tr>
        <tr>
            <th><?= __('Country Of Company') ?></th>
            <td><?= h($jobInfo->country_of_company) ?></td>
        </tr>
        <tr>
            <th><?= __('Business Unit') ?></th>
            <td><?= h($jobInfo->business_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Division') ?></th>
            <td><?= h($jobInfo->division) ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= h($jobInfo->department) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($jobInfo->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Timezone') ?></th>
            <td><?= h($jobInfo->timezone) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Center') ?></th>
            <td><?= h($jobInfo->cost_center) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Code') ?></th>
            <td><?= h($jobInfo->job_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Title') ?></th>
            <td><?= h($jobInfo->job_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Local Job Title') ?></th>
            <td><?= h($jobInfo->local_job_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee Class') ?></th>
            <td><?= h($jobInfo->employee_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Grade') ?></th>
            <td><?= h($jobInfo->pay_grade) ?></td>
        </tr>
        <tr>
            <th><?= __('Regular Temp') ?></th>
            <td><?= h($jobInfo->regular_temp) ?></td>
        </tr>
        <tr>
            <th><?= __('Work Period') ?></th>
            <td><?= h($jobInfo->work_period) ?></td>
        </tr>
        <tr>
            <th><?= __('Shift Code') ?></th>
            <td><?= h($jobInfo->shift_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee Type') ?></th>
            <td><?= h($jobInfo->employee_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Manager Category') ?></th>
            <td><?= h($jobInfo->manager_category) ?></td>
        </tr>
        <tr>
            <th><?= __('Notes') ?></th>
            <td><?= h($jobInfo->notes) ?></td>
        </tr>
        <tr>
            <th><?= __('Attachmentid') ?></th>
            <td><?= h($jobInfo->attachmentid) ?></td>
        </tr>
        <tr>
            <th><?= __('Custom String1') ?></th>
            <td><?= h($jobInfo->custom_string1) ?></td>
        </tr>
        <tr>
            <th><?= __('Eeo Class') ?></th>
            <td><?= h($jobInfo->eeo_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Change Reason External') ?></th>
            <td><?= h($jobInfo->change_reason_external) ?></td>
        </tr>
        <tr>
            <th><?= __('Radford Jobcode') ?></th>
            <td><?= h($jobInfo->radford_jobcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Trackid') ?></th>
            <td><?= h($jobInfo->trackid) ?></td>
        </tr>
        <tr>
            <th><?= __('Employment Type') ?></th>
            <td><?= h($jobInfo->employment_type) ?></td>
        </tr>
        <tr>
            <th><?= __('International Org Code') ?></th>
            <td><?= h($jobInfo->international_org_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Supervisor Level') ?></th>
            <td><?= h($jobInfo->supervisor_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Sick Pay Supplement') ?></th>
            <td><?= h($jobInfo->sick_pay_supplement) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Leaving For') ?></th>
            <td><?= h($jobInfo->company_leaving_for) ?></td>
        </tr>
        <tr>
            <th><?= __('Holiday Calendar Code') ?></th>
            <td><?= h($jobInfo->holiday_calendar_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Work Schedule Code') ?></th>
            <td><?= h($jobInfo->work_schedule_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Type Profile Code') ?></th>
            <td><?= h($jobInfo->time_type_profile_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Recording Profile Code') ?></th>
            <td><?= h($jobInfo->time_recording_profile_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Recording Admissibility Code') ?></th>
            <td><?= h($jobInfo->time_recording_admissibility_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Recording Variant') ?></th>
            <td><?= h($jobInfo->time_recording_variant) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Overtime Compensation Variant') ?></th>
            <td><?= h($jobInfo->default_overtime_compensation_variant) ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= h($jobInfo->event) ?></td>
        </tr>
        <tr>
            <th><?= __('Event Reason') ?></th>
            <td><?= h($jobInfo->event_reason) ?></td>
        </tr>
        <tr>
            <th><?= __('Notice Period') ?></th>
            <td><?= h($jobInfo->notice_period) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Scale Area') ?></th>
            <td><?= h($jobInfo->pay_scale_area) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Scale Type') ?></th>
            <td><?= h($jobInfo->pay_scale_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Scale Group') ?></th>
            <td><?= h($jobInfo->pay_scale_group) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Scale Level') ?></th>
            <td><?= h($jobInfo->pay_scale_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In Job') ?></th>
            <td><?= h($jobInfo->time_in_job) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In Company') ?></th>
            <td><?= h($jobInfo->time_in_company) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In Location') ?></th>
            <td><?= h($jobInfo->time_in_location) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In Department') ?></th>
            <td><?= h($jobInfo->time_in_department) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In Pay Scale Level') ?></th>
            <td><?= h($jobInfo->time_in_pay_scale_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobInfo->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Standard Hours') ?></th>
            <td><?= $this->Number->format($jobInfo->standard_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Working Days Per Week') ?></th>
            <td><?= $this->Number->format($jobInfo->working_days_per_week) ?></td>
        </tr>
        <tr>
            <th><?= __('Fte') ?></th>
            <td><?= $this->Number->format($jobInfo->fte) ?></td>
        </tr>
        <tr>
            <th><?= __('Shift Rate') ?></th>
            <td><?= $this->Number->format($jobInfo->shift_rate) ?></td>
        </tr>
        <tr>
            <th><?= __('Shift Factor') ?></th>
            <td><?= $this->Number->format($jobInfo->shift_factor) ?></td>
        </tr>
        <tr>
            <th><?= __('Amount Of Financial Plan') ?></th>
            <td><?= $this->Number->format($jobInfo->amount_of_financial_plan) ?></td>
        </tr>
        <tr>
            <th><?= __('Ern Number') ?></th>
            <td><?= $this->Number->format($jobInfo->ern_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Users Id') ?></th>
            <td><?= $this->Number->format($jobInfo->users_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Biographies Id') ?></th>
            <td><?= $this->Number->format($jobInfo->emp_data_biographies_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Position Entry Date') ?></th>
            <td><?= h($jobInfo->position_entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Probation Period End Date') ?></th>
            <td><?= h($jobInfo->probation_period_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Expected Return Date') ?></th>
            <td><?= h($jobInfo->expected_return_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Entry Date') ?></th>
            <td><?= h($jobInfo->job_entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Company Entry Date') ?></th>
            <td><?= h($jobInfo->company_entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Location Entry Date') ?></th>
            <td><?= h($jobInfo->location_entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Department Entry Date') ?></th>
            <td><?= h($jobInfo->department_entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Scale Level Entry Date') ?></th>
            <td><?= h($jobInfo->pay_scale_level_entry_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Hire Date') ?></th>
            <td><?= h($jobInfo->hire_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Termination Date') ?></th>
            <td><?= h($jobInfo->termination_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Of Absence Start Date') ?></th>
            <td><?= h($jobInfo->leave_of_absence_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Of Absence Return Date') ?></th>
            <td><?= h($jobInfo->leave_of_absence_return_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Full Time Employee') ?></th>
            <td><?= $jobInfo->is_full_time_employee ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Shift Employee') ?></th>
            <td><?= $jobInfo->is_shift_employee ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Cross Border Worker') ?></th>
            <td><?= $jobInfo->is_cross_border_worker ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Competition Clause Active') ?></th>
            <td><?= $jobInfo->is_competition_clause_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Primary') ?></th>
            <td><?= $jobInfo->is_primary ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Eligible For Car') ?></th>
            <td><?= $jobInfo->is_eligible_for_car ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Eligible For Benefit') ?></th>
            <td><?= $jobInfo->is_eligible_for_benefit ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Eligible For Financial Plan') ?></th>
            <td><?= $jobInfo->is_eligible_for_financial_plan ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Side Line Job Allowed') ?></th>
            <td><?= $jobInfo->is_side_line_job_allowed ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
