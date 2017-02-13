<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workflowaction Entity
 *
 * @property int $id
 * @property int $workflowrule_id
 * @property string $name
 * @property string $displayname
 * @property int $position_id
 * @property int $stepid
 * @property int $nextactionid
 * @property int $onfailureactionid
 * @property string $failuretime
 * @property bool $failureskip
 * @property int $customer_id
 *
 * @property \App\Model\Entity\Workflowrule $workflowrule
 * @property \App\Model\Entity\Position $position
 * @property \App\Model\Entity\Nextaction $nextaction
 * @property \App\Model\Entity\Onfailureaction $onfailureaction
 * @property \App\Model\Entity\Customer $customer
 */
class Workflowaction extends Entity
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
