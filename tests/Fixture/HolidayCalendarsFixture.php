<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HolidayCalendarsFixture
 *
 */
class HolidayCalendarsFixture extends TestFixture
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
        'name' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'country' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'valid_from' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'valid_to' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'holiday_calendars_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'name' => 'Lorem ipsum dolor sit amet',
            'country' => 'Lorem ipsum dolor sit amet',
            'valid_from' => '2016-09-09',
            'valid_to' => '2016-09-09',
            'customer_id' => 1
        ],
    ];
}
