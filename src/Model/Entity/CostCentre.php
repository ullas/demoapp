<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CostCentre Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $external_code
 * @property int $cost_center_manager
 * @property int $customer_id
 * @property int $parent_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Jobinfo[] $jobinfos
 * @property \App\Model\Entity\CostCentre $parent_cost_centre
 * @property \App\Model\Entity\CostCentre $parent
 */
class CostCentre extends Entity
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
