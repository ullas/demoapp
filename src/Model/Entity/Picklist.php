<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Picklist Entity
 *
 * @property int $id
 * @property string $description
 * @property string $comments
 * @property string $external_code
 * @property int $customer_id
 */
class Picklist extends Entity
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
