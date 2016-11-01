<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property int $job_class_id
 * @property int $job_function_id
 * @property int $job_info_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\JobClass $job_class
 * @property \App\Model\Entity\JobFunction $job_function
 * @property \App\Model\Entity\JobInfo $job_info
 */
class Job extends Entity
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
