<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollStatus Entity
 *
 * @property int $id
 * @property string $code
 * @property int $payroll_area_id
 * @property string $current_period
 * @property \Cake\I18n\Time $earliest_retro_date
 * @property bool $payroll_lock
 * @property \Cake\I18n\Time $lock_date
 * @property \Cake\I18n\Time $lock_time
 *
 * @property \App\Model\Entity\PayrollArea $payroll_area
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
