<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $name
 * @property string $contactno
 * @property string $noofusers
 * @property \Cake\I18n\Time $expirydate
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $payroll_lock
 * @property \Cake\I18n\Time $lock_date
 * @property \Cake\I18n\Time $lock_time
 * @property int $lockemployee_id
 *
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\BusinessUnit[] $business_units
 * @property \App\Model\Entity\CalendarAssignment[] $calendar_assignments
 * @property \App\Model\Entity\ContactInfo[] $contact_infos
 * @property \App\Model\Entity\CorporateAddress[] $corporate_addresses
 * @property \App\Model\Entity\CostCentre[] $cost_centres
 * @property \App\Model\Entity\Department[] $departments
 * @property \App\Model\Entity\Dependent[] $dependents
 * @property \App\Model\Entity\Division[] $divisions
 * @property \App\Model\Entity\EducationalQualification[] $educational_qualifications
 * @property \App\Model\Entity\Empdatabiography[] $empdatabiographies
 * @property \App\Model\Entity\EmpDataPersonal[] $empdatapersonals
 * @property \App\Model\Entity\EmployeeAbsencerecord[] $employee_absencerecords
 * @property \App\Model\Entity\Employee[] $employees
 * @property \App\Model\Entity\EmploymentInfo[] $employmentinfos
 * @property \App\Model\Entity\EventReason[] $event_reasons
 * @property \App\Model\Entity\Experience[] $experiences
 * @property \App\Model\Entity\Frequency[] $frequencies
 * @property \App\Model\Entity\HolidayCalendar[] $holiday_calendars
 * @property \App\Model\Entity\Holiday[] $holidays
 * @property \App\Model\Entity\Identity[] $identities
 * @property \App\Model\Entity\Jobclass[] $jobclasses
 * @property \App\Model\Entity\JobFunction[] $jobfunctions
 * @property \App\Model\Entity\Jobinfo[] $jobinfos
 * @property \App\Model\Entity\Job[] $jobs
 * @property \App\Model\Entity\LegalEntity[] $legal_entities
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\Note[] $notes
 * @property \App\Model\Entity\OfficeAsset[] $office_assets
 * @property \App\Model\Entity\PayComponentGroup[] $pay_component_groups
 * @property \App\Model\Entity\PayComponent[] $pay_components
 * @property \App\Model\Entity\PayGrade[] $pay_grades
 * @property \App\Model\Entity\PayGroup[] $pay_groups
 * @property \App\Model\Entity\PayRange[] $pay_ranges
 * @property \App\Model\Entity\PayrollArea[] $payroll_area
 * @property \App\Model\Entity\PayrollData[] $payroll_data
 * @property \App\Model\Entity\PayrollRecord[] $payroll_record
 * @property \App\Model\Entity\PayrollResult[] $payroll_result
 * @property \App\Model\Entity\PayrollStatus[] $payroll_status
 * @property \App\Model\Entity\Picklist[] $picklists
 * @property \App\Model\Entity\Position[] $positions
 * @property \App\Model\Entity\Profile[] $profiles
 * @property \App\Model\Entity\Region[] $regions
 * @property \App\Model\Entity\Skill[] $skills
 * @property \App\Model\Entity\TimeAccountType[] $time_account_types
 * @property \App\Model\Entity\TimeTypeProfileTimeType[] $time_type_profile_time_types
 * @property \App\Model\Entity\TimeTypeProfile[] $time_type_profiles
 * @property \App\Model\Entity\TimeType[] $time_types
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\WorkSchedule[] $work_schedules
 * @property \App\Model\Entity\Workflowaction[] $workflowactions
 * @property \App\Model\Entity\Workflowrule[] $workflowrules
 * @property \App\Model\Entity\Workflow[] $workflows
 * @property \App\Model\Entity\WorkflowsHistory[] $workflows_history
 */
class Customer extends Entity
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
