<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JobClassesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JobClassesTable Test Case
 */
class JobClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JobClassesTable
     */
    public $JobClasses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.job_classes',
        'app.pay_grades',
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
        $config = TableRegistry::exists('JobClasses') ? [] : ['className' => 'App\Model\Table\JobClassesTable'];
        $this->JobClasses = TableRegistry::get('JobClasses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->JobClasses);

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
