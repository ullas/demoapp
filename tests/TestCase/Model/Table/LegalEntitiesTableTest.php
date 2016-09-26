<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LegalEntitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LegalEntitiesTable Test Case
 */
class LegalEntitiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LegalEntitiesTable
     */
    public $LegalEntities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.legal_entities',
        'app.locations',
        'app.customers',
        'app.pay_groups',
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
        $config = TableRegistry::exists('LegalEntities') ? [] : ['className' => 'App\Model\Table\LegalEntitiesTable'];
        $this->LegalEntities = TableRegistry::get('LegalEntities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LegalEntities);

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
