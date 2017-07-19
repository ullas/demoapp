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
 * EventReasons Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 *
 * @method \App\Model\Entity\EventReason get($primaryKey, $options = [])
 * @method \App\Model\Entity\EventReason newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EventReason[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EventReason|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EventReason patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EventReason[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EventReason findOrCreate($search, callable $callback = null)
 */
class EventReasonsTable extends Table
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

        $this->table('event_reasons');
        $this->displayField('name');
        $this->primaryKey('id');

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
            ->allowEmpty('description');

        $validator
            ->boolean('status')
            ->allowEmpty('status');

        $validator
            ->allowEmpty('start_date');

        $validator
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('event');

        $validator
            ->allowEmpty('empl_status');

        $validator
            ->allowEmpty('implicit_position_action');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['external_code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
