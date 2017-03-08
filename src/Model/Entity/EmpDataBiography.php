<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empdatabiography Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $date_of_birth
 * @property string $country_of_birth
 * @property string $region_of_birth
 * @property string $place_of_birth
 * @property string $birth_name
 * @property \Cake\I18n\Time $date_of_death
 * @property string $person_id_external
 * @property int $customer_id
 * @property int $employee_id
 * @property int $position_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Position $position
 */
class Empdatabiography extends Entity
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
