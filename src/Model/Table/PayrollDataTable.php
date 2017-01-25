<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayrollData Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PayComponents
 *
 * @method \App\Model\Entity\PayrollData get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollData newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayrollData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollData|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollData[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollData findOrCreate($search, callable $callback = null)
 */
class PayrollDataTable extends Table
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

        $this->table('payroll_data');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PayComponents', [
            'foreignKey' => 'pay_component_id'
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
            ->allowEmpty('employee_code');

        $validator
            ->allowEmpty('pay_component_value');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

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

        return $rules;
    }
}
