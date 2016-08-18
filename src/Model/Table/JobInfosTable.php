<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobInfos Model
 *
 * @method \App\Model\Entity\JobInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobInfo findOrCreate($search, callable $callback = null)
 */
class JobInfosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('job_infos');
        $this->displayField('id');
        $this->primaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('position');

        $validator
            ->date('position_entry_date')
            ->allowEmpty('position_entry_date');

        $validator
            ->allowEmpty('time_in_position');

        $validator
            ->allowEmpty('company');

        $validator
            ->allowEmpty('country_of_company');

        $validator
            ->allowEmpty('business_unit');

        $validator
            ->allowEmpty('division');

        $validator
            ->allowEmpty('department');

        $validator
            ->allowEmpty('location');

        $validator
            ->allowEmpty('timezone');

        $validator
            ->allowEmpty('cost_center');

        $validator
            ->allowEmpty('job_code');

        $validator
            ->allowEmpty('job_title');

        $validator
            ->allowEmpty('local_job_title');

        $validator
            ->allowEmpty('employee_class');

        $validator
            ->allowEmpty('pay_grade');

        $validator
            ->allowEmpty('regular_temp');

        $validator
            ->decimal('standard_hours')
            ->allowEmpty('standard_hours');

        $validator
            ->decimal('working_days_per_week')
            ->allowEmpty('working_days_per_week');

        $validator
            ->allowEmpty('work_period');

        $validator
            ->decimal('fte')
            ->allowEmpty('fte');

        $validator
            ->boolean('is_full_time_employee')
            ->allowEmpty('is_full_time_employee');

        $validator
            ->boolean('is_shift_employee')
            ->allowEmpty('is_shift_employee');

        $validator
            ->allowEmpty('shift_code');

        $validator
            ->decimal('shift_rate')
            ->allowEmpty('shift_rate');

        $validator
            ->decimal('shift_factor')
            ->allowEmpty('shift_factor');

        $validator
            ->allowEmpty('employee_type');

        $validator
            ->allowEmpty('manager_category');

        $validator
            ->boolean('is_cross_border_worker')
            ->allowEmpty('is_cross_border_worker');

        $validator
            ->boolean('is_competition_clause_active')
            ->allowEmpty('is_competition_clause_active');

        $validator
            ->date('probation_period_end_date')
            ->allowEmpty('probation_period_end_date');

        $validator
            ->allowEmpty('notes');

        $validator
            ->allowEmpty('attachmentid');

        $validator
            ->allowEmpty('custom_string1');

        $validator
            ->allowEmpty('eeo_class');

        $validator
            ->allowEmpty('change_reason_external');

        $validator
            ->allowEmpty('radford_jobcode');

        $validator
            ->boolean('is_primary')
            ->allowEmpty('is_primary');

        $validator
            ->allowEmpty('trackid');

        $validator
            ->allowEmpty('employment_type');

        $validator
            ->boolean('is_eligible_for_car')
            ->allowEmpty('is_eligible_for_car');

        $validator
            ->boolean('is_eligible_for_benefit')
            ->allowEmpty('is_eligible_for_benefit');

        $validator
            ->allowEmpty('international_org_code');

        $validator
            ->boolean('is_eligible_for_financial_plan')
            ->allowEmpty('is_eligible_for_financial_plan');

        $validator
            ->decimal('amount_of_financial_plan')
            ->allowEmpty('amount_of_financial_plan');

        $validator
            ->allowEmpty('supervisor_level');

        $validator
            ->decimal('ern_number')
            ->allowEmpty('ern_number');

        $validator
            ->allowEmpty('sick_pay_supplement');

        $validator
            ->allowEmpty('company_leaving_for');

        $validator
            ->boolean('is_side_line_job_allowed')
            ->allowEmpty('is_side_line_job_allowed');

        $validator
            ->allowEmpty('holiday_calendar_code');

        $validator
            ->allowEmpty('work_schedule_code');

        $validator
            ->allowEmpty('time_type_profile_code');

        $validator
            ->allowEmpty('time_recording_profile_code');

        $validator
            ->allowEmpty('time_recording_admissibility_code');

        $validator
            ->allowEmpty('time_recording_variant');

        $validator
            ->allowEmpty('default_overtime_compensation_variant');

        $validator
            ->allowEmpty('event');

        $validator
            ->allowEmpty('event_reason');

        $validator
            ->allowEmpty('notice_period');

        $validator
            ->date('expected_return_date')
            ->allowEmpty('expected_return_date');

        $validator
            ->allowEmpty('pay_scale_area');

        $validator
            ->allowEmpty('pay_scale_type');

        $validator
            ->allowEmpty('pay_scale_group');

        $validator
            ->allowEmpty('pay_scale_level');

        $validator
            ->date('job_entry_date')
            ->allowEmpty('job_entry_date');

        $validator
            ->allowEmpty('time_in_job');

        $validator
            ->date('company_entry_date')
            ->allowEmpty('company_entry_date');

        $validator
            ->allowEmpty('time_in_company');

        $validator
            ->date('location_entry_date')
            ->allowEmpty('location_entry_date');

        $validator
            ->allowEmpty('time_in_location');

        $validator
            ->date('department_entry_date')
            ->allowEmpty('department_entry_date');

        $validator
            ->allowEmpty('time_in_department');

        $validator
            ->date('pay_scale_level_entry_date')
            ->allowEmpty('pay_scale_level_entry_date');

        $validator
            ->allowEmpty('time_in_pay_scale_level');

        $validator
            ->date('hire_date')
            ->allowEmpty('hire_date');

        $validator
            ->date('termination_date')
            ->allowEmpty('termination_date');

        $validator
            ->date('leave_of_absence_start_date')
            ->allowEmpty('leave_of_absence_start_date');

        $validator
            ->date('leave_of_absence_return_date')
            ->allowEmpty('leave_of_absence_return_date');

        $validator
            ->requirePresence('person_id_external', 'create')
            ->notEmpty('person_id_external')
            ->add('person_id_external', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('managerid');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['person_id_external']));

        return $rules;
    }
}
