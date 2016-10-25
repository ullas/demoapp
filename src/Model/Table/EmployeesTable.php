<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Employees Model
 *
 * @property \Cake\ORM\Association\BelongsTo $EmpDataBiographies
 * @property \Cake\ORM\Association\BelongsTo $EmpDataPersonals
 * @property \Cake\ORM\Association\BelongsTo $EmploymentInfos
 * @property \Cake\ORM\Association\HasMany $EmpDataBiographies
 * @property \Cake\ORM\Association\HasMany $EmpDataPersonals
 * @property \Cake\ORM\Association\HasMany $EmploymentInfos
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null)
 */
class EmployeesTable extends Table
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

        $this->table('employees');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('EmpDataBiographies', [
            'foreignKey' => 'emp_data_biography_id'
        ]);
        $this->belongsTo('EmpDataPersonals', [
            'foreignKey' => 'emp_data_personal_id'
        ]);
        $this->belongsTo('EmploymentInfos', [
            'foreignKey' => 'employment_info_id'
        ]);
		
		$this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasOne('Customers', [
            'foreignKey' => 'employee_id'
        ]);
		
        $this->hasOne('EmpDataBiographies', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasOne('EmpDataPersonals', [
            'foreignKey' => 'employee_id'
        ]);
        $this->hasOne('EmploymentInfos', [
            'foreignKey' => 'employee_id'
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
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['emp_data_biography_id'], 'EmpDataBiographies'));
        $rules->add($rules->existsIn(['emp_data_personal_id'], 'EmpDataPersonals'));
        $rules->add($rules->existsIn(['employment_info_id'], 'EmploymentInfos'));

        return $rules;
    }
}
