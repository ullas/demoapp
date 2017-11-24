<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Position Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $positiontype
 * @property string $position_criticality
 * @property bool $position_controlled
 * @property bool $multiple_incumbents_allowed
 * @property string $comment
 * @property string $incumbent
 * @property string $change_reason
 * @property string $description
 * @property string $job_title
 * @property string $job_code
 * @property string $regular_temporary
 * @property float $target_fte
 * @property bool $vacant
 * @property float $standard_hours
 * @property string $created_by
 * @property \Cake\I18n\Time $created_date
 * @property string $last_modified_by
 * @property \Cake\I18n\Time $modified
 * @property string $position_matrix_relationship
 * @property string $right_to_return
 * @property string $position_code
 * @property string $effective_status
 * @property int $customer_id
 * @property int $legal_entity_id
 * @property int $department_id
 * @property int $cost_center_id
 * @property int $location_id
 * @property int $division_id
 * @property int $pay_grade_id
 * @property int $pay_range_id
 * @property int $parent_id
 * @property int $lft
 * @property int $rght
 * @property int $business_unit_id
 * @property int $employee_class_id
 * @property int $joblevel_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\LegalEntity $legal_entity
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\CostCentre $cost_centre
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\Division $division
 * @property \App\Model\Entity\PayGrade $pay_grade
 * @property \App\Model\Entity\PayRange $pay_range
 * @property \App\Model\Entity\Position $parent_position
 * @property \App\Model\Entity\BusinessUnit $business_unit
 * @property \App\Model\Entity\Empdatabiography $empdatabiography
 * @property \App\Model\Entity\Jobinfo $jobinfo
 * @property \App\Model\Entity\Workflowaction $workflowaction
 * @property \App\Model\Entity\Position $parent
 */
class Position extends Entity
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
