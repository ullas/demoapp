<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dependents Model
 *
 * @method \App\Model\Entity\Dependent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dependent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dependent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dependent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dependent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dependent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dependent findOrCreate($search, callable $callback = null)
 */
class DependentsTable extends Table
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

        $this->table('dependents');
        $this->displayField('id');
        $this->primaryKey('id');
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
            ->allowEmpty('relationship_type');

        $validator
            ->boolean('is_accompanying_dependent')
            ->allowEmpty('is_accompanying_dependent');

        $validator
            ->boolean('is_beneficiary')
            ->allowEmpty('is_beneficiary');

        $validator
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->allowEmpty('salutation');

        $validator
            ->date('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->allowEmpty('country_of_birth');

        $validator
            ->allowEmpty('country');

        $validator
            ->allowEmpty('card_type');

        $validator
            ->allowEmpty('nationalid');

        $validator
            ->boolean('is_add_same_as_employee')
            ->allowEmpty('is_add_same_as_employee');

        $validator
            ->allowEmpty('address_number');

        $validator
            ->allowEmpty('visa');

        $validator
            ->date('visa_issue')
            ->allowEmpty('visa_issue');

        $validator
            ->date('visa_expiry')
            ->allowEmpty('visa_expiry');

        $validator
            ->allowEmpty('passport');

        $validator
            ->date('pass_issue')
            ->allowEmpty('pass_issue');

        $validator
            ->date('pass_expiry')
            ->allowEmpty('pass_expiry');

        $validator
            ->boolean('employed')
            ->allowEmpty('employed');

        $validator
            ->date('emp_since')
            ->allowEmpty('emp_since');

        $validator
            ->allowEmpty('employer');

        $validator
            ->allowEmpty('acco_entitlement');

        $validator
            ->allowEmpty('legal_nominee');

        $validator
            ->allowEmpty('degree');

        $validator
            ->allowEmpty('specialization');

        $validator
            ->decimal('spouse_emplid')
            ->allowEmpty('spouse_emplid');

        $validator
            ->allowEmpty('leave_passage');

        $validator
            ->allowEmpty('leave_passage_entitle');

        $validator
            ->requirePresence('person_id_external', 'create')
            ->notEmpty('person_id_external')
            ->add('person_id_external', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['person_id_external']));

        return $rules;
    }
}
