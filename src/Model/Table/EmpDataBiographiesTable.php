<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpDataBiographies Model
 *
 * @method \App\Model\Entity\EmpDataBiography get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpDataBiography newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\EmpDataBiography[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataBiography|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpDataBiography patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataBiography[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpDataBiography findOrCreate($search, callable $callback = null)
 */
class EmpDataBiographiesTable extends Table
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

        $this->table('emp_data_biographies');
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
            ->date('date_of_birth')
            ->allowEmpty('date_of_birth');

        $validator
            ->allowEmpty('country_of_birth');

        $validator
            ->allowEmpty('region_of_birth');

        $validator
            ->allowEmpty('place_of_birth');

        $validator
            ->allowEmpty('birth_name');

        $validator
            ->date('date_of_death')
            ->allowEmpty('date_of_death');

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