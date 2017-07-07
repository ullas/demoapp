<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollStatus Entity
 *
 * @property int $id
 * @property string $current_period
 * @property bool $payroll_lock
 * @property \Cake\I18n\Time $lock_date
 * @property \Cake\I18n\Time $lock_time
 * @property int $customer_id
 * @property int $pay_group_id
 * @property \Cake\I18n\Time $run_date
 * @property \Cake\I18n\Time $run_time
 * @property int $employee_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\PayGroup $pay_group
 */
class PayrollStatus extends Entity
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
