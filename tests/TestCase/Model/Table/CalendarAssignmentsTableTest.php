<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalendarAssignmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalendarAssignmentsTable Test Case
 */
class CalendarAssignmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CalendarAssignmentsTable
     */
    public $CalendarAssignments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calendar_assignments',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CalendarAssignments') ? [] : ['className' => 'App\Model\Table\CalendarAssignmentsTable'];
        $this->CalendarAssignments = TableRegistry::get('CalendarAssignments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CalendarAssignments);

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
