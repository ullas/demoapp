<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $profilepicture
 * @property int $visible
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Address $address
 * @property \App\Model\Entity\ContactInfo $contact_info
 * @property \App\Model\Entity\EducationalQualification $educational_qualification
 * @property \App\Model\Entity\Empdatabiography $empdatabiography
 * @property \App\Model\Entity\EmpDataPersonal $empdatapersonal
 * @property \App\Model\Entity\EmploymentInfo $employmentinfo
 * @property \App\Model\Entity\Experience $experience
 * @property \App\Model\Entity\Identity $identity
 * @property \App\Model\Entity\Jobinfo $jobinfo
 * @property \App\Model\Entity\OfficeAsset $office_asset
 * @property \App\Model\Entity\Skill $skill
 * @property \App\Model\Entity\User $user
 */
class Employee extends Entity
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
