<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Employees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Addresses
 * @property \Cake\ORM\Association\HasMany $Attendance
 * @property \Cake\ORM\Association\HasMany $ContactInfos
 * @property \Cake\ORM\Association\HasMany $EducationalQualifications
 * @property \Cake\ORM\Association\HasMany $Empdatabiographies
 * @property \Cake\ORM\Association\HasMany $Empdatapersonals
 * @property \Cake\ORM\Association\HasMany $Employmentinfos
 * @property \Cake\ORM\Association\HasMany $Experiences
 * @property \Cake\ORM\Association\HasMany $Identities
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $OfficeAssets
 * @property \Cake\ORM\Association\HasMany $PayrollResult
 * @property \Cake\ORM\Association\HasMany $PayrollStatus
 * @property \Cake\ORM\Association\HasMany $Skills
 * @property \Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeesTable extends Table
{
	public function getExcludedPositions()
	{
		$conn = ConnectionManager::get('default');
		$arrayTemp1 = $conn->execute('select id,name from positions where id not in(select position_id from jobinfos where position_id >0)')->fetchAll('assoc');
		return $arrayTemp1; 
	}
	public function getIncludedPositions($id=null)
	{
		$conn = ConnectionManager::get('default');
		$arrayTemp1 = $conn->execute('select id,name from positions where id not in(select position_id from empdatabiographies where position_id >0 AND employee_id!='.$id.') ')->fetchAll('assoc');
		return $arrayTemp1; 
	}
	
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('employees');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasOne('Addresses', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Attendance', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('ContactInfos', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('EducationalQualifications', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Empdatabiographies', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Empdatapersonals', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Employmentinfos', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Experiences', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Identities', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Jobinfos', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('OfficeAssets', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('PayrollResult', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('PayrollStatus', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Skills', [
            'foreignKey' => 'employee_id','dependent' => true
        ]);
        $this->hasOne('Users', [
            'foreignKey' => 'employee_id','dependent' => true
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
            ->allowEmpty('profilepicture');

        $validator
            ->allowEmpty('visible');

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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
