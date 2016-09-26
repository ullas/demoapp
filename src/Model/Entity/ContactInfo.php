<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactInfo Entity
 *
 * @property int $id
 * @property string $phone
 * @property string $mobile
 * @property string $email_address1
 * @property string $email_address2
 * @property string $facebook
 * @property string $linkedin
 * @property string $person_id_external
 * @property int $customer_id
 */
class ContactInfo extends Entity
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
