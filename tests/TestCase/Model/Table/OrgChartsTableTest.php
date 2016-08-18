<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrgChartsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrgChartsTable Test Case
 */
class OrgChartsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrgChartsTable
     */
    public $OrgCharts;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.org_charts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrgCharts') ? [] : ['className' => 'App\Model\Table\OrgChartsTable'];
        $this->OrgCharts = TableRegistry::get('OrgCharts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrgCharts);

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
