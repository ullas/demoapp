<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollResult Entity
 *
 * @property int $id
 * @property string $employee_code
 * @property int $payroll_area_id
 * @property string $period
 * @property int $pay_component_id
 * @property float $pay_component_value
 * @property float $paid_salary
 * @property \Cake\I18n\Time $run_date
 * @property \Cake\I18n\Time $run_time
 *
 * @property \App\Model\Entity\PayrollArea $payroll_area
 * @property \App\Model\Entity\PayComponent $pay_component
 */
class PayrollResult extends Entity
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
