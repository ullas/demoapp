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
 * Customers Model
 *
 * @property \Cake\ORM\Association\HasMany $Addresses
 * @property \Cake\ORM\Association\HasMany $BusinessUnits
 * @property \Cake\ORM\Association\HasMany $CalendarAssignments
 * @property \Cake\ORM\Association\HasMany $ContactInfos
 * @property \Cake\ORM\Association\HasMany $CorporateAddresses
 * @property \Cake\ORM\Association\HasMany $CostCentres
 * @property \Cake\ORM\Association\HasMany $Departments
 * @property \Cake\ORM\Association\HasMany $Dependents
 * @property \Cake\ORM\Association\HasMany $Divisions
 * @property \Cake\ORM\Association\HasMany $EmpDataBiographies
 * @property \Cake\ORM\Association\HasMany $EmpDataPersonals
 * @property \Cake\ORM\Association\HasMany $EmploymentInfos
 * @property \Cake\ORM\Association\HasMany $EventReasons
 * @property \Cake\ORM\Association\HasMany $Frequencies
 * @property \Cake\ORM\Association\HasMany $HolidayCalendars
 * @property \Cake\ORM\Association\HasMany $Holidays
 * @property \Cake\ORM\Association\HasMany $Ids
 * @property \Cake\ORM\Association\HasMany $JobClasses
 * @property \Cake\ORM\Association\HasMany $JobFunctions
 * @property \Cake\ORM\Association\HasMany $JobInfos
 * @property \Cake\ORM\Association\HasMany $LegalEntities
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $PayComponentGroups
 * @property \Cake\ORM\Association\HasMany $PayComponents
 * @property \Cake\ORM\Association\HasMany $PayGrades
 * @property \Cake\ORM\Association\HasMany $PayGroups
 * @property \Cake\ORM\Association\HasMany $PayRanges
 * @property \Cake\ORM\Association\HasMany $Picklists
 * @property \Cake\ORM\Association\HasMany $Positions
 * @property \Cake\ORM\Association\HasMany $Regions
 * @property \Cake\ORM\Association\HasMany $TimeAccountTypes
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfiles
 * @property \Cake\ORM\Association\HasMany $TimeTypes
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\HasMany $WorkSchedules
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null)
 */
class CustomersTable extends Table
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

        $this->table('customers');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->hasMany('Addresses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('BusinessUnits', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('CalendarAssignments', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('ContactInfos', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('CorporateAddresses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('CostCentres', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Dependents', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Divisions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('EmpDataBiographies', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('EmpDataPersonals', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('EmploymentInfos', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('EventReasons', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Frequencies', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('HolidayCalendars', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Holidays', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Ids', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('JobClasses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('JobFunctions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('JobInfos', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('LegalEntities', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayComponentGroups', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayComponents', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayGrades', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayGroups', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayRanges', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Picklists', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Positions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Regions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('TimeAccountTypes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('TimeTypeProfiles', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('TimeTypes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('WorkSchedules', [
            'foreignKey' => 'customer_id'
        ]);
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["expirydate"] as $value) {		
				if($data[$value]!=null && strpos($data[$value], '/') !== false){
					$data[$value] = str_replace('/', '-', $data[$value]);
					$data[$value]=date('Y/m/d', strtotime($data[$value]));
				}
			}
		}
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
            ->allowEmpty('contactno');

        $validator
            ->allowEmpty('noofusers');

        $validator
            ->date('expirydate')
            ->allowEmpty('expirydate');

        return $validator;
    }
}
