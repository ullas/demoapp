<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Customers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Employees
 * @property \Cake\ORM\Association\HasMany $Addresses
 * @property \Cake\ORM\Association\HasMany $BusinessUnits
 * @property \Cake\ORM\Association\HasMany $CalendarAssignments
 * @property \Cake\ORM\Association\HasMany $ContactInfos
 * @property \Cake\ORM\Association\HasMany $CorporateAddresses
 * @property \Cake\ORM\Association\HasMany $CostCentres
 * @property \Cake\ORM\Association\HasMany $Departments
 * @property \Cake\ORM\Association\HasMany $Dependents
 * @property \Cake\ORM\Association\HasMany $Divisions
 * @property \Cake\ORM\Association\HasMany $EducationalQualifications
 * @property \Cake\ORM\Association\HasMany $Empdatabiographies
 * @property \Cake\ORM\Association\HasMany $Empdatapersonals
 * @property \Cake\ORM\Association\HasMany $EmployeeAbsencerecords
 * @property \Cake\ORM\Association\HasMany $Employees
 * @property \Cake\ORM\Association\HasMany $Employmentinfos
 * @property \Cake\ORM\Association\HasMany $EventReasons
 * @property \Cake\ORM\Association\HasMany $Experiences
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
 * @property \Cake\ORM\Association\HasMany $OfficeAssets
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
 * @property \Cake\ORM\Association\HasMany $Skills
 * @property \Cake\ORM\Association\HasMany $TimeAccountTypes
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfileTimeTypes
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfiles
 * @property \Cake\ORM\Association\HasMany $TimeTypes
 * @property \Cake\ORM\Association\HasMany $Users
 * @property \Cake\ORM\Association\HasMany $WorkSchedules
 * @property \Cake\ORM\Association\HasMany $Workflowactions
 * @property \Cake\ORM\Association\HasMany $Workflowrules
 * @property \Cake\ORM\Association\HasMany $Workflows
 * @property \Cake\ORM\Association\HasMany $WorkflowsHistory
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

        $this->belongsTo('Employees', [
            'foreignKey' => 'lockemployee_id'
        ]);
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
        $this->hasMany('EducationalQualifications', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Empdatabiographies', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Empdatapersonals', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('EmployeeAbsencerecords', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Employees', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Employmentinfos', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('EventReasons', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Experiences', [
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
        $this->hasMany('Identities', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobclasses', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobfunctions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobs', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('LegalEntities', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Locations', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Notes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('OfficeAssets', [
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
        $this->hasMany('PayrollArea', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayrollData', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayrollRecord', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayrollResult', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('PayrollStatus', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Picklists', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Positions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Profiles', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Regions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Skills', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('TimeAccountTypes', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('TimeTypeProfileTimeTypes', [
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
        $this->hasMany('Workflowactions', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Workflowrules', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Workflows', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('WorkflowsHistory', [
            'foreignKey' => 'customer_id'
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
            ->allowEmpty('contactno');

        $validator
            ->allowEmpty('noofusers');

        $validator
            ->date('expirydate')
            ->allowEmpty('expirydate');

        $validator
            ->boolean('payroll_lock')
            ->allowEmpty('payroll_lock');

        $validator
            ->date('lock_date')
            ->allowEmpty('lock_date');

        $validator
            ->time('lock_time')
            ->allowEmpty('lock_time');

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
        $rules->add($rules->existsIn(['lockemployee_id'], 'Employees'));

        return $rules;
    }
}
