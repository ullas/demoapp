<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeTypesTable Test Case
 */
class TimeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeTypesTable
     */
    public $TimeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.time_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TimeTypes') ? [] : ['className' => 'App\Model\Table\TimeTypesTable'];
        $this->TimeTypes = TableRegistry::get('TimeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TimeTypes);

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
