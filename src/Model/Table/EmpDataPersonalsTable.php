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
 * EmpDataPersonals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Employees
 * @property \Cake\ORM\Association\HasMany $Employees
 *
 * @method \App\Model\Entity\EmpDataPersonal get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpDataPersonal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpDataPersonal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal findOrCreate($search, callable $callback = null)
 */
class EmpDataPersonalsTable extends Table
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

        $this->table('empdatapersonals');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'emp_data_personal_id'
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
            ->allowEmpty('salutation');

        $validator
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->allowEmpty('initials');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->allowEmpty('first_name_alt1');

        $validator
            ->allowEmpty('middle_name_alt1');

        $validator
            ->allowEmpty('last_name_alt1');

        $validator
            ->allowEmpty('first_name_alt2');

        $validator
            ->allowEmpty('middle_name_alt2');

        $validator
            ->allowEmpty('last_name_alt2');

        $validator
            ->allowEmpty('display_name');

        $validator
            ->allowEmpty('formal_name');

        $validator
            ->allowEmpty('birth_name');

        $validator
            ->allowEmpty('birth_name_alt1');

        $validator
            ->allowEmpty('birth_name_alt2');

        $validator
            ->allowEmpty('preferred_name');

        $validator
            ->allowEmpty('display_name_alt1');

        $validator
            ->allowEmpty('display_name_alt2');

        $validator
            ->allowEmpty('formal_name_alt1');

        $validator
            ->allowEmpty('formal_name_alt2');

        $validator
            ->allowEmpty('name_format');

        $validator
            ->boolean('is_overridden')
            ->allowEmpty('is_overridden');

        $validator
            ->allowEmpty('nationality');

        $validator
            ->allowEmpty('second_nationality');

        $validator
            ->allowEmpty('third_nationality');

        $validator
            ->allowEmpty('wps_code');

        $validator
            ->allowEmpty('uniqueid');

        $validator
            ->allowEmpty('prof_legal');

        $validator
            ->allowEmpty('exclude_legal');

        $validator
            ->date('nationality_date')
            ->allowEmpty('nationality_date');

        $validator
            ->allowEmpty('home_airport');

        $validator
            ->allowEmpty('religion');

        $validator
            ->decimal('number_children')
            ->allowEmpty('number_children');

        $validator
            ->date('disability_date')
            ->allowEmpty('disability_date');

        $validator
            ->allowEmpty('disable_group');

        $validator
            ->decimal('disable_degree')
            ->allowEmpty('disable_degree');

        $validator
            ->allowEmpty('disable_type');

        $validator
            ->allowEmpty('disable_authority');

        $validator
            ->allowEmpty('disable_ref');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["nationality_date","disability_date"] as $value) {		
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
        $rules->add($rules->isUnique(['person_id_external']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
