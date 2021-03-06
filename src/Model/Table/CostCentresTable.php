<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CostCentres Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $ParentCostCentres
 * @property \Cake\ORM\Association\HasMany $ChildCostCentres
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 *
 * @method \App\Model\Entity\CostCentre get($primaryKey, $options = [])
 * @method \App\Model\Entity\CostCentre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\CostCentre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CostCentre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CostCentre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CostCentre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\CostCentre findOrCreate($search, callable $callback = null)
 */
class CostCentresTable extends Table
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

        $this->table('cost_centres');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('ParentCostCentres', [
            'className' => 'CostCentres',
            'foreignKey' => 'parent_id'
        ]);
        // $this->hasMany('ChildCostCentres', [
            // 'className' => 'CostCentres',
            // 'foreignKey' => 'parent_id'
        // ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'cost_centre_id'
        ]);
		
		$this->belongsTo('Parents', [
            'className' => 'CostCentres','foreignKey' => 'parent_id'
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
            ->allowEmpty('effective_status');

        $validator
            // ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            // ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->requirePresence('external_code', 'create')
            ->notEmpty('external_code')
            ->add('external_code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('cost_center_manager');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentCostCentres'));

        return $rules;
    }
}
