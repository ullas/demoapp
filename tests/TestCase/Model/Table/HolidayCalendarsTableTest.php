<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HolidayCalendarsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HolidayCalendarsTable Test Case
 */
class HolidayCalendarsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HolidayCalendarsTable
     */
    public $HolidayCalendars;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.holiday_calendars'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('HolidayCalendars') ? [] : ['className' => 'App\Model\Table\HolidayCalendarsTable'];
        $this->HolidayCalendars = TableRegistry::get('HolidayCalendars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HolidayCalendars);

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
