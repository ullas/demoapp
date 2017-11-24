<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jobclass Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $worker_comp_code
 * @property float $standard_weekly_hours
 * @property string $regular_temporary
 * @property bool $full_time_employee
 * @property string $external_code
 * @property int $pay_grade_id
 * @property int $customer_id
 * @property int $job_id
 * @property int $job_function_id
 * @property int $joblevel_id
 * @property int $supervisor_level_id
 * @property int $employee_class_id
 *
 * @property \App\Model\Entity\PayGrade $pay_grade
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Jobfunction $jobfunction
 * @property \App\Model\Entity\Joblevel $joblevel
 */
class Jobclass extends Entity
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
