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
 * OfficeAssets Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Customers
 * @property \Cake\ORM\Association\BelongsTo $Employees
 *
 * @method \App\Model\Entity\OfficeAsset get($primaryKey, $options = [])
 * @method \App\Model\Entity\OfficeAsset newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OfficeAsset[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OfficeAsset|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OfficeAsset patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OfficeAsset[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OfficeAsset findOrCreate($search, callable $callback = null)
 */
class OfficeAssetsTable extends Table
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

        $this->table('office_assets');
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
            ->allowEmpty('location');

        $validator
            ->allowEmpty('assettype');

        $validator
            ->allowEmpty('assetnumber');

        $validator
            ->allowEmpty('assetdescription');

        $validator
            ->date('issuedate')
            ->allowEmpty('issuedate');

        $validator
            ->date('todate')
            ->allowEmpty('todate');

        return $validator;
    }
	public function beforeMarshal(Event $event, $data, $options)
	{
		
		$userdf = Configure::read('userdf');
		if(isset($userdf)  & $userdf===1){

			foreach (["issuedate","todate"] as $value) {		
				if(isset($data[$value])){			
						if($data[$value]!=null && $data[$value]!='' && strpos($data[$value], '/') !== false){
						$data[$value] = str_replace('/', '-', $data[$value]);
						$data[$value]=date('Y/m/d', strtotime($data[$value]));
					}
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
        $rules->add($rules->existsIn(['customer_id'], 'Customers'));
        $rules->add($rules->existsIn(['employee_id'], 'Employees'));

        return $rules;
    }
}