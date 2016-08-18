<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CorporateAddresses Model
 *
 * @method \App\Model\Entity\CorporateAddress get($primaryKey, $options = [])
 * @method \App\Model\Entity\CorporateAddress newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CorporateAddress[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CorporateAddress|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CorporateAddress patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateAddress[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CorporateAddress findOrCreate($search, callable $callback = null)
 */
class CorporateAddressesTable extends Table
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

        $this->table('corporate_addresses');
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
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('address1');

        $validator
            ->allowEmpty('address2');

        $validator
            ->allowEmpty('address3');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('county');

        $validator
            ->allowEmpty('state');

        $validator
            ->allowEmpty('province');

        $validator
            ->allowEmpty('zip_code');

        $validator
            ->allowEmpty('country');

        return $validator;
    }
}