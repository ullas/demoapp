<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CalendarAssignment Entity
 *
 * @property int $id
 * @property string $calendar
 * @property string $assignmentyear
 * @property \Cake\I18n\Time $assignmentdate
 * @property string $User
 * @property string $holiday_code
 *
 * @property \App\Model\Entity\User $user
 */
class CalendarAssignment extends Entity
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
