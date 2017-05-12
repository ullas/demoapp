<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OfficeAsset Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property int $employee_id
 * @property string $location
 * @property string $assettype
 * @property string $assetnumber
 * @property string $assetdescription
 * @property \Cake\I18n\Time $issuedate
 * @property \Cake\I18n\Time $todate
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Employee $employee
 */
class OfficeAsset extends Entity
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
