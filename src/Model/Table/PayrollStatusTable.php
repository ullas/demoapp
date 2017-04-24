<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayrollStatus Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $PayGroups
 *
 * @method \App\Model\Entity\PayrollStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollStatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayrollStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollStatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollStatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollStatus findOrCreate($search, callable $callback = null)
 */
class PayrollStatusTable extends Table
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

        $this->table('payroll_status');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('PayGroups', [
            'foreignKey' => 'pay_group_id'
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
            ->allowEmpty('code');

        $validator
            ->allowEmpty('current_period');

        $validator
            ->date('earliest_retro_date')
            ->allowEmpty('earliest_retro_date');

        $validator
            ->boolean('payroll_lock')
            ->allowEmpty('payroll_lock');

        $validator
            ->date('lock_date')
            ->allowEmpty('lock_date');

        $validator
            ->time('lock_time')
            ->allowEmpty('lock_time');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['pay_group_id'], 'PayGroups'));

        return $rules;
    }
}
