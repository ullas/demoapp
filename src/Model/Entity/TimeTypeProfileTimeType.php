<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeTypeProfileTimeType Entity
 *
 * @property int $id
 * @property int $time_type_profile_id
 * @property int $time_type_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\TimeTypeProfile $time_type_profile
 * @property \App\Model\Entity\TimeType $time_type
 * @property \App\Model\Entity\Customer $customer
 */
class TimeTypeProfileTimeType extends Entity
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
