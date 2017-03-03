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
 * @property \Cake\ORM\Association\HasMany $PayRanges
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
        $this->hasMany('PayRanges', [
            'foreignKey' => 'pay_group_id'
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
            ->date('effective_start_date')
            ->allowEmpty('effective_start_date');

        $validator
            ->date('effective_end_date')
            ->allowEmpty('effective_end_date');

        $validator
            ->date('earliest_change_date')
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
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["effective_start_date","effective_end_date"] as $value) {		
				if($data[$value]!=null && strpos($data[$value], '/') !== false){
					$data[$value] = str_replace('/', '-', $data[$value]);
					$data[$value]=date('Y/m/d', strtotime($data[$value]));
				}
			}
		}
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

        return $rules;
    }
}
