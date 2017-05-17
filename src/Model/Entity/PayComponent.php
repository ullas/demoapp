<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayComponent Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $pay_component_type
 * @property string $is_earning
 * @property string $currency
 * @property float $pay_component_value
 * @property bool $recurring
 * @property string $tax_treatment
 * @property string $can_override
 * @property string $self_service_description
 * @property string $display_on_self_service
 * @property string $used_for_comp_planning
 * @property bool $target
 * @property bool $is_relevant_for_advance_payment
 * @property float $max_fraction_digits
 * @property string $unit_of_measure
 * @property float $rate
 * @property float $number
 * @property string $external_code
 * @property int $frequency_id
 * @property int $customer_id
 * @property int $pay_component_group_id
 * @property int $base_pay_component_group
 * @property int $base_pay_component_type
 *
 * @property \App\Model\Entity\Frequency $frequency
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\PayComponentGroup $pay_component_group
 * @property \App\Model\Entity\PayrollData[] $payroll_data
 * @property \App\Model\Entity\PayrollResult[] $payroll_result
 * @property \App\Model\Entity\TimeAccountType[] $time_account_types
 */
class PayComponent extends Entity
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
