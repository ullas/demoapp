<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayrollArea Entity
 *
 * @property int $id
 * @property string $code
 * @property int $legal_entity_id
 * @property int $business_unit_id
 * @property int $division_id
 * @property int $location_id
 * @property string $name
 * @property int $customer_id
 *
 * @property \App\Model\Entity\LegalEntity $legal_entity
 * @property \App\Model\Entity\BusinessUnit $business_unit
 * @property \App\Model\Entity\Division $division
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\PayrollRecord[] $payroll_record
 * @property \App\Model\Entity\PayrollStatus[] $payroll_status
 */
class PayrollArea extends Entity
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
