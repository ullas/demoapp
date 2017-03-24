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
 * Empdatabiographies Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Employees
 * @property \Cake\ORM\Association\BelongsTo $Positions
 *
 * @method \App\Model\Entity\Empdatabiography get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empdatabiography newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empdatabiography[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empdatabiography|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empdatabiography patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empdatabiography[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empdatabiography findOrCreate($search, callable $callback = null)
 */
class EmpdatabiographiesTable extends Table
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

        $this->table('empdatabiographies');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id'
        ]);
        $this->belongsTo('Positions', [
            'foreignKey' => 'position_id'
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
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["date_of_birth","date_of_death"] as $value) {		
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
        $rules->add($rules->isUnique(['person_id_external']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));
        $rules->add($rules->existsIn(['position_id'], 'Positions'));

        return $rules;
    }
}
