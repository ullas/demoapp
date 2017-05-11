<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EducationalQualification Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property string $qualification
 * @property string $subject
 * @property string $subject2
 * @property string $schoolcollege
 * @property string $city
 * @property \Cake\I18n\Time $fromdate
 * @property \Cake\I18n\Time $passdate
 * @property \Cake\I18n\Time $grade
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Customer $customer
 */
class EducationalQualification extends Entity
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
