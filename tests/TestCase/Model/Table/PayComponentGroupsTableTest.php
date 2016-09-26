<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayComponentGroupsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayComponentGroupsTable Test Case
 */
class PayComponentGroupsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayComponentGroupsTable
     */
    public $PayComponentGroups;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_component_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayComponentGroups') ? [] : ['className' => 'App\Model\Table\PayComponentGroupsTable'];
        $this->PayComponentGroups = TableRegistry::get('PayComponentGroups', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayComponentGroups);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
