<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpDataPersonals Model
 *
 * @method \App\Model\Entity\EmpDataPersonal get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpDataPersonal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpDataPersonal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataPersonal findOrCreate($search, callable $callback = null)
 */
class EmpDataPersonalsTable extends Table
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

        $this->table('emp_data_personals');
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
            ->allowEmpty('salutation');

        $validator
            ->allowEmpty('first_name');

        $validator
            ->allowEmpty('last_name');

        $validator
            ->allowEmpty('initials');

        $validator
            ->allowEmpty('middle_name');

        $validator
            ->allowEmpty('first_name_alt1');

        $validator
            ->allowEmpty('middle_name_alt1');

        $validator
            ->allowEmpty('last_name_alt1');

        $validator
            ->allowEmpty('first_name_alt2');

        $validator
            ->allowEmpty('middle_name_alt2');

        $validator
            ->allowEmpty('last_name_alt2');

        $validator
            ->allowEmpty('display_name');

        $validator
            ->allowEmpty('formal_name');

        $validator
            ->allowEmpty('birth_name');

        $validator
            ->allowEmpty('birth_name_alt1');

        $validator
            ->allowEmpty('birth_name_alt2');

        $validator
            ->allowEmpty('preferred_name');

        $validator
            ->allowEmpty('display_name_alt1');

        $validator
            ->allowEmpty('display_name_alt2');

        $validator
            ->allowEmpty('formal_name_alt1');

        $validator
            ->allowEmpty('formal_name_alt2');

        $validator
            ->allowEmpty('name_format');

        $validator
            ->boolean('is_overridden')
            ->allowEmpty('is_overridden');

        $validator
            ->allowEmpty('nationality');

        $validator
            ->allowEmpty('second_nationality');

        $validator
            ->allowEmpty('third_nationality');

        $validator
            ->allowEmpty('wps_code');

        $validator
            ->allowEmpty('uniqueid');

        $validator
            ->allowEmpty('prof_legal');

        $validator
            ->allowEmpty('exclude_legal');

        $validator
            ->date('nationality_date')
            ->allowEmpty('nationality_date');

        $validator
            ->allowEmpty('home_airport');

        $validator
            ->allowEmpty('Religion');

        $validator
            ->decimal('number_children')
            ->allowEmpty('number_children');

        $validator
            ->date('disability_date')
            ->allowEmpty('disability_date');

        $validator
            ->allowEmpty('disable_group');

        $validator
            ->decimal('disable_degree')
            ->allowEmpty('disable_degree');

        $validator
            ->allowEmpty('disable_type');

        $validator
            ->allowEmpty('disable_authority');

        $validator
            ->allowEmpty('disable_ref');

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
