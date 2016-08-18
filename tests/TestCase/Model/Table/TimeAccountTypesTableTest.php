<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeAccountTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeAccountTypesTable Test Case
 */
class TimeAccountTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeAccountTypesTable
     */
    public $TimeAccountTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.time_account_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TimeAccountTypes') ? [] : ['className' => 'App\Model\Table\TimeAccountTypesTable'];
        $this->TimeAccountTypes = TableRegistry::get('TimeAccountTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TimeAccountTypes);

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
