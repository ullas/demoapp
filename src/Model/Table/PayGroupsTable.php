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
 * PayGroups Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Frequencies
 * @property \Cake\ORM\Association\BelongsTo $LegalEntities
 * @property \Cake\ORM\Association\BelongsTo $BusinessUnits
 * @property \Cake\ORM\Association\BelongsTo $Divisions
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $PayRanges
 * @property \Cake\ORM\Association\HasMany $PayrollRecord
 * @property \Cake\ORM\Association\HasMany $PayrollResult
 * @property \Cake\ORM\Association\HasMany $PayrollStatus
 *
 * @method \App\Model\Entity\PayGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayGroup findOrCreate($search, callable $callback = null)
 */
class PayGroupsTable extends Table
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

        $this->table('pay_groups');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Frequencies', [
            'foreignKey' => 'frequency_id'
        ]);
        $this->belongsTo('LegalEntities', [
            'foreignKey' => 'legal_entity_id'
        ]);
        $this->belongsTo('BusinessUnits', [
            'foreignKey' => 'business_unit_id'
        ]);
        $this->belongsTo('Divisions', [
            'foreignKey' => 'division_id'
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id'
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'pay_group_id','dependent'=>true
        ]);
        $this->hasMany('PayRanges', [
            'foreignKey' => 'pay_group_id','dependent'=>true
        ]);
        $this->hasMany('PayrollRecord', [
            'foreignKey' => 'pay_group_id','dependent'=>true
        ]);
        $this->hasMany('PayrollResult', [
            'foreignKey' => 'pay_group_id','dependent'=>true
        ]);
        $this->hasMany('PayrollStatus', [
            'foreignKey' => 'pay_group_id','dependent'=>true
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
            ->allowEmpty('description');

        $validator
            ->boolean('effective_status')
            ->allowEmpty('effective_status');

        $validator
            // ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            // ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            // ->date('earliest_change_date')
            ->allowEmpty('earliest_change_date');

        $validator
            ->allowEmpty('primary_contactid');

        $validator
            ->allowEmpty('primary_contact_email');

        $validator
            ->allowEmpty('primary_contact_name');

        $validator
            ->allowEmpty('secondary_contactid');

        $validator
            ->allowEmpty('secondary_contact_email');

        $validator
            ->allowEmpty('secondary_contact_name');

        $validator
            ->decimal('weeks_in_pay_period')
            ->allowEmpty('weeks_in_pay_period');

        $validator
            ->allowEmpty('data_delimiter');

        $validator
            ->allowEmpty('decimal_point');

        $validator
            ->decimal('lag')
            ->allowEmpty('lag');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['external_code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['frequency_id'], 'Frequencies'));
        $rules->add($rules->existsIn(['legal_entity_id'], 'LegalEntities'));
        $rules->add($rules->existsIn(['business_unit_id'], 'BusinessUnits'));
        $rules->add($rules->existsIn(['division_id'], 'Divisions'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
