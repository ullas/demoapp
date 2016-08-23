<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DependentsFixture
 *
 */
class DependentsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'autoIncrement' => true, 'default' => null, 'null' => false, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'relationship_type' => ['type' => 'string', 'length' => 30, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'is_accompanying_dependent' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'is_beneficiary' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'first_name' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'last_name' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'middle_name' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'salutation' => ['type' => 'string', 'length' => 128, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'date_of_birth' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'country_of_birth' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'country' => ['type' => 'string', 'length' => 100, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'card_type' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'nationalid' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'is_add_same_as_employee' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'address_number' => ['type' => 'string', 'length' => null, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'visa' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'visa_issue' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'visa_expiry' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'passport' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'pass_issue' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'pass_expiry' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'employed' => ['type' => 'boolean', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'emp_since' => ['type' => 'date', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null],
        'employer' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'acco_entitlement' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'legal_nominee' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'degree' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'specialization' => ['type' => 'string', 'length' => 256, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'spouse_emplid' => ['type' => 'decimal', 'length' => null, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null],
        'leave_passage' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'leave_passage_entitle' => ['type' => 'string', 'length' => 60, 'default' => null, 'null' => true, 'collate' => null, 'comment' => null, 'precision' => null, 'fixed' => null],
        'emp_data_biographies_id' => ['type' => 'biginteger', 'length' => 20, 'default' => null, 'null' => true, 'comment' => null, 'precision' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'dependents_emp_data_biographies_id_fkey' => ['type' => 'foreign', 'columns' => ['emp_data_biographies_id'], 'references' => ['emp_data_biographies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'relationship_type' => 'Lorem ipsum dolor sit amet',
            'is_accompanying_dependent' => 1,
            'is_beneficiary' => 1,
            'first_name' => 'Lorem ipsum dolor sit amet',
            'last_name' => 'Lorem ipsum dolor sit amet',
            'middle_name' => 'Lorem ipsum dolor sit amet',
            'salutation' => 'Lorem ipsum dolor sit amet',
            'date_of_birth' => '2016-08-23',
            'country_of_birth' => 'Lorem ipsum dolor sit amet',
            'country' => 'Lorem ipsum dolor sit amet',
            'card_type' => 'Lorem ipsum dolor sit amet',
            'nationalid' => 'Lorem ipsum dolor sit amet',
            'is_add_same_as_employee' => 1,
            'address_number' => 'Lorem ipsum dolor sit amet',
            'visa' => 'Lorem ipsum dolor sit amet',
            'visa_issue' => '2016-08-23',
            'visa_expiry' => '2016-08-23',
            'passport' => 'Lorem ipsum dolor sit amet',
            'pass_issue' => '2016-08-23',
            'pass_expiry' => '2016-08-23',
            'employed' => 1,
            'emp_since' => '2016-08-23',
            'employer' => 'Lorem ipsum dolor sit amet',
            'acco_entitlement' => 'Lorem ipsum dolor sit amet',
            'legal_nominee' => 'Lorem ipsum dolor sit amet',
            'degree' => 'Lorem ipsum dolor sit amet',
            'specialization' => 'Lorem ipsum dolor sit amet',
            'spouse_emplid' => 1.5,
            'leave_passage' => 'Lorem ipsum dolor sit amet',
            'leave_passage_entitle' => 'Lorem ipsum dolor sit amet',
            'emp_data_biographies_id' => 1
        ],
    ];
}
