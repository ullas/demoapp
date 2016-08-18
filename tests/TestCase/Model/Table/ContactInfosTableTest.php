<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactInfosTable Test Case
 */
class ContactInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ContactInfosTable
     */
    public $ContactInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contact_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContactInfos') ? [] : ['className' => 'App\Model\Table\ContactInfosTable'];
        $this->ContactInfos = TableRegistry::get('ContactInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContactInfos);

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
