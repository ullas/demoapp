<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * WorkflowsHistories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflows
 * @property \Cake\ORM\Association\BelongsTo $Workflowrules
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $EmpDataBiographies
 *
 * @method \App\Model\Entity\WorkflowsHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\WorkflowsHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\WorkflowsHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\WorkflowsHistory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\WorkflowsHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\WorkflowsHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\WorkflowsHistory findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkflowsHistoriesTable extends Table
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

        $this->table('workflows_histories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Workflows', [
            'foreignKey' => 'workflow_id'
        ]);
        $this->belongsTo('Workflowrules', [
            'foreignKey' => 'workflowrule_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('EmpDataBiographies', [
            'foreignKey' => 'emp_data_biographies_id'
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
            ->integer('currentstep')
            ->allowEmpty('currentstep');

        $validator
            ->allowEmpty('lastaction');

        $validator
            ->dateTime('updatetime')
            ->allowEmpty('updatetime');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        $validator
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['workflow_id'], 'Workflows'));
        $rules->add($rules->existsIn(['workflowrule_id'], 'Workflowrules'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['emp_data_biographies_id'], 'EmpDataBiographies'));

        return $rules;
    }
}
