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
 * HolidayCalendars Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $CalendarAssignments
 * @property \Cake\ORM\Association\HasMany $Holidays
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $LegalEntities
 * @property \Cake\ORM\Association\HasMany $Locations
 *
 * @method \App\Model\Entity\HolidayCalendar get($primaryKey, $options = [])
 * @method \App\Model\Entity\HolidayCalendar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HolidayCalendar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar findOrCreate($search, callable $callback = null)
 */
class HolidayCalendarsTable extends Table
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

        $this->table('holiday_calendars');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('CalendarAssignments', [
            'foreignKey' => 'holiday_calendar_id','dependent' => true
        ]);
        $this->hasMany('Holidays', [
            'foreignKey' => 'holiday_calendar_id','dependent' => true
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'holiday_calendar_id','dependent' => true
        ]);
        $this->hasMany('LegalEntities', [
            'foreignKey' => 'holiday_calendar_id','dependent' => true
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'holiday_calendar_id','dependent' => true
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
            ->allowEmpty('calendar');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('country');

        $validator
            ->date('valid_from')
            ->allowEmpty('valid_from');

        $validator
            ->date('valid_to')
            ->allowEmpty('valid_to');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["valid_from", "valid_to"] as $value) {		
				if($data[$value]!=null && strpos($data[$value], '/') !== false){
					$data[$value] = str_replace('/', '-', $data[$value]);
					$data[$value]=date('Y/m/d', strtotime($data[$value]));
				}
			}
		}
   		// debug($data['start_date']);
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

        return $rules;
    }
}
