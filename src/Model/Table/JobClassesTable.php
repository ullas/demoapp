<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobclasses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PayGrades
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 * @property \Cake\ORM\Association\BelongsTo $Jobfunctions
 * @property \Cake\ORM\Association\BelongsTo $Joblevels
 * @property \Cake\ORM\Association\BelongsTo $SupervisorLevels
 * @property \Cake\ORM\Association\BelongsTo $EmployeeClasses
 *
 * @method \App\Model\Entity\Jobclass get($primaryKey, $options = [])
 * @method \App\Model\Entity\Jobclass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Jobclass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jobclass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jobclass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Jobclass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jobclass findOrCreate($search, callable $callback = null)
 */
class JobclassesTable extends Table
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

        $this->table('jobclasses');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('PayGrades', [
            'foreignKey' => 'pay_grade_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
        ]);
        $this->belongsTo('Jobfunctions', [
            'foreignKey' => 'job_function_id'
        ]);
        $this->belongsTo('Joblevels', [
            'foreignKey' => 'joblevel_id'
        ]);
        $this->belongsTo('SupervisorLevels', [
            'foreignKey' => 'supervisor_level_id'
        ]);
        $this->belongsTo('EmployeeClasses', [
            'foreignKey' => 'employee_class_id'
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
            ->allowEmpty('worker_comp_code');

        $validator
            ->decimal('standard_weekly_hours')
            ->allowEmpty('standard_weekly_hours');

        $validator
            ->allowEmpty('regular_temporary');

        $validator
            ->boolean('full_time_employee')
            ->allowEmpty('full_time_employee');

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
        $rules->add($rules->existsIn(['pay_grade_id'], 'PayGrades'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));
        $rules->add($rules->existsIn(['job_function_id'], 'Jobfunctions'));
        $rules->add($rules->existsIn(['joblevel_id'], 'Joblevels'));
        $rules->add($rules->existsIn(['supervisor_level_id'], 'SupervisorLevels'));
        $rules->add($rules->existsIn(['employee_class_id'], 'EmployeeClasses'));

        return $rules;
    }
}
