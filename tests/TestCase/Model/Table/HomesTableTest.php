<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HomesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HomesTable Test Case
 */
class HomesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HomesTable
     */
    public $Homes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.homes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Homes') ? [] : ['className' => 'App\Model\Table\HomesTable'];
        $this->Homes = TableRegistry::get('Homes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Homes);

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
