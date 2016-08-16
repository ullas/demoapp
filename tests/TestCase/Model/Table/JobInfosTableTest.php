<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobInfosTable Test Case
 */
class JobInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobInfosTable
     */
    public $JobInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobInfos') ? [] : ['className' => 'App\Model\Table\JobInfosTable'];
        $this->JobInfos = TableRegistry::get('JobInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobInfos);

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
