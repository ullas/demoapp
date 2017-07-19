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
 * PayrollData Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Empdatabiographies
 *
 * @method \App\Model\Entity\PayrollData get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollData newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayrollData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollData|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollData[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollData findOrCreate($search, callable $callback = null)
 */
class PayrollDataTable extends Table
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

        $this->table('payroll_data');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Empdatabiographies', [
            'foreignKey' => 'empdatabiographies_id'
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
            ->notEmpty('empdatabiographies_id');
			
        $validator
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('pay_component_value');

        $validator
            ->allowEmpty('start_date');

        $validator
            ->allowEmpty('end_date');

        $validator
            ->allowEmpty('pay_component_type');

        $validator
            ->allowEmpty('paycomponent');

        $validator
            ->allowEmpty('paycomponentgroup');

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
        $rules->add($rules->existsIn(['empdatabiographies_id'], 'Empdatabiographies'));

        return $rules;
    }
}
