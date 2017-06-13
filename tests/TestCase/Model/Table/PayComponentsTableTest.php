<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayComponentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayComponentsTable Test Case
 */
class PayComponentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayComponentsTable
     */
    public $PayComponents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pay_components',
        'app.frequencies',
        'app.customers',
        'app.addresses',
        'app.employees',
        'app.contact_infos',
        'app.educational_qualifications',
        'app.empdatabiographies',
        'app.positions',
        'app.legal_entities',
        'app.locations',
        'app.holiday_calendars',
        'app.calendar_assignments',
        'app.users',
        'app.notes',
        'app.holidays',
        'app.jobinfos',
        'app.jobs',
        'app.jobfunctions',
        'app.job_classes',
        'app.pay_grades',
        'app.job_functions',
        'app.jobclasses',
        'app.business_units',
        'app.divisions',
        'app.payroll_area',
        'app.cost_centres',
        'app.departments',
        'app.time_type_profiles',
        'app.time_type_profile_time_types',
        'app.time_types',
        'app.time_account_types',
        'app.pay_component_groups',
        'app.workflowrules',
        'app.workflowactions',
        'app.workflows',
        'app.emp_data_biographies',
        'app.employee_absencerecords',
        'app.workflows_history',
        'app.work_schedules',
        'app.pay_groups',
        'app.pay_ranges',
        'app.payroll_record',
        'app.payroll_result',
        'app.payroll_status',
        'app.empdatapersonals',
        'app.employmentinfos',
        'app.experiences',
        'app.identities',
        'app.office_assets',
        'app.skills',
        'app.corporate_addresses',
        'app.dependents',
        'app.event_reasons',
        'app.payroll_data',
        'app.picklists',
        'app.profiles',
        'app.regions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PayComponents') ? [] : ['className' => 'App\Model\Table\PayComponentsTable'];
        $this->PayComponents = TableRegistry::get('PayComponents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayComponents);

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
     * Test beforeMarshal method
     *
     * @return void
     */
    public function testBeforeMarshal()
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
