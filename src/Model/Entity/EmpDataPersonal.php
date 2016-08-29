<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmpDataPersonal Entity
 *
 * @property int $id
 * @property string $salutation
 * @property string $first_name
 * @property string $last_name
 * @property string $initials
 * @property string $middle_name
 * @property string $first_name_alt1
 * @property string $middle_name_alt1
 * @property string $last_name_alt1
 * @property string $first_name_alt2
 * @property string $middle_name_alt2
 * @property string $last_name_alt2
 * @property string $display_name
 * @property string $formal_name
 * @property string $birth_name
 * @property string $birth_name_alt1
 * @property string $birth_name_alt2
 * @property string $preferred_name
 * @property string $display_name_alt1
 * @property string $display_name_alt2
 * @property string $formal_name_alt1
 * @property string $formal_name_alt2
 * @property string $name_format
 * @property bool $is_overridden
 * @property string $nationality
 * @property string $second_nationality
 * @property string $third_nationality
 * @property string $wps_code
 * @property string $uniqueid
 * @property string $prof_legal
 * @property string $exclude_legal
 * @property \Cake\I18n\Time $nationality_date
 * @property string $home_airport
 * @property string $religion
 * @property float $number_children
 * @property \Cake\I18n\Time $disability_date
 * @property string $disable_group
 * @property float $disable_degree
 * @property string $disable_type
 * @property string $disable_authority
 * @property string $disable_ref
 * @property string $person_id_external
 */
class EmpDataPersonal extends Entity
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
