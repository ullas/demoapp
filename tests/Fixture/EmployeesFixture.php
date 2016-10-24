<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmployeesFixture
 *
 */
class EmployeesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'emp_data_biography_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'emp_data_personal_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'employment_info_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'employees_emp_data_biography_id_fkey' => ['type' => 'foreign', 'columns' => ['emp_data_biography_id'], 'references' => ['emp_data_biographies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'employees_emp_data_personal_id_fkey' => ['type' => 'foreign', 'columns' => ['emp_data_personal_id'], 'references' => ['emp_data_personals', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'employees_employment_info_id_fkey' => ['type' => 'foreign', 'columns' => ['employment_info_id'], 'references' => ['employment_infos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'emp_data_biography_id' => 1,
            'emp_data_personal_id' => 1,
            'employment_info_id' => 1
        ],
    ];
}
