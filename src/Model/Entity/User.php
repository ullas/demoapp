<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $role
 * @property string $username
 * @property int $id
 * @property string $name
 * @property int $customer_id
 * @property int $employee_id
 * @property int $dateformat
 * @property int $timezone
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\CalendarAssignment[] $calendar_assignments
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
	protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
