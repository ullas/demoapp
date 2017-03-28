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
 * LegalEntities Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $PayGroups
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $HolidayCalendars
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $PayRanges
 * @property \Cake\ORM\Association\HasMany $PayrollArea
 * @property \Cake\ORM\Association\HasMany $Positions
 *
 * @method \App\Model\Entity\LegalEntity get($primaryKey, $options = [])
 * @method \App\Model\Entity\LegalEntity newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LegalEntity[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LegalEntity|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LegalEntity patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LegalEntity[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LegalEntity findOrCreate($search, callable $callback = null)
 */
class LegalEntitiesTable extends Table
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

        $this->table('legal_entities');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->belongsTo('PayGroups', [
            'foreignKey' => 'paygroup_id'
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('HolidayCalendars', [
            'foreignKey' => 'holiday_calendar_id'
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'legal_entity_id','dependent' => true
        ]);
        $this->hasMany('PayRanges', [
            'foreignKey' => 'legal_entity_id','dependent' => true
        ]);
        $this->hasMany('PayrollArea', [
            'foreignKey' => 'legal_entity_id','dependent' => true
        ]);
		
        $this->hasMany('Positions', [
            'foreignKey' => 'legal_entity_id','dependent' => true
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
            ->allowEmpty('country_of_registration');

        $validator
            ->decimal('standard_weekly_hours')
            ->allowEmpty('standard_weekly_hours');

        $validator
            ->allowEmpty('official_language');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('currency');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["effective_start_date","effective_end_date"] as $value) {		
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
        $rules->add($rules->isUnique(['external_code']));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['paygroup_id'], 'PayGroups'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['holiday_calendar_id'], 'HolidayCalendars'));

        return $rules;
    }
}
