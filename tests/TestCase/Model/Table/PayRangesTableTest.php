<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayRangesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayRangesTable Test Case
 */
class PayRangesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayRangesTable
     */
    public $PayRanges;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_ranges'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayRanges') ? [] : ['className' => 'App\Model\Table\PayRangesTable'];
        $this->PayRanges = TableRegistry::get('PayRanges', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayRanges);

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
