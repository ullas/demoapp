<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PayGroup Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property bool $effective_status
 * @property \Cake\I18n\Time $effective_start_date
 * @property \Cake\I18n\Time $effective_end_date
 * @property \Cake\I18n\Time $earliest_change_date
 * @property string $primary_contactid
 * @property string $primary_contact_email
 * @property string $primary_contact_name
 * @property string $secondary_contactid
 * @property string $secondary_contact_email
 * @property string $secondary_contact_name
 * @property float $weeks_in_pay_period
 * @property string $data_delimiter
 * @property string $decimal_point
 * @property float $lag
 * @property string $external_code
 * @property int $customer_id
 * @property int $frequency_id
 * @property int $legal_entity_id
 * @property int $business_unit_id
 * @property int $division_id
 * @property int $location_id
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Frequency $frequency
 * @property \App\Model\Entity\PayRange[] $pay_ranges
 */
class PayGroup extends Entity
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
