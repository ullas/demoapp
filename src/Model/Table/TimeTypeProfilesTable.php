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
 * TimeTypeProfiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TimeTypes
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Workflow
 *
 * @method \App\Model\Entity\TimeTypeProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeTypeProfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTypeProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile findOrCreate($search, callable $callback = null)
 */
class TimeTypeProfilesTable extends Table
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

        $this->table('time_type_profiles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('TimeTypes', [
            'foreignKey' => 'time_type_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Workflow', [
            'foreignKey' => 'workflow_id'
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
            ->allowEmpty('code');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('country');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->allowEmpty('time_rec_variant');

        $validator
            ->allowEmpty('status');

        $validator
            ->boolean('enable_ess')
            ->allowEmpty('enable_ess');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["start_date"] as $value) {		
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
        $rules->add($rules->existsIn(['time_type_id'], 'TimeTypes'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['workflow_id'], 'Workflow'));

        return $rules;
    }
}
