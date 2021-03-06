<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Holiday Entity
 *
 * @property int $id
 * @property string $holiday_class
 * @property string $name
 * @property \Cake\I18n\Time $date
 * @property string $holiday_code
 * @property int $customer_id
 * @property int $holiday_calendar_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\HolidayCalendar $holiday_calendar
 * @property \App\Model\Entity\CalendarAssignment[] $calendar_assignments
 */
class Holiday extends Entity
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
