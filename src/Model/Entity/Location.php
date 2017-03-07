<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $location_group
 * @property string $time_zone
 * @property float $standard_hours
 * @property bool $status
 * @property string $external_code
 * @property int $customer_id
 * @property int $holiday_calendar_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\LegalEntity[] $legal_entities
 */
class Location extends Entity
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
