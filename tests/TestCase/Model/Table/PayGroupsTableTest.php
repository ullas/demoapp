<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayGroupsTable Test Case
 */
class PayGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayGroupsTable
     */
    public $PayGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayGroups') ? [] : ['className' => 'App\Model\Table\PayGroupsTable'];
        $this->PayGroups = TableRegistry::get('PayGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayGroups);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
