<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorkSchedulesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorkSchedulesTable Test Case
 */
class WorkSchedulesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorkSchedulesTable
     */
    public $WorkSchedules;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.work_schedules'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('WorkSchedules') ? [] : ['className' => 'App\Model\Table\WorkSchedulesTable'];
        $this->WorkSchedules = TableRegistry::get('WorkSchedules', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->WorkSchedules);

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