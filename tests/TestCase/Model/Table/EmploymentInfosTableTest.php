<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmploymentInfosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmploymentInfosTable Test Case
 */
class EmploymentInfosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EmploymentInfosTable
     */
    public $EmploymentInfos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.employment_infos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EmploymentInfos') ? [] : ['className' => 'App\Model\Table\EmploymentInfosTable'];
        $this->EmploymentInfos = TableRegistry::get('EmploymentInfos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EmploymentInfos);

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
