<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workflow Entity
 *
 * @property int $id
 * @property int $currentstep
 * @property int $workflowrule_id
 * @property string $lastaction
 * @property \Cake\I18n\Time $updatetime
 * @property int $customer_id
 * @property int $emp_data_biographies_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $active
 * @property int $user_id
 * @property string $description
 *
 * @property \App\Model\Entity\Workflowrule $workflowrule
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Empdatabiography $emp_data_biography
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\EmployeeAbsencerecord[] $employee_absencerecords
 * @property \App\Model\Entity\WorkflowsHistory[] $workflows_history
 */
class Workflow extends Entity
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
