<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobFunctionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobFunctionsTable Test Case
 */
class JobFunctionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobFunctionsTable
     */
    public $JobFunctions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_functions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('JobFunctions') ? [] : ['className' => 'App\Model\Table\JobFunctionsTable'];
        $this->JobFunctions = TableRegistry::get('JobFunctions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobFunctions);

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
