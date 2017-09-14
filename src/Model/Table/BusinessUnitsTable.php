<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BusinessUnits Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $PayGroups
 * @property \Cake\ORM\Association\HasMany $PayrollArea
 * @property \Cake\ORM\Association\HasMany $Positions
 *
 * @method \App\Model\Entity\BusinessUnit get($primaryKey, $options = [])
 * @method \App\Model\Entity\BusinessUnit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BusinessUnit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BusinessUnit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BusinessUnit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessUnit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BusinessUnit findOrCreate($search, callable $callback = null)
 */
class BusinessUnitsTable extends Table
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

        $this->table('business_units');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'business_unit_id','dependent' => true
        ]);
        $this->hasMany('PayGroups', [
            'foreignKey' => 'business_unit_id','dependent' => true
        ]);
        $this->hasMany('PayrollArea', [
            'foreignKey' => 'business_unit_id','dependent' => true
        ]);
        $this->hasMany('Positions', [
            'foreignKey' => 'business_unit_id','dependent' => true
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
            ->allowEmpty('effective_status');

        $validator
            // ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            // ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('head_of_unit');

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
