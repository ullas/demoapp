<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayrollRecord Model
 *
 * @property \Cake\ORM\Association\BelongsTo $PayrollArea
 *
 * @method \App\Model\Entity\PayrollRecord get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollRecord newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayrollRecord[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollRecord|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollRecord patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollRecord[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollRecord findOrCreate($search, callable $callback = null)
 */
class PayrollRecordTable extends Table
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

        $this->table('payroll_record');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('PayrollArea', [
            'foreignKey' => 'payroll_area_id'
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
            ->allowEmpty('period');

        $validator
            ->date('run_date')
            ->allowEmpty('run_date');

        $validator
            ->time('run_time')
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
        $rules->add($rules->existsIn(['payroll_area_id'], 'PayrollArea'));

        return $rules;
    }
}
