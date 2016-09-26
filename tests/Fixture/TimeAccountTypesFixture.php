<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TimeAccountTypesFixture
 *
 */
class TimeAccountTypesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'name' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'unit' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'perm_reccur' => ['type' => 'string', 'length' => 15, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'start_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'valid_from' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'valid_from_day' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'account_booking_off' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'freq_period' => ['type' => 'string', 'length' => 10, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'first_offset' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'start_accrual' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'accrual_base' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'min_balance' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'posting_order' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'time_to_accrual' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'proration_used' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'rounding_used' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'update_rule' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'payout_eligiblity' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'code' => ['type' => 'string', 'length' => 25, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'pay_component_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'time_to_actual_unit' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'pay_component_group_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'time_account_types_code_key' => ['type' => 'unique', 'columns' => ['code'], 'length' => []],
            'time_account_types_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'time_account_types_pay_component_group_id_fkey' => ['type' => 'foreign', 'columns' => ['pay_component_group_id'], 'references' => ['pay_component_groups', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'time_account_types_pay_component_id_fkey' => ['type' => 'foreign', 'columns' => ['pay_component_id'], 'references' => ['pay_components', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'unit' => 'Lorem ip',
            'perm_reccur' => 'Lorem ipsum d',
            'start_date' => '2016-09-09',
            'valid_from' => '2016-09-09',
            'valid_from_day' => '2016-09-09',
            'account_booking_off' => 1.5,
            'freq_period' => 'Lorem ip',
            'first_offset' => 1.5,
            'start_accrual' => 1.5,
            'accrual_base' => 'Lorem ipsum dolor sit a',
            'min_balance' => 1.5,
            'posting_order' => 'Lorem ipsum dolor sit a',
            'time_to_accrual' => 1.5,
            'proration_used' => 1,
            'rounding_used' => 1,
            'update_rule' => 'Lorem ipsum dolor sit a',
            'payout_eligiblity' => 'Lorem ipsum dolor sit a',
            'code' => 'Lorem ipsum dolor sit a',
            'pay_component_id' => 1,
            'time_to_actual_unit' => 'Lorem ipsum dolor sit amet',
            'pay_component_group_id' => 1,
            'customer_id' => 1
        ],
    ];
}
