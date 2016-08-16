<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CalendarAssignmentsFixture
 *
 */
class CalendarAssignmentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'calendar' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'assignmentyear' => ['type' => 'string', 'length' => 4, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'assignmentdate' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'User' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'holiday_code' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'calendar_assignments_holiday_code_key' => ['type' => 'unique', 'columns' => ['holiday_code'], 'length' => []],
            'calendar_assignments_User_fkey' => ['type' => 'foreign', 'columns' => ['User'], 'references' => ['users', 'username'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'calendar_assignments_holiday_code_fkey' => ['type' => 'foreign', 'columns' => ['holiday_code'], 'references' => ['holidays', 'holiday_code'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'calendar' => 'Lorem ip',
            'assignmentyear' => 'Lo',
            'assignmentdate' => '2016-08-09',
            'User' => 'Lorem ipsum dolor sit amet',
            'holiday_code' => 'Lorem ip'
        ],
    ];
}
