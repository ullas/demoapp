<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TimeTypeProfileTimeTypes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TimeTypeProfiles
 * @property \Cake\ORM\Association\BelongsTo $TimeTypes
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\TimeTypeProfileTimeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeTypeProfileTimeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfileTimeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfileTimeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTypeProfileTimeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfileTimeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfileTimeType findOrCreate($search, callable $callback = null)
 */
class TimeTypeProfileTimeTypesTable extends Table
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

        $this->table('time_type_profile_time_types');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('TimeTypeProfiles', [
            'foreignKey' => 'time_type_profile_id'
        ]);
        $this->belongsTo('TimeTypes', [
            'foreignKey' => 'time_type_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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
        $rules->add($rules->existsIn(['time_type_profile_id'], 'TimeTypeProfiles'));
        $rules->add($rules->existsIn(['time_type_id'], 'TimeTypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
