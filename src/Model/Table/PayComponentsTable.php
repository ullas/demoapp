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
 * PayComponents Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Frequencies
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $PayComponentGroups
 * @property \Cake\ORM\Association\HasMany $PayrollData
 * @property \Cake\ORM\Association\HasMany $PayrollResult
 * @property \Cake\ORM\Association\HasMany $TimeAccountTypes
 *
 * @method \App\Model\Entity\PayComponent get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayComponent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayComponent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayComponent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayComponent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayComponent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayComponent findOrCreate($search, callable $callback = null)
 */
class PayComponentsTable extends Table
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

        $this->table('pay_components');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Frequencies', [
            'foreignKey' => 'frequency_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('PayComponentGroups', [
            'foreignKey' => 'pay_component_group_id'
        ]);
        $this->hasMany('PayrollData', [
            'foreignKey' => 'pay_component_id','dependent' => true
        ]);
        $this->hasMany('PayrollResult', [
            'foreignKey' => 'pay_component_id','dependent' => true
        ]);
        $this->hasMany('TimeAccountTypes', [
            'foreignKey' => 'pay_component_id','dependent' => true
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('status');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('pay_component_type');

        $validator
            ->allowEmpty('is_earning');

        $validator
            ->allowEmpty('currency');

        $validator
            ->numeric('pay_component_value')
            ->allowEmpty('pay_component_value');

        $validator
            ->boolean('recurring')
            ->allowEmpty('recurring');

        $validator
            ->allowEmpty('tax_treatment');

        $validator
            ->allowEmpty('can_override');

        $validator
            ->allowEmpty('self_service_description');

        $validator
            ->allowEmpty('display_on_self_service');

        $validator
            ->allowEmpty('used_for_comp_planning');

        $validator
            ->boolean('target')
            ->allowEmpty('target');

        $validator
            ->boolean('is_relevant_for_advance_payment')
            ->allowEmpty('is_relevant_for_advance_payment');

        $validator
            ->decimal('max_fraction_digits')
            ->allowEmpty('max_fraction_digits');

        $validator
            ->allowEmpty('unit_of_measure');

        $validator
            ->decimal('rate')
            ->allowEmpty('rate');

        $validator
            ->decimal('number')
            ->allowEmpty('number');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('base_pay_component_group');

        $validator
            ->allowEmpty('base_pay_component_type');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["start_date","end_date"] as $value) {		
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
        $rules->add($rules->isUnique(['external_code']));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['pay_component_group_id'], 'PayComponentGroups'));

        return $rules;
    }
}
