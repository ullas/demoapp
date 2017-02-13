<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workflowrule Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $created
 * @property int $customer_id
 * @property string $created_by
 * @property string $modified_by
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Workflowaction[] $workflowactions
 * @property \App\Model\Entity\Workflow[] $workflows
 */
class Workflowrule extends Entity
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
