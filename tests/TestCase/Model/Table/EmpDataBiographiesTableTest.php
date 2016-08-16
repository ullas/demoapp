<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpDataBiographiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpDataBiographiesTable Test Case
 */
class EmpDataBiographiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpDataBiographiesTable
     */
    public $EmpDataBiographies;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emp_data_biographies'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmpDataBiographies') ? [] : ['className' => 'App\Model\Table\EmpDataBiographiesTable'];
        $this->EmpDataBiographies = TableRegistry::get('EmpDataBiographies', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmpDataBiographies);

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
