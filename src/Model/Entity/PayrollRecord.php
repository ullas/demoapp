<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollRecord Entity
 *
 * @property int $id
 * @property string $code
 * @property int $payroll_area_id
 * @property string $period
 * @property \Cake\I18n\Time $run_date
 * @property \Cake\I18n\Time $run_time
 *
 * @property \App\Model\Entity\PayrollArea $payroll_area
 */
class PayrollRecord extends Entity
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
