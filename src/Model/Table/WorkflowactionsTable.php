<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workflowactions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Workflowrules
 * @property \Cake\ORM\Association\BelongsTo $Positions
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\Workflowaction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workflowaction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workflowaction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workflowaction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workflowaction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workflowaction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workflowaction findOrCreate($search, callable $callback = null)
 */
class WorkflowactionsTable extends Table
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

        $this->table('workflowactions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Workflowrules', [
            'foreignKey' => 'workflowrule_id'
        ]);
        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('displayname');

        $validator
            ->integer('stepid')
            ->allowEmpty('stepid');

        $validator
            ->integer('nextactionid')
            ->allowEmpty('nextactionid');

        $validator
            ->integer('onfailureactionid')
            ->allowEmpty('onfailureactionid');

        $validator
            ->allowEmpty('failuretime');

        $validator
            ->boolean('failureskip')
            ->allowEmpty('failureskip');

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
        $rules->add($rules->existsIn(['position_id'], 'Positions'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
