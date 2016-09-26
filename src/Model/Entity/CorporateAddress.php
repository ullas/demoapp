<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CorporateAddress Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $address1
 * @property string $address2
 * @property string $address3
 * @property string $city
 * @property string $county
 * @property string $state
 * @property string $province
 * @property string $zip_code
 * @property string $country
 * @property int $customer_id
 */
class CorporateAddress extends Entity
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
