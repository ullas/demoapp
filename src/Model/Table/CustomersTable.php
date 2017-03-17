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
 * @property \Cake\ORM\Association\HasMany $Empdatabiographies
 * @property \Cake\ORM\Association\HasMany $Empdatapersonals
 * @property \Cake\ORM\Association\HasMany $EmployeeAbsencerecords
 * @property \Cake\ORM\Association\HasMany $Employees
 * @property \Cake\ORM\Association\HasMany $Employmentinfos
 * @property \Cake\ORM\Association\HasMany $EventReasons
 * @property \Cake\ORM\Association\HasMany $Frequencies
 * @property \Cake\ORM\Association\HasMany $HolidayCalendars
 * @property \Cake\ORM\Association\HasMany $Holidays
 * @property \Cake\ORM\Association\HasMany $Identities
 * @property \Cake\ORM\Association\HasMany $Jobclasses
 * @property \Cake\ORM\Association\HasMany $Jobfunctions
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $Jobs
 * @property \Cake\ORM\Association\HasMany $LegalEntities
 * @property \Cake\ORM\Association\HasMany $Locations
 * @property \Cake\ORM\Association\HasMany $Notes
 * @property \Cake\ORM\Association\HasMany $PayComponentGroups
 * @property \Cake\ORM\Association\HasMany $PayComponents
 * @property \Cake\ORM\Association\HasMany $PayGrades
 * @property \Cake\ORM\Association\HasMany $PayGroups
 * @property \Cake\ORM\Association\HasMany $PayRanges
 * @property \Cake\ORM\Association\HasMany $PayrollArea
 * @property \Cake\ORM\Association\HasMany $PayrollData
 * @property \Cake\ORM\Association\HasMany $PayrollRecord
 * @property \Cake\ORM\Association\HasMany $PayrollResult
 * @property \Cake\ORM\Association\HasMany $PayrollStatus
 * @property \Cake\ORM\Association\HasMany $Picklists
 * @property \Cake\ORM\Association\HasMany $Positions
 * @property \Cake\ORM\Association\HasMany $Profiles
 * @property \Cake\ORM\Association\HasMany $Regions
 * @property \Cake\ORM\Association\HasMany $TimeAccountTypes
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfiles
 * @property \Cake\ORM\Association\HasMany $TimeTypes
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\HasMany $WorkSchedules
 * @property \Cake\ORM\Association\HasMany $Workflowactions
 * @property \Cake\ORM\Association\HasMany $Workflowrules
 * @property \Cake\ORM\Association\HasMany $Workflows
 *
 * @method \App\Model\Entity\Customer get($primaryKey, $options = [])
 * @method \App\Model\Entity\Customer newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Customer[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Customer|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Customer patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Customer[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Customer findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->addBehavior('Timestamp');

        $this->hasMany('Addresses', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('BusinessUnits', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('CalendarAssignments', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('ContactInfos', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('CorporateAddresses', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('CostCentres', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Departments', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Dependents', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Divisions', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Empdatabiographies', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Empdatapersonals', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('EmployeeAbsencerecords', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Employmentinfos', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('EventReasons', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Frequencies', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('HolidayCalendars', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Holidays', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Identities', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Jobclasses', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Jobfunctions', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('LegalEntities', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayComponentGroups', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayComponents', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayGrades', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayGroups', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayRanges', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayrollArea', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayrollData', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayrollRecord', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayrollResult', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayrollStatus', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Picklists', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Positions', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Profiles', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Regions', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('TimeAccountTypes', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('TimeTypeProfiles', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('TimeTypes', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('WorkSchedules', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Workflowactions', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Workflowrules', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('Workflows', [
            'foreignKey' => 'customer_id','dependent' => true
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
