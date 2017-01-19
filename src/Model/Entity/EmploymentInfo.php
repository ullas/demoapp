<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmploymentInfo Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $first_date_worked
 * @property \Cake\I18n\Time $original_start_date
 * @property string $company
 * @property bool $is_primary
 * @property \Cake\I18n\Time $seniority_date
 * @property \Cake\I18n\Time $benefits_eligibility_start_date
 * @property string $prev_employeeid
 * @property bool $eligible_for_stock
 * @property \Cake\I18n\Time $service_date
 * @property float $initial_stock_grant
 * @property float $initial_option_grant
 * @property string $job_credit
 * @property string $notes
 * @property bool $is_contingent_worker
 * @property \Cake\I18n\Time $end_date
 * @property bool $ok_to_rehire
 * @property \Cake\I18n\Time $pay_roll_end_date
 * @property \Cake\I18n\Time $last_date_worked
 * @property bool $regret_termination
 * @property bool $eligible_for_sal_continuation
 * @property \Cake\I18n\Time $bonus_pay_expiration_date
 * @property \Cake\I18n\Time $stock_end_date
 * @property \Cake\I18n\Time $salary_end_date
 * @property \Cake\I18n\Time $benefits_end_date
 * @property int $customer_id
 * @property int $employee_id
 *
 * @property \App\Model\Entity\Customer $customer
 */
class EmploymentInfo extends Entity
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
