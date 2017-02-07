<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * HolidayCalendar Entity
 *
 * @property int $id
 * @property string $calendar
 * @property string $name
 * @property string $country
 * @property \Cake\I18n\Time $valid_from
 * @property \Cake\I18n\Time $valid_to
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Customer $customer
 */
class HolidayCalendar extends Entity
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
