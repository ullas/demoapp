<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JobClasses Model
 *
 * @method \App\Model\Entity\JobClass get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobClass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobClass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobClass|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobClass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobClass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobClass findOrCreate($search, callable $callback = null)
 */
class JobClassesTable extends Table
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

        $this->table('job_classes');
        $this->displayField('name');
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->boolean('effective_status')
            ->allowEmpty('effective_status');

        $validator
            ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->allowEmpty('worker_comp_code');

        $validator
            ->allowEmpty('default_job_level');

        $validator
            ->decimal('standard_weekly_hours')
            ->allowEmpty('standard_weekly_hours');

        $validator
            ->allowEmpty('regular_temporary');

        $validator
            ->allowEmpty('default_employee_class');

        $validator
            ->boolean('full_time_employee')
            ->allowEmpty('full_time_employee');

        $validator
            ->allowEmpty('default_supervisor_level');

        $validator
            ->allowEmpty('pay_grade');

        $validator
            ->allowEmpty('job_function');

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

        return $rules;
    }
}
