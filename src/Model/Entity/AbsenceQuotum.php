<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AbsenceQuotum Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $time_type_id
 * @property int $frequency_id
 * @property int $quota
 * @property int $balance
 * @property \Cake\I18n\Time $nxtexpiry
 * @property int $expirylot
 * @property int $customer_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $batch
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\TimeType $time_type
 * @property \App\Model\Entity\Frequency $frequency
 * @property \App\Model\Entity\Customer $customer
 */
class AbsenceQuotum extends Entity
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
