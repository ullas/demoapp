<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DependentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DependentsTable Test Case
 */
class DependentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DependentsTable
     */
    public $Dependents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dependents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dependents') ? [] : ['className' => 'App\Model\Table\DependentsTable'];
        $this->Dependents = TableRegistry::get('Dependents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dependents);

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
