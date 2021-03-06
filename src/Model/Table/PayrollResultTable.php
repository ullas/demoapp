<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayrollResult Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PayComponents
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $PayGroups
 * @property \Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\PayrollResult get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollResult newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayrollResult[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollResult|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollResult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollResult[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollResult findOrCreate($search, callable $callback = null)
 */
class PayrollResultTable extends Table
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

        $this->table('payroll_result');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PayComponents', [
            'foreignKey' => 'pay_component_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('PayGroups', [
            'foreignKey' => 'pay_group_id'
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
            ->allowEmpty('period');

        $validator
            ->numeric('pay_component_value')
            ->allowEmpty('pay_component_value');

        $validator
            ->numeric('paid_salary')
            ->allowEmpty('paid_salary');

        $validator
            // ->date('run_date')
            ->allowEmpty('run_date');

        $validator
            ->boolean('correctionrun')
            ->allowEmpty('correctionrun');

        $validator
            // ->dateTime('run_time')
            ->allowEmpty('run_time');

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
        $rules->add($rules->existsIn(['pay_component_id'], 'PayComponents'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['pay_group_id'], 'PayGroups'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
