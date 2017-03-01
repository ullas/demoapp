<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\Event\ArrayObject;
use Cake\Core\Configure;
/**
 * Workflowrules Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Workflowactions
 * @property \Cake\ORM\Association\HasMany $Workflows
 *
 * @method \App\Model\Entity\Workflowrule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workflowrule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workflowrule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workflowrule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workflowrule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workflowrule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workflowrule findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class WorkflowrulesTable extends Table
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

        $this->table('workflowrules');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Workflowactions', [
            'foreignKey' => 'workflowrule_id'
        ]);
        $this->hasMany('Workflows', [
            'foreignKey' => 'workflowrule_id'
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
            ->allowEmpty('description');

        $validator
            ->allowEmpty('created_by');

        $validator
            ->allowEmpty('modified_by');

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

        return $rules;
    }
}
