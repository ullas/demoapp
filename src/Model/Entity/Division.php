<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Division Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $external_code
 * @property int $head_of_unit
 * @property int $customer_id
 * @property int $parent_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Jobinfo[] $jobinfos
 * @property \App\Model\Entity\PayGroup[] $pay_groups
 * @property \App\Model\Entity\PayrollArea[] $payroll_area
 * @property \App\Model\Entity\Position[] $positions
 * @property \App\Model\Entity\Division $parent_division
 */
class Division extends Entity
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
