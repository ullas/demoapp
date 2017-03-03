<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workflows Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflowrules
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $EmpDataBiographies
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfiles
 *
 * @method \App\Model\Entity\Workflow get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workflow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workflow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workflow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workflow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workflow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workflow findOrCreate($search, callable $callback = null)
 */
class WorkflowsTable extends Table
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

        $this->table('workflows');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Workflowrules', [
            'foreignKey' => 'workflowrule_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('EmpDataBiographies', [
            'foreignKey' => 'emp_data_biographies_id'
        ]);
        $this->hasMany('TimeTypeProfiles', [
            'foreignKey' => 'workflow_id'
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
            ->integer('currentstep')
            ->allowEmpty('currentstep');

        $validator
            ->allowEmpty('lastaction');

        $validator
            ->dateTime('updatetime')
            ->allowEmpty('updatetime');

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
        $rules->add($rules->existsIn(['workflowrule_id'], 'Workflowrules'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['emp_data_biographies_id'], 'EmpDataBiographies'));

        return $rules;
    }
}
