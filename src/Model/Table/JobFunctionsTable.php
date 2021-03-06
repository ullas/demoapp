<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jobfunctions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Jobs
 *
 * @method \App\Model\Entity\Jobfunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Jobfunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Jobfunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Jobfunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Jobfunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Jobfunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Jobfunction findOrCreate($search, callable $callback = null)
 */
class JobfunctionsTable extends Table
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

        $this->table('jobfunctions');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id'
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
            ->allowEmpty('effective_status');

        $validator
            // ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            // ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->allowEmpty('job_function_type');

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
        $rules->add($rules->existsIn(['job_id'], 'Jobs'));

        return $rules;
    }
}
