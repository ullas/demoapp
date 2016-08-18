<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DivisionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DivisionsTable Test Case
 */
class DivisionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DivisionsTable
     */
    public $Divisions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.divisions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Divisions') ? [] : ['className' => 'App\Model\Table\DivisionsTable'];
        $this->Divisions = TableRegistry::get('Divisions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Divisions);

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
