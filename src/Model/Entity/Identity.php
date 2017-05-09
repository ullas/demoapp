<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Identity Entity
 *
 * @property int $id
 * @property string $country
 * @property string $card_type
 * @property string $nationalid
 * @property bool $is_primary
 * @property int $customer_id
 * @property int $employee_id
 * @property \Cake\I18n\Time $issuedate
 * @property \Cake\I18n\Time $expirydate
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 */
class Identity extends Entity
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
