<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TimeTypeProfile Entity
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $country
 * @property \Cake\I18n\Time $start_date
 * @property string $time_rec_variant
 * @property string $status
 * @property string $time_type
 * @property bool $enable_ess
 * @property string $external_code
 */
class TimeTypeProfile extends Entity
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
