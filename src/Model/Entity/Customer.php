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
 * @property \App\Model\Entity\EmpDataBiography[] $emp_data_biographies
 * @property \App\Model\Entity\EmpDataPersonal[] $emp_data_personals
 * @property \App\Model\Entity\EmploymentInfo[] $employment_infos
 * @property \App\Model\Entity\EventReason[] $event_reasons
 * @property \App\Model\Entity\Frequency[] $frequencies
 * @property \App\Model\Entity\HolidayCalendar[] $holiday_calendars
 * @property \App\Model\Entity\Holiday[] $holidays
 * @property \App\Model\Entity\Id[] $ids
 * @property \App\Model\Entity\JobClass[] $job_classes
 * @property \App\Model\Entity\JobFunction[] $job_functions
 * @property \App\Model\Entity\JobInfo[] $job_infos
 * @property \App\Model\Entity\LegalEntity[] $legal_entities
 * @property \App\Model\Entity\Location[] $locations
 * @property \App\Model\Entity\PayComponentGroup[] $pay_component_groups
 * @property \App\Model\Entity\PayComponent[] $pay_components
 * @property \App\Model\Entity\PayGrade[] $pay_grades
 * @property \App\Model\Entity\PayGroup[] $pay_groups
 * @property \App\Model\Entity\PayRange[] $pay_ranges
 * @property \App\Model\Entity\Picklist[] $picklists
 * @property \App\Model\Entity\Position[] $positions
 * @property \App\Model\Entity\Region[] $regions
 * @property \App\Model\Entity\TimeAccountType[] $time_account_types
 * @property \App\Model\Entity\TimeTypeProfile[] $time_type_profiles
 * @property \App\Model\Entity\TimeType[] $time_types
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\WorkSchedule[] $work_schedules
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
