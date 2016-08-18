<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayComponentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayComponentsTable Test Case
 */
class PayComponentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayComponentsTable
     */
    public $PayComponents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_components'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayComponents') ? [] : ['className' => 'App\Model\Table\PayComponentsTable'];
        $this->PayComponents = TableRegistry::get('PayComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayComponents);

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
