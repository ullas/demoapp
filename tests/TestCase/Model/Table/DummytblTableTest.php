<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DummytblTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DummytblTable Test Case
 */
class DummytblTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DummytblTable
     */
    public $Dummytbl;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dummytbl'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dummytbl') ? [] : ['className' => 'App\Model\Table\DummytblTable'];
        $this->Dummytbl = TableRegistry::get('Dummytbl', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dummytbl);

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
