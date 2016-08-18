<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EventReason Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $status
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 * @property string $event
 * @property string $empl_status
 * @property string $implicit_position_action
 * @property string $external_code
 */
class EventReason extends Entity
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
