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
        'name' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
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
        'target_fte' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'vacant' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'standard_hours' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'created_by' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'created_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'last_modified_by' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'last_modified_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'position_matrix_relationship' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'right_to_return' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'position_code' => ['type' => 'string', 'length' => 255, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'effective_status' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'legal_entity_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'department_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'cost_center_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'location_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'division_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pay_grade_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'pay_range_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'parent_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'lft' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'rght' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'positions_code_key' => ['type' => 'unique', 'columns' => ['position_code'], 'length' => []],
            'positions_cost_center_id_fkey' => ['type' => 'foreign', 'columns' => ['cost_center_id'], 'references' => ['cost_centres', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_department_id_fkey' => ['type' => 'foreign', 'columns' => ['department_id'], 'references' => ['departments', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_division_id_fkey' => ['type' => 'foreign', 'columns' => ['division_id'], 'references' => ['divisions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_legal_entity_id_fkey' => ['type' => 'foreign', 'columns' => ['legal_entity_id'], 'references' => ['legal_entities', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_location_id_fkey' => ['type' => 'foreign', 'columns' => ['location_id'], 'references' => ['locations', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_parent_position_id_fkey' => ['type' => 'foreign', 'columns' => ['parent_id'], 'references' => ['positions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_pay_grade_id_fkey' => ['type' => 'foreign', 'columns' => ['pay_grade_id'], 'references' => ['pay_grades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'positions_pay_range_id_fkey' => ['type' => 'foreign', 'columns' => ['pay_range_id'], 'references' => ['pay_ranges', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'effective_start_date' => '2016-10-06',
            'effective_end_date' => '2016-10-06',
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
            'target_fte' => 1.5,
            'vacant' => 1,
            'standard_hours' => 1.5,
            'created_by' => 'Lorem ipsum dolor sit amet',
            'created_date' => '2016-10-06',
            'last_modified_by' => 'Lorem ipsum dolor sit amet',
            'last_modified_date' => '2016-10-06',
            'position_matrix_relationship' => 'Lorem ipsum dolor sit amet',
            'right_to_return' => 'Lorem ipsum dolor sit amet',
            'position_code' => 'Lorem ipsum dolor sit amet',
            'effective_status' => 1,
            'customer_id' => 1,
            'legal_entity_id' => 1,
            'department_id' => 1,
            'cost_center_id' => 1,
            'location_id' => 1,
            'division_id' => 1,
            'pay_grade_id' => 1,
            'pay_range_id' => 1,
            'parent_id' => 1,
            'lft' => 1,
            'rght' => 1
        ],
    ];
}
