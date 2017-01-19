<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Positions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $LegalEntities
 * @property \Cake\ORM\Association\BelongsTo $Departments
 * @property \Cake\ORM\Association\BelongsTo $CostCentres
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Divisions
 * @property \Cake\ORM\Association\BelongsTo $PayGrades
 * @property \Cake\ORM\Association\BelongsTo $PayRanges
 * @property \Cake\ORM\Association\BelongsTo $ParentPositions
 * @property \Cake\ORM\Association\BelongsTo $BusinessUnits
 * @property \Cake\ORM\Association\HasMany $Empdatabiographies
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $ChildPositions
 *
 * @method \App\Model\Entity\Position get($primaryKey, $options = [])
 * @method \App\Model\Entity\Position newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Position[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Position|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Position patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Position[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Position findOrCreate($search, callable $callback = null)
 */
class PositionsTable extends Table
{
	public function getExcludedPositions()
	{
		$conn = ConnectionManager::get('default');
		$arrayTemp1 = $conn->execute('select id,name from positions where id not in(select position_id from empdatabiographies where position_id >0)')->fetchAll('assoc');
		return $arrayTemp1; 
	}
	public function getIncludedPositions( $id = null)
	{
		$querystr='select id,name from positions where id not in(select position_id from empdatabiographies where position_id >0 AND employee_id!='.'40'.') ;';
		$conn = ConnectionManager::get('default');
		$arrayTemp1 = $conn->execute($querystr)->fetchAll('assoc');
		return $arrayTemp1; 
	}
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

$this->addBehavior('Tree');

        $this->table('positions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('LegalEntities', [
            'foreignKey' => 'legal_entity_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);
        $this->belongsTo('CostCentres', [
            'foreignKey' => 'cost_center_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('Divisions', [
            'foreignKey' => 'division_id'
        ]);
        $this->belongsTo('PayGrades', [
            'foreignKey' => 'pay_grade_id'
        ]);
        $this->belongsTo('PayRanges', [
            'foreignKey' => 'pay_range_id'
        ]);
        $this->belongsTo('ParentPositions', [
            'className' => 'Positions',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsTo('BusinessUnits', [
            'foreignKey' => 'business_unit_id'
        ]);
        $this->hasOne('Empdatabiographies', [
            'foreignKey' => 'position_id'
        ]);
        $this->hasOne('Jobinfos', [
            'foreignKey' => 'position_id'
        ]);
        // $this->hasMany('ChildPositions', [
            // 'className' => 'Positions',
            // 'foreignKey' => 'parent_id'
        // ]);
		$this->belongsTo('Parents', [
            'className' => 'Positions','foreignKey' => 'parent_id'
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
            ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->allowEmpty('positiontype');

        $validator
            ->allowEmpty('position_criticality');

        $validator
            ->boolean('position_controlled')
            ->allowEmpty('position_controlled');

        $validator
            ->boolean('multiple_incumbents_allowed')
            ->allowEmpty('multiple_incumbents_allowed');

        $validator
            ->allowEmpty('comment');

        $validator
            ->allowEmpty('incumbent');

        $validator
            ->allowEmpty('change_reason');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('job_title');

        $validator
            ->allowEmpty('job_code');

        $validator
            ->allowEmpty('job_level');

        $validator
            ->allowEmpty('employee_class');

        $validator
            ->allowEmpty('regular_temporary');

        $validator
            ->decimal('target_fte')
            ->allowEmpty('target_fte');

        $validator
            ->boolean('vacant')
            ->allowEmpty('vacant');

        $validator
            ->decimal('standard_hours')
            ->allowEmpty('standard_hours');

        $validator
            ->allowEmpty('created_by');

        $validator
            ->date('created_date')
            ->allowEmpty('created_date');

        $validator
            ->allowEmpty('last_modified_by');

        $validator
            ->date('last_modified_date')
            ->allowEmpty('last_modified_date');

        $validator
            ->allowEmpty('position_matrix_relationship');

        $validator
            ->allowEmpty('right_to_return');

        $validator
            ->requirePresence('position_code', 'create')
            ->notEmpty('position_code')
            ->add('position_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->boolean('effective_status')
            ->allowEmpty('effective_status');

        $validator
            ->allowEmpty('lft');

        $validator
            ->allowEmpty('rght');

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
        $rules->add($rules->isUnique(['position_code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['legal_entity_id'], 'LegalEntities'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));
        $rules->add($rules->existsIn(['cost_center_id'], 'CostCentres'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['division_id'], 'Divisions'));
        $rules->add($rules->existsIn(['pay_grade_id'], 'PayGrades'));
        $rules->add($rules->existsIn(['pay_range_id'], 'PayRanges'));
        $rules->add($rules->existsIn(['parent_id'], 'ParentPositions'));
        $rules->add($rules->existsIn(['business_unit_id'], 'BusinessUnits'));

        return $rules;
    }
}
