<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Note Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\Time $created_at
 * @property \Cake\I18n\Time $modified_at
 * @property int $visibleto
 * @property int $emp_data_biographies_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EmpDataBiography $empdatabiography
 * @property \App\Model\Entity\Customer $customer
 */
class Note extends Entity
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
