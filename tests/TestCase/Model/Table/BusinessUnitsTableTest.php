<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BusinessunitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BusinessunitsTable Test Case
 */
class BusinessunitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BusinessunitsTable
     */
    public $Businessunits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.businessunits'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Businessunits') ? [] : ['className' => 'App\Model\Table\BusinessunitsTable'];
        $this->Businessunits = TableRegistry::get('Businessunits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Businessunits);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
