<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TimeTypeProfilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TimeTypeProfilesTable Test Case
 */
class TimeTypeProfilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TimeTypeProfilesTable
     */
    public $TimeTypeProfiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.time_type_profiles',
        'app.time_types',
        'app.customers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TimeTypeProfiles') ? [] : ['className' => 'App\Model\Table\TimeTypeProfilesTable'];
        $this->TimeTypeProfiles = TableRegistry::get('TimeTypeProfiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TimeTypeProfiles);

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
