<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Experience Entity
 *
 * @property int $employee_id
 * @property int $customer_id
 * @property string $designation
 * @property string $industry
 * @property string $function
 * @property string $employer
 * @property string $city
 * @property string $country
 * @property \Cake\I18n\Time $fromdate
 * @property \Cake\I18n\Time $todate
 * @property string $contract
 * @property int $id
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Customer $customer
 */
class Experience extends Entity
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
