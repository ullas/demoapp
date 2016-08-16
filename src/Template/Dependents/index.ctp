<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Dependent'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dependents index large-9 medium-8 columns content">
    <h3><?= __('Dependents') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('relationship_type') ?></th>
                <th><?= $this->Paginator->sort('is_accompanying_dependent') ?></th>
                <th><?= $this->Paginator->sort('is_beneficiary') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('middle_name') ?></th>
                <th><?= $this->Paginator->sort('salutation') ?></th>
                <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th><?= $this->Paginator->sort('country_of_birth') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('card_type') ?></th>
                <th><?= $this->Paginator->sort('nationalid') ?></th>
                <th><?= $this->Paginator->sort('is_add_same_as_employee') ?></th>
                <th><?= $this->Paginator->sort('address_number') ?></th>
                <th><?= $this->Paginator->sort('visa') ?></th>
                <th><?= $this->Paginator->sort('visa_issue') ?></th>
                <th><?= $this->Paginator->sort('visa_expiry') ?></th>
                <th><?= $this->Paginator->sort('passport') ?></th>
                <th><?= $this->Paginator->sort('pass_issue') ?></th>
                <th><?= $this->Paginator->sort('pass_expiry') ?></th>
                <th><?= $this->Paginator->sort('employed') ?></th>
                <th><?= $this->Paginator->sort('emp_since') ?></th>
                <th><?= $this->Paginator->sort('employer') ?></th>
                <th><?= $this->Paginator->sort('acco_entitlement') ?></th>
                <th><?= $this->Paginator->sort('legal_nominee') ?></th>
                <th><?= $this->Paginator->sort('degree') ?></th>
                <th><?= $this->Paginator->sort('specialization') ?></th>
                <th><?= $this->Paginator->sort('spouse_emplid') ?></th>
                <th><?= $this->Paginator->sort('leave_passage') ?></th>
                <th><?= $this->Paginator->sort('leave_passage_entitle') ?></th>
                <th><?= $this->Paginator->sort('person_id_external') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dependents as $dependent): ?>
            <tr>
                <td><?= $this->Number->format($dependent->id) ?></td>
                <td><?= h($dependent->relationship_type) ?></td>
                <td><?= h($dependent->is_accompanying_dependent) ?></td>
                <td><?= h($dependent->is_beneficiary) ?></td>
                <td><?= h($dependent->first_name) ?></td>
                <td><?= h($dependent->last_name) ?></td>
                <td><?= h($dependent->middle_name) ?></td>
                <td><?= h($dependent->salutation) ?></td>
                <td><?= h($dependent->date_of_birth) ?></td>
                <td><?= h($dependent->country_of_birth) ?></td>
                <td><?= h($dependent->country) ?></td>
                <td><?= h($dependent->card_type) ?></td>
                <td><?= h($dependent->nationalid) ?></td>
                <td><?= h($dependent->is_add_same_as_employee) ?></td>
                <td><?= h($dependent->address_number) ?></td>
                <td><?= h($dependent->visa) ?></td>
                <td><?= h($dependent->visa_issue) ?></td>
                <td><?= h($dependent->visa_expiry) ?></td>
                <td><?= h($dependent->passport) ?></td>
                <td><?= h($dependent->pass_issue) ?></td>
                <td><?= h($dependent->pass_expiry) ?></td>
                <td><?= h($dependent->employed) ?></td>
                <td><?= h($dependent->emp_since) ?></td>
                <td><?= h($dependent->employer) ?></td>
                <td><?= h($dependent->acco_entitlement) ?></td>
                <td><?= h($dependent->legal_nominee) ?></td>
                <td><?= h($dependent->degree) ?></td>
                <td><?= h($dependent->specialization) ?></td>
                <td><?= $this->Number->format($dependent->spouse_emplid) ?></td>
                <td><?= h($dependent->leave_passage) ?></td>
                <td><?= h($dependent->leave_passage_entitle) ?></td>
                <td><?= h($dependent->person_id_external) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $dependent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $dependent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dependent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $dependent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
