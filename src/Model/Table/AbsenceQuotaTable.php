<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AbsenceQuota Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Employees
 * @property \Cake\ORM\Association\BelongsTo $TimeTypes
 * @property \Cake\ORM\Association\BelongsTo $Frequencies
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\AbsenceQuotum get($primaryKey, $options = [])
 * @method \App\Model\Entity\AbsenceQuotum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AbsenceQuotum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AbsenceQuotum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AbsenceQuotum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AbsenceQuotum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AbsenceQuotum findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AbsenceQuotaTable extends Table
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

        $this->table('absence_quota');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->belongsTo('TimeTypes', [
            'foreignKey' => 'time_type_id'
        ]);
        $this->belongsTo('Frequencies', [
            'foreignKey' => 'frequency_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
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
            ->allowEmpty('quota');

        $validator
            ->allowEmpty('balance');

        $validator
            // ->date('nxtexpiry')
            ->allowEmpty('nxtexpiry');

        $validator
            ->allowEmpty('expirylot');

        $validator
            ->boolean('batch')
            ->allowEmpty('batch');

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
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['time_type_id'], 'TimeTypes'));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
