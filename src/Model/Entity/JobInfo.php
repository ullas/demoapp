<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JobInfo Entity
 *
 * @property int $id
 * @property string $position
 * @property \Cake\I18n\Time $position_entry_date
 * @property string $time_in_position
 * @property string $company
 * @property string $country_of_company
 * @property string $business_unit
 * @property string $division
 * @property string $department
 * @property string $location
 * @property string $timezone
 * @property string $cost_center
 * @property string $job_code
 * @property string $job_title
 * @property string $local_job_title
 * @property string $employee_class
 * @property string $pay_grade
 * @property string $regular_temp
 * @property float $standard_hours
 * @property float $working_days_per_week
 * @property string $work_period
 * @property float $fte
 * @property bool $is_full_time_employee
 * @property bool $is_shift_employee
 * @property string $shift_code
 * @property float $shift_rate
 * @property float $shift_factor
 * @property string $employee_type
 * @property string $manager_category
 * @property bool $is_cross_border_worker
 * @property bool $is_competition_clause_active
 * @property \Cake\I18n\Time $probation_period_end_date
 * @property string $notes
 * @property string $attachmentid
 * @property string $custom_string1
 * @property string $eeo_class
 * @property string $change_reason_external
 * @property string $radford_jobcode
 * @property bool $is_primary
 * @property string $trackid
 * @property string $employment_type
 * @property bool $is_eligible_for_car
 * @property bool $is_eligible_for_benefit
 * @property string $international_org_code
 * @property bool $is_eligible_for_financial_plan
 * @property float $amount_of_financial_plan
 * @property string $supervisor_level
 * @property float $ern_number
 * @property string $sick_pay_supplement
 * @property string $company_leaving_for
 * @property bool $is_side_line_job_allowed
 * @property string $holiday_calendar_code
 * @property string $work_schedule_code
 * @property string $time_type_profile_code
 * @property string $time_recording_profile_code
 * @property string $time_recording_admissibility_code
 * @property string $time_recording_variant
 * @property string $default_overtime_compensation_variant
 * @property string $event
 * @property string $event_reason
 * @property string $notice_period
 * @property \Cake\I18n\Time $expected_return_date
 * @property string $pay_scale_area
 * @property string $pay_scale_type
 * @property string $pay_scale_group
 * @property string $pay_scale_level
 * @property \Cake\I18n\Time $job_entry_date
 * @property string $time_in_job
 * @property \Cake\I18n\Time $company_entry_date
 * @property string $time_in_company
 * @property \Cake\I18n\Time $location_entry_date
 * @property string $time_in_location
 * @property \Cake\I18n\Time $department_entry_date
 * @property string $time_in_department
 * @property \Cake\I18n\Time $pay_scale_level_entry_date
 * @property string $time_in_pay_scale_level
 * @property \Cake\I18n\Time $hire_date
 * @property \Cake\I18n\Time $termination_date
 * @property \Cake\I18n\Time $leave_of_absence_start_date
 * @property \Cake\I18n\Time $leave_of_absence_return_date
 * @property string $person_id_external
 * @property int $managerid
 */
class JobInfo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
