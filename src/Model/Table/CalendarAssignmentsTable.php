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
 * CalendarAssignments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Holidays
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $HolidayCalendars
 *
 * @method \App\Model\Entity\CalendarAssignment get($primaryKey, $options = [])
 * @method \App\Model\Entity\CalendarAssignment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CalendarAssignment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CalendarAssignment findOrCreate($search, callable $callback = null)
 */
class CalendarAssignmentsTable extends Table
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

        $this->table('calendar_assignments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Holidays', [
            'foreignKey' => 'holiday_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('HolidayCalendars', [
            'foreignKey' => 'holiday_calendar_id'
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
            ->allowEmpty('assignmentyear');

        $validator
            ->date('assignmentdate')
            ->allowEmpty('assignmentdate');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["assignmentdate"] as $value) {		
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['holiday_id'], 'Holidays'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['holiday_calendar_id'], 'HolidayCalendars'));

        return $rules;
    }
}
