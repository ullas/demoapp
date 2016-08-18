<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayGrade Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $status
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property float $pay_grade_level
 * @property string $external_code
 */
class PayGrade extends Entity
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
