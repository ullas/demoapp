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
 * PayrollArea Model
 *
 * @property \Cake\ORM\Association\BelongsTo $LegalEntities
 * @property \Cake\ORM\Association\BelongsTo $BusinessUnits
 * @property \Cake\ORM\Association\BelongsTo $Divisions
 * @property \Cake\ORM\Association\BelongsTo $Locations
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $PayrollRecord
 * @property \Cake\ORM\Association\HasMany $PayrollStatus
 *
 * @method \App\Model\Entity\PayrollArea get($primaryKey, $options = [])
 * @method \App\Model\Entity\PayrollArea newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PayrollArea[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PayrollArea|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PayrollArea patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollArea[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PayrollArea findOrCreate($search, callable $callback = null)
 */
class PayrollAreaTable extends Table
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

        $this->table('payroll_area');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('LegalEntities', [
            'foreignKey' => 'legal_entity_id','dependent' => true
        ]);
        $this->belongsTo('BusinessUnits', [
            'foreignKey' => 'business_unit_id','dependent' => true
        ]);
        $this->belongsTo('Divisions', [
            'foreignKey' => 'division_id','dependent' => true
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id','dependent' => true
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id','dependent' => true
        ]);
        $this->hasMany('PayrollRecord', [
            'foreignKey' => 'payroll_area_id','dependent' => true
        ]);
        $this->hasMany('PayrollStatus', [
            'foreignKey' => 'payroll_area_id','dependent' => true
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
            ->allowEmpty('code');

        $validator
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['legal_entity_id'], 'LegalEntities'));
        $rules->add($rules->existsIn(['business_unit_id'], 'BusinessUnits'));
        $rules->add($rules->existsIn(['division_id'], 'Divisions'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
