<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PayrollDataTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PayrollDataTable Test Case
 */
class PayrollDataTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PayrollDataTable
     */
    public $PayrollData;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.payroll_data',
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
        'app.payroll_record',
        'app.pay_groups',
        'app.pay_ranges',
        'app.payroll_result',
        'app.payroll_status',
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
        'app.empdatapersonals',
        'app.employmentinfos',
        'app.experiences',
        'app.identities',
        'app.office_assets',
        'app.skills',
        'app.corporate_addresses',
        'app.dependents',
        'app.event_reasons',
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
        $config = TableRegistry::exists('PayrollData') ? [] : ['className' => 'App\Model\Table\PayrollDataTable'];
        $this->PayrollData = TableRegistry::get('PayrollData', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PayrollData);

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
