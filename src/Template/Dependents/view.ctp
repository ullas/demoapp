<section class="content-header">
  <h1>
    Dependents
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table class="table table-hover">
        <tr>
            <th><?= __('Relationship Type') ?></th>
            <td><?= h($dependent->relationship_type) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($dependent->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($dependent->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Middle Name') ?></th>
            <td><?= h($dependent->middle_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Salutation') ?></th>
            <td><?= h($dependent->salutation) ?></td>
        </tr>
        <tr>
            <th><?= __('Country Of Birth') ?></th>
            <td><?= h($dependent->country_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($dependent->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Card Type') ?></th>
            <td><?= h($dependent->card_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationalid') ?></th>
            <td><?= h($dependent->nationalid) ?></td>
        </tr>
        <tr>
            <th><?= __('Address Number') ?></th>
            <td><?= h($dependent->address_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Visa') ?></th>
            <td><?= h($dependent->visa) ?></td>
        </tr>
        <tr>
            <th><?= __('Passport') ?></th>
            <td><?= h($dependent->passport) ?></td>
        </tr>
        <tr>
            <th><?= __('Employer') ?></th>
            <td><?= h($dependent->employer) ?></td>
        </tr>
        <tr>
            <th><?= __('Acco Entitlement') ?></th>
            <td><?= h($dependent->acco_entitlement) ?></td>
        </tr>
        <tr>
            <th><?= __('Legal Nominee') ?></th>
            <td><?= h($dependent->legal_nominee) ?></td>
        </tr>
        <tr>
            <th><?= __('Degree') ?></th>
            <td><?= h($dependent->degree) ?></td>
        </tr>
        <tr>
            <th><?= __('Specialization') ?></th>
            <td><?= h($dependent->specialization) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Passage') ?></th>
            <td><?= h($dependent->leave_passage) ?></td>
        </tr>
        <tr>
            <th><?= __('Leave Passage Entitle') ?></th>
            <td><?= h($dependent->leave_passage_entitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($dependent->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Spouse Emplid') ?></th>
            <td><?= $this->Number->format($dependent->spouse_emplid) ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Biographies Id') ?></th>
            <td><?= $this->Number->format($dependent->emp_data_biographies_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($dependent->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Visa Issue') ?></th>
            <td><?= h($dependent->visa_issue) ?></td>
        </tr>
        <tr>
            <th><?= __('Visa Expiry') ?></th>
            <td><?= h($dependent->visa_expiry) ?></td>
        </tr>
        <tr>
            <th><?= __('Pass Issue') ?></th>
            <td><?= h($dependent->pass_issue) ?></td>
        </tr>
        <tr>
            <th><?= __('Pass Expiry') ?></th>
            <td><?= h($dependent->pass_expiry) ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Since') ?></th>
            <td><?= h($dependent->emp_since) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Accompanying Dependent') ?></th>
            <td><?= $dependent->is_accompanying_dependent ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Beneficiary') ?></th>
            <td><?= $dependent->is_beneficiary ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Add Same As Employee') ?></th>
            <td><?= $dependent->is_add_same_as_employee ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Employed') ?></th>
            <td><?= $dependent->employed ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
