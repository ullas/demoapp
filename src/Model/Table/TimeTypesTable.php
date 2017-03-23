<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $TimeAccountTypes
 * @property \Cake\ORM\Association\BelongsTo $Workflowrules
 * @property \Cake\ORM\Association\BelongsTo $TimeTypeProfiles
 * @property \Cake\ORM\Association\HasMany $EmployeeAbsencerecords
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfileTimeTypes
 *
 * @method \App\Model\Entity\TimeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeType findOrCreate($search, callable $callback = null)
 */
class TimeTypesTable extends Table
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

        $this->table('time_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('TimeAccountTypes', [
            'foreignKey' => 'time_account_type_id'
        ]);
        $this->belongsTo('Workflowrules', [
            'foreignKey' => 'workflowrule_id'
        ]);
        $this->belongsTo('TimeTypeProfiles', [
            'foreignKey' => 'time_type_profile_id'
        ]);
        $this->hasMany('EmployeeAbsencerecords', [
            'foreignKey' => 'time_type_id'
        ]);
        $this->hasMany('TimeTypeProfileTimeTypes', [
            'foreignKey' => 'time_type_id'
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
            ->allowEmpty('country');

        $validator
            ->allowEmpty('classification');

        $validator
            ->decimal('unit')
            ->allowEmpty('unit');

        $validator
            ->decimal('perm_fractions_days')
            ->allowEmpty('perm_fractions_days');

        $validator
            ->decimal('perm_fractions_hours')
            ->allowEmpty('perm_fractions_hours');

        $validator
            ->allowEmpty('calc_base');

        $validator
            ->boolean('flex_req_allow')
            ->allowEmpty('flex_req_allow');

        $validator
            ->allowEmpty('take_rule');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['name']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['time_account_type_id'], 'TimeAccountTypes'));
        $rules->add($rules->existsIn(['workflowrule_id'], 'Workflowrules'));
        $rules->add($rules->existsIn(['time_type_profile_id'], 'TimeTypeProfiles'));

        return $rules;
    }
}
