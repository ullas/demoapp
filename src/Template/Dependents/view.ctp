<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Dependent'), ['action' => 'edit', $dependent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Dependent'), ['action' => 'delete', $dependent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dependent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Dependents'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Dependent'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="dependents view large-9 medium-8 columns content">
    <h3><?= h($dependent->id) ?></h3>
    <table class="vertical-table">
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
            <th><?= __('Person Id External') ?></th>
            <td><?= h($dependent->person_id_external) ?></td>
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
</div>
