<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EventReasonsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EventReasonsTable Test Case
 */
class EventReasonsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EventReasonsTable
     */
    public $EventReasons;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.event_reasons'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EventReasons') ? [] : ['className' => 'App\Model\Table\EventReasonsTable'];
        $this->EventReasons = TableRegistry::get('EventReasons', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EventReasons);

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
