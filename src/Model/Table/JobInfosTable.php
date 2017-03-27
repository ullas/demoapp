<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Event\ArrayObject;
use Cake\Core\Configure;

/**
 * Jobinfos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\BelongsTo $Positions
 * @property \Cake\ORM\Association\BelongsTo $BusinessUnits
 * @property \Cake\ORM\Association\BelongsTo $Divisions
 * @property \Cake\ORM\Association\BelongsTo $CostCentres
 * @property \Cake\ORM\Association\BelongsTo $PayGrades
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $LegalEntities
 * @property \Cake\ORM\Association\BelongsTo $HolidayCalendars
 * @property \Cake\ORM\Association\BelongsTo $TimeTypeProfiles
 * @property \Cake\ORM\Association\BelongsTo $WorkSchedules
 * @property \Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\Jobinfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Jobinfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Jobinfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jobinfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jobinfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Jobinfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jobinfo findOrCreate($search, callable $callback = null)
 */
class JobinfosTable extends Table
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

        $this->table('jobinfos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'users_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
        ]);
        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id'
        ]);
        $this->belongsTo('BusinessUnits', [
            'foreignKey' => 'business_unit_id'
        ]);
        $this->belongsTo('Divisions', [
            'foreignKey' => 'division_id'
        ]);
        $this->belongsTo('CostCentres', [
            'foreignKey' => 'cost_centre_id'
        ]);
        $this->belongsTo('PayGrades', [
            'foreignKey' => 'pay_grade_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);
        $this->belongsTo('LegalEntities', [
            'foreignKey' => 'legal_entity_id'
        ]);
        $this->belongsTo('HolidayCalendars', [
            'foreignKey' => 'holiday_calendar_id'
        ]);
        $this->belongsTo('TimeTypeProfiles', [
            'foreignKey' => 'time_type_profile_id'
        ]);
        $this->belongsTo('WorkSchedules', [
            'foreignKey' => 'work_schedule_id'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
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
            ->date('position_entry_date')
            ->allowEmpty('position_entry_date');

        $validator
            ->allowEmpty('time_in_position');

        $validator
            ->allowEmpty('company');

        $validator
            ->allowEmpty('country_of_company');

        $validator
            ->allowEmpty('timezone');

        $validator
            ->allowEmpty('job_code');

        $validator
            ->allowEmpty('job_title');

        $validator
            ->allowEmpty('local_job_title');

        $validator
            ->allowEmpty('employee_class');

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
            ->allowEmpty('manager_id1');

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
            ->allowEmpty('manager_id2');

        $validator
            ->allowEmpty('manager_id3');

        $validator
            ->allowEmpty('manager_id4');

        $validator
            ->allowEmpty('manager_id5');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["leave_of_absence_return_date","hire_date","termination_date","leave_of_absence_start_date","position_entry_date","probation_period_end_date","expected_return_date","job_entry_date","company_entry_date","location_entry_date","department_entry_date","pay_scale_level_entry_date"] as $value) {
				if(isset($data[$value])){			
						if($data[$value]!=null && $data[$value]!='' && strpos($data[$value], '/') !== false){
						$data[$value] = str_replace('/', '-', $data[$value]);
						$data[$value]=date('Y/m/d', strtotime($data[$value]));
					}
				}
			}
		}
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
        $rules->add($rules->existsIn(['users_id'], 'Users'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['business_unit_id'], 'BusinessUnits'));
        $rules->add($rules->existsIn(['division_id'], 'Divisions'));
        $rules->add($rules->existsIn(['cost_centre_id'], 'CostCentres'));
        $rules->add($rules->existsIn(['pay_grade_id'], 'PayGrades'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['legal_entity_id'], 'LegalEntities'));
        $rules->add($rules->existsIn(['holiday_calendar_id'], 'HolidayCalendars'));
        $rules->add($rules->existsIn(['time_type_profile_id'], 'TimeTypeProfiles'));
        $rules->add($rules->existsIn(['work_schedule_id'], 'WorkSchedules'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
