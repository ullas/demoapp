<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollData Entity
 *
 * @property int $id
 * @property string $pay_component_value
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property int $customer_id
 * @property int $empdatabiographies_id
 * @property int $pay_component_type
 * @property int $paycomponent
 * @property int $paycomponentgroup
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Empdatabiography $empdatabiography
 */
class PayrollData extends Entity
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
