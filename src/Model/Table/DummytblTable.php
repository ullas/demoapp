<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Dummytbl Model
 *
 * @method \App\Model\Entity\Dummytbl get($primaryKey, $options = [])
 * @method \App\Model\Entity\Dummytbl newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Dummytbl[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Dummytbl|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Dummytbl patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Dummytbl[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Dummytbl findOrCreate($search, callable $callback = null)
 */
class DummytblTable extends Table
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

        $this->table('dummytbl');
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
            ->date('dgt')
            ->allowEmpty('dgt');

        return $validator;
    }
}
