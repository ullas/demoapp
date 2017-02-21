<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeType Entity
 *
 * @property int $id
 * @property string $country
 * @property string $classification
 * @property float $unit
 * @property float $perm_fractions_days
 * @property float $perm_fractions_hours
 * @property string $calc_base
 * @property bool $flex_req_allow
 * @property string $take_rule
 * @property string $code
 * @property string $name
 * @property int $customer_id
 * @property bool $iscarryforward
 * @property bool $isleavewithoutpay
 * @property bool $allow_negative_balance
 * @property bool $includeholidayswithinleaveasleaves
 * @property int $time_account_type_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\TimeAccountType $time_account_type
 * @property \App\Model\Entity\TimeTypeProfile[] $time_type_profiles
 */
class TimeType extends Entity
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
