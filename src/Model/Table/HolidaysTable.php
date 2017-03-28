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
 * Holidays Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $HolidayCalendars
 * @property \Cake\ORM\Association\HasMany $CalendarAssignments
 *
 * @method \App\Model\Entity\Holiday get($primaryKey, $options = [])
 * @method \App\Model\Entity\Holiday newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Holiday[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Holiday|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Holiday patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Holiday[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Holiday findOrCreate($search, callable $callback = null)
 */
class HolidaysTable extends Table
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

        $this->table('holidays');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('HolidayCalendars', [
            'foreignKey' => 'holiday_calendar_id'
        ]);
        $this->hasMany('CalendarAssignments', [
            'foreignKey' => 'holiday_id','dependent' => true
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
            ->allowEmpty('holiday_class');

        $validator
            ->allowEmpty('name');

        $validator
            ->date('date')
            ->allowEmpty('date');

        $validator
            ->requirePresence('holiday_code', 'create')
            ->notEmpty('holiday_code')
            ->add('holiday_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table','message' => 'Holiday Code should be unique.']);

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["date"] as $value) {		
				if(isset($data[$value])){			
						if($data[$value]!=null && $data[$value]!='' && strpos($data[$value], '/') !== false){
						$data[$value] = str_replace('/', '-', $data[$value]);
						$data[$value]=date('Y/m/d', strtotime($data[$value]));
					}
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
        $rules->add($rules->isUnique(['holiday_code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['holiday_calendar_id'], 'HolidayCalendars'));

        return $rules;
    }
}
