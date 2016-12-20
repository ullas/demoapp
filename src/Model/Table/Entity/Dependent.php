<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Dependent Entity
 *
 * @property int $id
 * @property string $relationship_type
 * @property bool $is_accompanying_dependent
 * @property bool $is_beneficiary
 * @property string $first_name
 * @property string $last_name
 * @property string $middle_name
 * @property string $salutation
 * @property \Cake\I18n\Time $date_of_birth
 * @property string $country_of_birth
 * @property string $country
 * @property string $card_type
 * @property string $nationalid
 * @property bool $is_add_same_as_employee
 * @property string $address_number
 * @property string $visa
 * @property \Cake\I18n\Time $visa_issue
 * @property \Cake\I18n\Time $visa_expiry
 * @property string $passport
 * @property \Cake\I18n\Time $pass_issue
 * @property \Cake\I18n\Time $pass_expiry
 * @property bool $employed
 * @property \Cake\I18n\Time $emp_since
 * @property string $employer
 * @property string $acco_entitlement
 * @property string $legal_nominee
 * @property string $degree
 * @property string $specialization
 * @property float $spouse_emplid
 * @property string $leave_passage
 * @property string $leave_passage_entitle
 * @property int $emp_data_biographies_id
 * @property int $customer_id
 *
 * @property \App\Model\Entity\EmpDataBiography $emp_data_biography
 */
class Dependent extends Entity
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
