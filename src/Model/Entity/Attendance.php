<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Attendance Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $customer_id
 * @property \Cake\I18n\Time $time_in
 * @property \Cake\I18n\Time $time_out
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Customer $customer
 */
class Attendance extends Entity
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
