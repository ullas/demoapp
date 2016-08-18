<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Position Entity
 *
 * @property int $id
 * @property string $external_name
 * @property string $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $type
 * @property string $position_criticality
 * @property bool $position_controlled
 * @property bool $multiple_incumbents_allowed
 * @property string $comment
 * @property string $incumbent
 * @property string $change_reason
 * @property string $description
 * @property string $job_title
 * @property string $job_code
 * @property string $job_level
 * @property string $employee_class
 * @property string $regular_temporary
 * @property string $pay_grade
 * @property float $target_fte
 * @property bool $vacant
 * @property float $standard_hours
 * @property string $company
 * @property string $business_unit
 * @property string $division
 * @property string $department
 * @property string $location
 * @property string $cost_center
 * @property string $created_by
 * @property \Cake\I18n\Time $created_date
 * @property string $last_modified_by
 * @property \Cake\I18n\Time $last_modified_date
 * @property string $parent_position
 * @property string $pay_range
 * @property string $position_matrix_relationship
 * @property string $right_to_return
 * @property string $code
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
