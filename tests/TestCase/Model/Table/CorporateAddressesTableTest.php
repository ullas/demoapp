<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorporateAddressesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorporateAddressesTable Test Case
 */
class CorporateAddressesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorporateAddressesTable
     */
    public $CorporateAddresses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.corporate_addresses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CorporateAddresses') ? [] : ['className' => 'App\Model\Table\CorporateAddressesTable'];
        $this->CorporateAddresses = TableRegistry::get('CorporateAddresses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CorporateAddresses);

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
