<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LegalEntity Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property string $country_of_registration
 * @property float $standard_weekly_hours
 * @property float $currency
 * @property string $official_language
 * @property string $external_code
 * @property int $location_id
 * @property int $paygroup_id
 *
 * @property \App\Model\Entity\Location $location
 * @property \App\Model\Entity\PayGroup $pay_group
 */
class LegalEntity extends Entity
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
