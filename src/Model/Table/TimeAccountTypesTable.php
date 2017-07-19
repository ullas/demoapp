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
 * TimeAccountTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PayComponents
 * @property \Cake\ORM\Association\BelongsTo $PayComponentGroups
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $TimeTypes
 *
 * @method \App\Model\Entity\TimeAccountType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeAccountType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeAccountType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeAccountType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeAccountType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeAccountType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeAccountType findOrCreate($search, callable $callback = null)
 */
class TimeAccountTypesTable extends Table
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

        $this->table('time_account_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('PayComponents', [
            'foreignKey' => 'pay_component_id'
        ]);
        $this->belongsTo('PayComponentGroups', [
            'foreignKey' => 'pay_component_group_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('TimeTypes', [
            'foreignKey' => 'time_account_type_id','dependent' => true
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
            ->allowEmpty('unit');

        $validator
            ->allowEmpty('perm_reccur');

        $validator
            ->allowEmpty('start_date');

        $validator
            ->decimal('account_booking_off')
            ->allowEmpty('account_booking_off');

        $validator
            ->allowEmpty('freq_period');

        $validator
            ->decimal('first_offset')
            ->allowEmpty('first_offset');

        $validator
            ->decimal('start_accrual')
            ->allowEmpty('start_accrual');

        $validator
            ->allowEmpty('accrual_base');

        $validator
            ->decimal('min_balance')
            ->allowEmpty('min_balance');

        $validator
            ->allowEmpty('posting_order');

        $validator
            ->decimal('time_to_accrual')
            ->allowEmpty('time_to_accrual');

        $validator
            ->boolean('proration_used')
            ->allowEmpty('proration_used');

        $validator
            ->boolean('rounding_used')
            ->allowEmpty('rounding_used');

        $validator
            ->allowEmpty('update_rule');

        $validator
            ->allowEmpty('payout_eligiblity');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('time_to_accrual_unit');

        $validator
            ->boolean('iscarryforward')
            ->allowEmpty('iscarryforward');

        $validator
            ->boolean('isleavewithoutpay')
            ->allowEmpty('isleavewithoutpay');

        $validator
            ->boolean('allownegativebalance')
            ->allowEmpty('allownegativebalance');

        $validator
            ->boolean('includeholidayswithinleaveasleaves')
            ->allowEmpty('includeholidayswithinleaveasleaves');

        $validator
            ->allowEmpty('valid_from');

        $validator
            ->allowEmpty('valid_from_day');

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
        $rules->add($rules->isUnique(['code']));
        $rules->add($rules->existsIn(['pay_component_id'], 'PayComponents'));
        $rules->add($rules->existsIn(['pay_component_group_id'], 'PayComponentGroups'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
