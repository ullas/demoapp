<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayComponentGroup Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $currency
 * @property string $show_on_comp_ui
 * @property string $use_for_comparatio_calc
 * @property string $use_for_range_penetration
 * @property float $sort_order
 * @property bool $system_defined
 * @property string $external_code
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\PayComponent $pay_component
 * @property \App\Model\Entity\TimeAccountType[] $time_account_types
 */
class PayComponentGroup extends Entity
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
