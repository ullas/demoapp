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
 * TimeTypeProfiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\HasMany $Jobinfos
 * @property \Cake\ORM\Association\HasMany $TimeTypeProfileTimeTypes
 * @property \Cake\ORM\Association\HasMany $TimeTypes
 *
 * @method \App\Model\Entity\TimeTypeProfile get($primaryKey, $options = [])
 * @method \App\Model\Entity\TimeTypeProfile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TimeTypeProfile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TimeTypeProfile findOrCreate($search, callable $callback = null)
 */
class TimeTypeProfilesTable extends Table
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

        $this->table('time_type_profiles');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->hasMany('Jobinfos', [
            'foreignKey' => 'time_type_profile_id'
        ]);
        $this->hasMany('TimeTypeProfileTimeTypes', [
            'foreignKey' => 'time_type_profile_id'
        ]);
        $this->hasMany('TimeTypes', [
            'foreignKey' => 'time_type_profile_id'
        ]);
		
		$this->belongsToMany('TimeTypes', [
            'foreignKey' => 'time_type_profile_id',
            'targetForeignKey' => 'time_type_id',
            'joinTable' => 'time_type_profile_time_types']);
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
            ->allowEmpty('country');

        $validator
            ->allowEmpty('start_date');

        $validator
            ->allowEmpty('time_rec_variant');

        $validator
            ->allowEmpty('status');

        $validator
            ->boolean('enable_ess')
            ->allowEmpty('enable_ess');

        $validator
            ->requirePresence('code', 'create')
            ->notEmpty('code')
            ->add('code', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['code']));
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));

        return $rules;
    }
}
