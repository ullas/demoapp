<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CalendarAssignments Model
 *
 * @method \App\Model\Entity\CalendarAssignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\CalendarAssignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CalendarAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment findOrCreate($search, callable $callback = null)
 */
class CalendarAssignmentsTable extends Table
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

        $this->table('calendar_assignments');
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
            ->allowEmpty('calendar');

        $validator
            ->allowEmpty('assignmentyear');

        $validator
            ->date('assignmentdate')
            ->allowEmpty('assignmentdate');

        $validator
            ->allowEmpty('User');

        $validator
            ->requirePresence('holiday_code', 'create')
            ->notEmpty('holiday_code')
            ->add('holiday_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['holiday_code']));

        return $rules;
    }
}
