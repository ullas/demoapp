<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpDataPersonalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpDataPersonalsTable Test Case
 */
class EmpDataPersonalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpDataPersonalsTable
     */
    public $EmpDataPersonals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.emp_data_personals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmpDataPersonals') ? [] : ['className' => 'App\Model\Table\EmpDataPersonalsTable'];
        $this->EmpDataPersonals = TableRegistry::get('EmpDataPersonals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmpDataPersonals);

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
