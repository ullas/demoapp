<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Createconfigs Model
 *
 * @method \App\Model\Entity\Createconfig get($primaryKey, $options = [])
 * @method \App\Model\Entity\Createconfig newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Createconfig[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Createconfig|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Createconfig patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Createconfig[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Createconfig findOrCreate($search, callable $callback = null)
 */
class CreateconfigsTable extends Table
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

        $this->table('createconfigs');
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
            ->allowEmpty('table_name');

        $validator
            ->allowEmpty('field_name');

        $validator
            ->allowEmpty('datatype');

        $validator
            ->boolean('has_datefield')
            ->allowEmpty('has_datefield');

        $validator
            ->boolean('has_select')
            ->allowEmpty('has_select');

        return $validator;
    }
}
