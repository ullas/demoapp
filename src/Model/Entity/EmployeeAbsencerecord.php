<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmployeeAbsencerecord Entity
 *
 * @property int $emp_data_biographies_id
 * @property int $time_type_id
 * @property int $status
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property int $created_by
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $id
 * @property int $modified_by
 *
 * @property \App\Model\Entity\EmpDataBiography $empdatabiography
 * @property \App\Model\Entity\TimeType $time_type
 * @property \App\Model\Entity\User $user
 */
class EmployeeAbsencerecord extends Entity
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
