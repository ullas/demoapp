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
 * EmploymentInfos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Employees
 * @property \Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\EmploymentInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmploymentInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmploymentInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmploymentInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmploymentInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmploymentInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmploymentInfo findOrCreate($search, callable $callback = null)
 */
class EmploymentInfosTable extends Table
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

        $this->table('employmentinfos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'employment_info_id'
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
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('first_date_worked')
            ->allowEmpty('first_date_worked');

        $validator
            ->date('original_start_date')
            ->allowEmpty('original_start_date');

        $validator
            ->allowEmpty('company');

        $validator
            ->boolean('is_primary')
            ->allowEmpty('is_primary');

        $validator
            ->date('seniority_date')
            ->allowEmpty('seniority_date');

        $validator
            ->date('benefits_eligibility_start_date')
            ->allowEmpty('benefits_eligibility_start_date');

        $validator
            ->allowEmpty('prev_employeeid');

        $validator
            ->boolean('eligible_for_stock')
            ->allowEmpty('eligible_for_stock');

        $validator
            ->date('service_date')
            ->allowEmpty('service_date');

        $validator
            ->decimal('initial_stock_grant')
            ->allowEmpty('initial_stock_grant');

        $validator
            ->decimal('initial_option_grant')
            ->allowEmpty('initial_option_grant');

        $validator
            ->allowEmpty('job_credit');

        $validator
            ->allowEmpty('notes');

        $validator
            ->boolean('is_contingent_worker')
            ->allowEmpty('is_contingent_worker');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->boolean('ok_to_rehire')
            ->allowEmpty('ok_to_rehire');

        $validator
            ->date('pay_roll_end_date')
            ->allowEmpty('pay_roll_end_date');

        $validator
            ->date('last_date_worked')
            ->allowEmpty('last_date_worked');

        $validator
            ->boolean('regret_termination')
            ->allowEmpty('regret_termination');

        $validator
            ->boolean('eligible_for_sal_continuation')
            ->allowEmpty('eligible_for_sal_continuation');

        $validator
            ->date('bonus_pay_expiration_date')
            ->allowEmpty('bonus_pay_expiration_date');

        $validator
            ->date('stock_end_date')
            ->allowEmpty('stock_end_date');

        $validator
            ->date('salary_end_date')
            ->allowEmpty('salary_end_date');

        $validator
            ->date('benefits_end_date')
            ->allowEmpty('benefits_end_date');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["stock_end_date","salary_end_date","benefits_end_date","start_date","first_date_worked","original_start_date","seniority_date","benefits_eligibility_start_date","service_date","end_date","pay_roll_end_date","last_date_worked","bonus_pay_expiration_date"] as $value) {		
				if($data[$value]!=null && strpos($data[$value], '/') !== false){
					$data[$value] = str_replace('/', '-', $data[$value]);
					$data[$value]=date('Y/m/d', strtotime($data[$value]));
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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
