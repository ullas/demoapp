<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BusinessUnit Entity
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
 */
class BusinessUnit extends Entity
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
