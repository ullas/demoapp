<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JobClassesFixture
 *
 */
class JobClassesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'name' => ['type' => 'string', 'length' => 90, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 4000, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'effective_status' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'effective_start_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'effective_end_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'worker_comp_code' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'default_job_level' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'standard_weekly_hours' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'regular_temporary' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'default_employee_class' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'full_time_employee' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'default_supervisor_level' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'pay_grade' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'job_function' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'external_code' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'job_classes_external_code_key' => ['type' => 'unique', 'columns' => ['external_code'], 'length' => []],
            'job_classes_job_function_fkey' => ['type' => 'foreign', 'columns' => ['job_function'], 'references' => ['job_functions', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'job_classes_pay_grade_fkey' => ['type' => 'foreign', 'columns' => ['pay_grade'], 'references' => ['pay_grades', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'effective_status' => 1,
            'effective_start_date' => '2016-08-09',
            'effective_end_date' => '2016-08-09',
            'worker_comp_code' => 'Lorem ipsum dolor sit amet',
            'default_job_level' => 'Lorem ipsum dolor sit amet',
            'standard_weekly_hours' => 1.5,
            'regular_temporary' => 'Lorem ipsum dolor sit amet',
            'default_employee_class' => 'Lorem ipsum dolor sit amet',
            'full_time_employee' => 1,
            'default_supervisor_level' => 'Lorem ipsum dolor sit amet',
            'pay_grade' => 'Lorem ipsum dolor sit amet',
            'job_function' => 'Lorem ipsum dolor sit amet',
            'external_code' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}