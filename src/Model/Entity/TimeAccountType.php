<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeAccountType Entity
 *
 * @property int $id
 * @property string $name
 * @property string $unit
 * @property string $perm_reccur
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $valid_from
 * @property \Cake\I18n\Time $valid_from_day
 * @property float $account_booking_off
 * @property string $freq_period
 * @property float $first_offset
 * @property float $start_accrual
 * @property string $accrual_base
 * @property float $min_balance
 * @property string $posting_order
 * @property float $time_to_accrual
 * @property bool $proration_used
 * @property bool $rounding_used
 * @property string $update_rule
 * @property string $payout_eligiblity
 * @property string $code
 * @property int $pay_component_id
 * @property string $time_to_actual_unit
 * @property int $pay_component_group_id
 *
 * @property \App\Model\Entity\PayComponent $pay_component
 * @property \App\Model\Entity\PayComponentGroup $pay_component_group
 */
class TimeAccountType extends Entity
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
