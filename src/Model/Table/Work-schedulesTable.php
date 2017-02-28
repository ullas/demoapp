<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Work-schedules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\Work-schedule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Work-schedule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Work-schedule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Work-schedule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Work-schedule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Work-schedule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Work-schedule findOrCreate($search, callable $callback = null)
 */
class Work-schedulesTable extends Table
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

        $this->table('work_schedules');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
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
            ->allowEmpty('ws_name');

        $validator
            ->boolean('flex_request_allowed')
            ->allowEmpty('flex_request_allowed');

        $validator
            ->allowEmpty('country');

        $validator
            ->decimal('hours_day')
            ->allowEmpty('hours_day');

        $validator
            ->decimal('hours_week')
            ->allowEmpty('hours_week');

        $validator
            ->decimal('hours_month')
            ->allowEmpty('hours_month');

        $validator
            ->decimal('hours_year')
            ->allowEmpty('hours_year');

        $validator
            ->decimal('days_week')
            ->allowEmpty('days_week');

        $validator
            ->decimal('ws_days')
            ->allowEmpty('ws_days');

        $validator
            ->allowEmpty('model');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->decimal('day1_planhours')
            ->allowEmpty('day1_planhours');

        $validator
            ->decimal('day2_planhours')
            ->allowEmpty('day2_planhours');

        $validator
            ->decimal('day3_planhours')
            ->allowEmpty('day3_planhours');

        $validator
            ->decimal('day4_planhours')
            ->allowEmpty('day4_planhours');

        $validator
            ->decimal('day5_planhours')
            ->allowEmpty('day5_planhours');

        $validator
            ->decimal('day7_planhours')
            ->allowEmpty('day7_planhours');

        $validator
            ->decimal('day_n_hours')
            ->allowEmpty('day_n_hours');

        $validator
            ->allowEmpty('time_rec_variant_1');

        $validator
            ->allowEmpty('category');

        $validator
            ->decimal('day')
            ->allowEmpty('day');

        $validator
            ->time('start_time')
            ->allowEmpty('start_time');

        $validator
            ->time('end_time')
            ->allowEmpty('end_time');

        $validator
            ->allowEmpty('shift_class');

        $validator
            ->decimal('planned_hours')
            ->allowEmpty('planned_hours');

        $validator
            ->time('planned_hours_minutes')
            ->allowEmpty('planned_hours_minutes');

        $validator
            ->allowEmpty('day_model');

        $validator
            ->allowEmpty('time_rec_variant_2');

        $validator
            ->allowEmpty('search_field');

        $validator
            ->date('starting_date')
            ->allowEmpty('starting_date');

        $validator
            ->allowEmpty('period_model');

        $validator
            ->allowEmpty('time_rec_variant_3');

        $validator
            ->requirePresence('ws_code', 'create')
            ->notEmpty('ws_code')
            ->add('ws_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['ws_code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
