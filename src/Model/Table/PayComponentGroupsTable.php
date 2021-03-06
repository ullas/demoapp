<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayComponentGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $PayComponents
 * @property \Cake\ORM\Association\HasMany $TimeAccountTypes
 *
 * @method \App\Model\Entity\PayComponentGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayComponentGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayComponentGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayComponentGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayComponentGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayComponentGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayComponentGroup findOrCreate($search, callable $callback = null)
 */
class PayComponentGroupsTable extends Table
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

        $this->table('pay_component_groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasOne('PayComponents', [
            'foreignKey' => 'pay_component_group_id'
        ]);
        $this->hasMany('TimeAccountTypes', [
            'foreignKey' => 'pay_component_group_id','dependent'=>true
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
            ->notEmpty('name')
			->add('name', [
        			'length' => ['rule' => ['minLength', 10],'last' => true,'message' => 'name need to be at least 10 characters long'] ]);

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('status');

        $validator
            // ->date('start_date')
            ->notEmpty('start_date');

        $validator
            // ->date('end_date')
            ->notEmpty('end_date');

        $validator
            ->allowEmpty('currency');

        $validator
            ->allowEmpty('show_on_comp_ui');

        $validator
            ->allowEmpty('use_for_comparatio_calc');

        $validator
            ->allowEmpty('use_for_range_penetration');

        $validator
            ->decimal('sort_order')
            ->allowEmpty('sort_order');

        $validator
            ->boolean('system_defined')
            ->allowEmpty('system_defined');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['external_code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
