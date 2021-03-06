<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Departments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CostCentres
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $ParentDepartments
 * @property \Cake\ORM\Association\HasMany $ChildDepartments
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $Positions
 *
 * @method \App\Model\Entity\Department get($primaryKey, $options = [])
 * @method \App\Model\Entity\Department newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Department[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Department|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Department patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Department[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Department findOrCreate($search, callable $callback = null)
 */
class DepartmentsTable extends Table
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

        $this->table('departments');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('CostCentres', [
            'foreignKey' => 'cost_center_id','dependent' => true
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->belongsTo('ParentDepartments', [
            'className' => 'Departments',
            'foreignKey' => 'parent_id'
        ]);
        // $this->hasMany('ChildDepartments', [
            // 'className' => 'Departments',
            // 'foreignKey' => 'parent_id'
        // ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'department_id','dependent' => true
        ]);
        $this->hasMany('Positions', [
            'foreignKey' => 'department_id','dependent' => true
        ]);
		
		$this->belongsTo('Parents', [
            'className' => 'Departments','foreignKey' => 'parent_id'
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
            // ->boolean('effective_status')
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
        $rules->add($rules->existsIn(['cost_center_id'], 'CostCentres'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentDepartments'));

        return $rules;
    }
}
