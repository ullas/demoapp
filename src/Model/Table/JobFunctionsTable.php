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
 * JobFunctions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $JobClasses
 *
 * @method \App\Model\Entity\JobFunction get($primaryKey, $options = [])
 * @method \App\Model\Entity\JobFunction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\JobFunction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JobFunction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\JobFunction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\JobFunction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\JobFunction findOrCreate($search, callable $callback = null)
 */
class JobFunctionsTable extends Table
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
        $this->hasMany('JobClasses', [
            'foreignKey' => 'job_function_id'
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
            ->boolean('effective_status')
            ->allowEmpty('effective_status');

        $validator
            ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->allowEmpty('job_function_type');

        
        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["effective_start_date","effective_end_date"] as $value) {		
				if($data[$value]!=null && strpos($data[$value], '/') !== false){
					$data[$value] = str_replace('/', '-', $data[$value]);
					$data[$value]=date('Y/m/d', strtotime($data[$value]));
				}
			}
		}
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
