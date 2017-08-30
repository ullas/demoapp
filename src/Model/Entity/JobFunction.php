<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jobfunction Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $job_function_type
 * @property int $customer_id
 * @property int $job_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Jobclass[] $job_classes
 * @property \App\Model\Entity\Job $job
 */
class Jobfunction extends Entity
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
