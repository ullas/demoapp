<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PayRanges Model
 *
 * @property \Cake\ORM\Association\BelongsTo $LegalEntities
 * @property \Cake\ORM\Association\BelongsTo $PayGroups
 *
 * @method \App\Model\Entity\PayRange get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayRange newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayRange[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayRange|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayRange patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayRange[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayRange findOrCreate($search, callable $callback = null)
 */
class PayRangesTable extends Table
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

        $this->table('pay_ranges');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('LegalEntities', [
            'foreignKey' => 'legal_entity_id'
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
            ->allowEmpty('name');

        $validator
            ->allowEmpty('description');

        $validator
            ->allowEmpty('status');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('currency');

        $validator
            ->allowEmpty('frequency_code');

        $validator
            ->decimal('minimum_pay')
            ->allowEmpty('minimum_pay');

        $validator
            ->decimal('maximum_pay')
            ->allowEmpty('maximum_pay');

        $validator
            ->decimal('increment')
            ->allowEmpty('increment');

        $validator
            ->decimal('incr_percentage')
            ->allowEmpty('incr_percentage');

        $validator
            ->decimal('mid_point')
            ->allowEmpty('mid_point');

        $validator
            ->allowEmpty('geo_zone');

        $validator
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['legal_entity_id'], 'LegalEntities'));
        $rules->add($rules->existsIn(['pay_group_id'], 'PayGroups'));

        return $rules;
    }
}
