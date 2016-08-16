<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Positions Model
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

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('positions');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('external_name');

        $validator
            ->allowEmpty('effective_status');

        $validator
            ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->allowEmpty('type');

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
            ->allowEmpty('pay_grade');

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
            ->allowEmpty('company');

        $validator
            ->allowEmpty('business_unit');

        $validator
            ->allowEmpty('division');

        $validator
            ->allowEmpty('department');

        $validator
            ->allowEmpty('location');

        $validator
            ->allowEmpty('cost_center');

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
            ->allowEmpty('parent_position');

        $validator
            ->allowEmpty('pay_range');

        $validator
            ->allowEmpty('position_matrix_relationship');

        $validator
            ->allowEmpty('right_to_return');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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

        return $rules;
    }
}
