<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayGradesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayGradesTable Test Case
 */
class PayGradesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayGradesTable
     */
    public $PayGrades;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_grades'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayGrades') ? [] : ['className' => 'App\Model\Table\PayGradesTable'];
        $this->PayGrades = TableRegistry::get('PayGrades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayGrades);

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
