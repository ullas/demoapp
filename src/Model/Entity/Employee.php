<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int $emp_data_biography_id
 * @property int $emp_data_personal_id
 * @property int $employment_info_id
 *
 * @property \App\Model\Entity\EmpDataBiography $emp_data_biography
 * @property \App\Model\Entity\EmpDataPersonal $emp_data_personal
 * @property \App\Model\Entity\EmploymentInfo $employment_info
 */
class Employee extends Entity
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
