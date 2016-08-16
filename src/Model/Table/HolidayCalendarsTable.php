<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HolidayCalendars Model
 *
 * @method \App\Model\Entity\HolidayCalendar get($primaryKey, $options = [])
 * @method \App\Model\Entity\HolidayCalendar newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HolidayCalendar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HolidayCalendar findOrCreate($search, callable $callback = null)
 */
class HolidayCalendarsTable extends Table
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

        $this->table('holiday_calendars');
        $this->displayField('name');
        $this->primaryKey('id');
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
            ->allowEmpty('calendar');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('country');

        $validator
            ->date('valid_from')
            ->allowEmpty('valid_from');

        $validator
            ->date('valid_to')
            ->allowEmpty('valid_to');

        return $validator;
    }
}
