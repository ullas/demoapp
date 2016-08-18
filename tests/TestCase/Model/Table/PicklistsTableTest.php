<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PicklistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PicklistsTable Test Case
 */
class PicklistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PicklistsTable
     */
    public $Picklists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.picklists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Picklists') ? [] : ['className' => 'App\Model\Table\PicklistsTable'];
        $this->Picklists = TableRegistry::get('Picklists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Picklists);

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
