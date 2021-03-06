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
 * ContactInfos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\ContactInfo get($primaryKey, $options = [])
 * @method \App\Model\Entity\ContactInfo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ContactInfo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ContactInfo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ContactInfo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ContactInfo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ContactInfo findOrCreate($search, callable $callback = null)
 */
class ContactInfosTable extends Table
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

        $this->table('contact_infos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id'
        ]);
        $this->belongsTo('Employees', [
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
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('mobile');

        $validator
            ->allowEmpty('email_address1');

        $validator
            ->allowEmpty('email_address2');

        $validator
            ->allowEmpty('facebook');

        $validator
            ->allowEmpty('linkedin');

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
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}
