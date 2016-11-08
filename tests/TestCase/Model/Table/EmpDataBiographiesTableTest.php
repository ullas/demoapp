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
        'app.emp_data_biographies',
        'app.customers',
        'app.addresses',
        'app.business_units',
        'app.calendar_assignments',
        'app.users',
        'app.holidays',
        'app.contact_infos',
        'app.corporate_addresses',
        'app.cost_centres',
        'app.departments',
        'app.dependents',
        'app.divisions',
        'app.emp_data_personals',
        'app.employees',
        'app.employment_infos',
        'app.event_reasons',
        'app.frequencies',
        'app.pay_components',
        'app.time_account_types',
        'app.pay_component_groups',
        'app.holiday_calendars',
        'app.ids',
        'app.job_classes',
        'app.pay_grades',
        'app.job_functions',
        'app.jobs',
        'app.job_infos',
        'app.legal_entities',
        'app.locations',
        'app.pay_groups',
        'app.pay_ranges',
        'app.picklists',
        'app.positions',
        'app.regions',
        'app.time_type_profiles',
        'app.time_types',
        'app.work_schedules'
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
