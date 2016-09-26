<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CostCentresFixture
 *
 */
class CostCentresFixture extends TestFixture
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
        'description' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'effective_status' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'effective_start_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'effective_end_date' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'parent_cost_center' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'external_code' => ['type' => 'string', 'length' => 32, 'default' => null, 'null' => false, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'cost_center_manager' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        'customer_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'cost_centres_external_code_key' => ['type' => 'unique', 'columns' => ['external_code'], 'length' => []],
            'cost_centres_cost_center_manager_fkey' => ['type' => 'foreign', 'columns' => ['cost_center_manager'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'cost_centres_customer_id_fkey' => ['type' => 'foreign', 'columns' => ['customer_id'], 'references' => ['customers', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'effective_start_date' => '2016-09-09',
            'effective_end_date' => '2016-09-09',
            'parent_cost_center' => 'Lorem ipsum dolor sit amet',
            'external_code' => 'Lorem ipsum dolor sit amet',
            'cost_center_manager' => 1,
            'customer_id' => 1
        ],
    ];
}
