<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayRange Entity
 *
 * @property string $name
 * @property string $description
 * @property string $status
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $currency
 * @property string $frequency_code
 * @property float $minimum_pay
 * @property float $maximum_pay
 * @property float $increment
 * @property float $incr_percentage
 * @property float $mid_point
 * @property string $geo_zone
 * @property int $id
 * @property string $external_code
 * @property int $legal_entity_id
 * @property int $pay_group_id
 *
 * @property \App\Model\Entity\LegalEntity $legal_entity
 * @property \App\Model\Entity\PayGroup $pay_group
 */
class PayRange extends Entity
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
