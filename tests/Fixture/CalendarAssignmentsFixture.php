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
        'user_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'holiday_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'calendar_assignments_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'calendar_assignments_holiday_id_fkey' => ['type' => 'foreign', 'columns' => ['holiday_id'], 'references' => ['holidays', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'calendar_assignments_user_id_fkey' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'assignmentdate' => '2016-09-09',
            'user_id' => 1,
            'holiday_id' => 1,
            'customer_id' => 1
        ],
    ];
}
