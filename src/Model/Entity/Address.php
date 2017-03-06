<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $address_no
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $address4
 * @property string $address5
 * @property string $address6
 * @property string $address7
 * @property string $address8
 * @property string $zip_code
 * @property string $city
 * @property string $county
 * @property string $state
 * @property int $customer_id
 * @property int $employee_id
 *
 * @property \App\Model\Entity\EmpDataBiography $emp_data_biography
 * @property \App\Model\Entity\Customer $customer
 */
class Address extends Entity
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
