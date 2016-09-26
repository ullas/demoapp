<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PositionsFixture
 *
 */
class PositionsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'external_name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'effective_start_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'effective_end_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'positiontype' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'position_criticality' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'position_controlled' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'multiple_incumbents_allowed' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'comment' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'incumbent' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'change_reason' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'job_title' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'job_code' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'job_level' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'employee_class' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'regular_temporary' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'pay_grade' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'target_fte' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vacant' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'standard_hours' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'company' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'division' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'department' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'location' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'cost_center' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'created_by' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'created_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'last_modified_by' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'last_modified_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'parent_position' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'pay_range' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'position_matrix_relationship' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'right_to_return' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'position_code' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'effective_status' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'positions_code_key' => ['type' => 'unique', 'columns' => ['position_code'], 'length' => []],
            'positions_company_fkey' => ['type' => 'foreign', 'columns' => ['company'], 'references' => ['legal_entities', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_cost_center_fkey' => ['type' => 'foreign', 'columns' => ['cost_center'], 'references' => ['cost_centres', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_department_fkey' => ['type' => 'foreign', 'columns' => ['department'], 'references' => ['departments', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_division_fkey' => ['type' => 'foreign', 'columns' => ['division'], 'references' => ['divisions', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_location_fkey' => ['type' => 'foreign', 'columns' => ['location'], 'references' => ['locations', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_parent_position_fkey' => ['type' => 'foreign', 'columns' => ['parent_position'], 'references' => ['positions', 'position_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_pay_grade_fkey' => ['type' => 'foreign', 'columns' => ['pay_grade'], 'references' => ['pay_grades', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_pay_range_fkey' => ['type' => 'foreign', 'columns' => ['pay_range'], 'references' => ['pay_ranges', 'external_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'external_name' => 'Lorem ipsum dolor sit amet',
            'effective_start_date' => '2016-09-09',
            'effective_end_date' => '2016-09-09',
            'positiontype' => 'Lorem ipsum dolor sit amet',
            'position_criticality' => 'Lorem ipsum dolor sit amet',
            'position_controlled' => 1,
            'multiple_incumbents_allowed' => 1,
            'comment' => 'Lorem ipsum dolor sit amet',
            'incumbent' => 'Lorem ipsum dolor sit amet',
            'change_reason' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet',
            'job_title' => 'Lorem ipsum dolor sit amet',
            'job_code' => 'Lorem ipsum dolor sit amet',
            'job_level' => 'Lorem ipsum dolor sit amet',
            'employee_class' => 'Lorem ipsum dolor sit amet',
            'regular_temporary' => 'Lorem ipsum dolor sit amet',
            'pay_grade' => 'Lorem ipsum dolor sit amet',
            'target_fte' => 1.5,
            'vacant' => 1,
            'standard_hours' => 1.5,
            'company' => 'Lorem ipsum dolor sit amet',
            'division' => 'Lorem ipsum dolor sit amet',
            'department' => 'Lorem ipsum dolor sit amet',
            'location' => 'Lorem ipsum dolor sit amet',
            'cost_center' => 'Lorem ipsum dolor sit amet',
            'created_by' => 'Lorem ipsum dolor sit amet',
            'created_date' => '2016-09-09',
            'last_modified_by' => 'Lorem ipsum dolor sit amet',
            'last_modified_date' => '2016-09-09',
            'parent_position' => 'Lorem ipsum dolor sit amet',
            'pay_range' => 'Lorem ipsum dolor sit amet',
            'position_matrix_relationship' => 'Lorem ipsum dolor sit amet',
            'right_to_return' => 'Lorem ipsum dolor sit amet',
            'position_code' => 'Lorem ipsum dolor sit amet',
            'effective_status' => 1,
            'customer_id' => 1
        ],
    ];
}
