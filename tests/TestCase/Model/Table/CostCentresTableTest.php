<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CostCentresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CostCentresTable Test Case
 */
class CostCentresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CostCentresTable
     */
    public $CostCentres;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cost_centres'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CostCentres') ? [] : ['className' => 'App\Model\Table\CostCentresTable'];
        $this->CostCentres = TableRegistry::get('CostCentres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CostCentres);

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
