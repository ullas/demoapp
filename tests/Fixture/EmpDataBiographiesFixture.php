<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmpDataBiographiesFixture
 *
 */
class EmpDataBiographiesFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'empdatabiographies';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'date_of_birth' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'country_of_birth' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'region_of_birth' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'place_of_birth' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'birth_name' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'date_of_death' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'person_id_external' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'employee_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'position_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'emp_data_biographies_person_id_external_key' => ['type' => 'unique', 'columns' => ['person_id_external'], 'length' => []],
            'emp_data_biographies_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'emp_data_biographies_employee_id_fkey' => ['type' => 'foreign', 'columns' => ['employee_id'], 'references' => ['employees', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'emp_data_biographies_person_id_external_fkey' => ['type' => 'foreign', 'columns' => ['person_id_external'], 'references' => ['empdatabiographies', 'person_id_external'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'empdatabiographies_position_id_fkey' => ['type' => 'foreign', 'columns' => ['position_id'], 'references' => ['positions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'date_of_birth' => '2016-12-07',
            'country_of_birth' => 'Lorem ipsum dolor sit amet',
            'region_of_birth' => 'Lorem ipsum dolor sit amet',
            'place_of_birth' => 'Lorem ipsum dolor sit amet',
            'birth_name' => 'Lorem ipsum dolor sit amet',
            'date_of_death' => '2016-12-07',
            'person_id_external' => 'Lorem ipsum dolor sit amet',
            'customer_id' => 1,
            'employee_id' => 1,
            'position_id' => 1
        ],
    ];
}
