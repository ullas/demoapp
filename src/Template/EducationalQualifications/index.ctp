<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Educational Qualification'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationalQualifications index large-9 medium-8 columns content">
    <h3><?= __('Educational Qualifications') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th><?= $this->Paginator->sort('qualification') ?></th>
                <th><?= $this->Paginator->sort('subject') ?></th>
                <th><?= $this->Paginator->sort('subject2') ?></th>
                <th><?= $this->Paginator->sort('schoolcollege') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('fromdate') ?></th>
                <th><?= $this->Paginator->sort('passdate') ?></th>
                <th><?= $this->Paginator->sort('grade') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($educationalQualifications as $educationalQualification): ?>
            <tr>
                <td><?= $this->Number->format($educationalQualification->id) ?></td>
                <td><?= $educationalQualification->has('employee') ? $this->Html->link($educationalQualification->employee->id, ['controller' => 'Employees', 'action' => 'view', $educationalQualification->employee->id]) : '' ?></td>
                <td><?= h($educationalQualification->qualification) ?></td>
                <td><?= h($educationalQualification->subject) ?></td>
                <td><?= h($educationalQualification->subject2) ?></td>
                <td><?= h($educationalQualification->schoolcollege) ?></td>
                <td><?= h($educationalQualification->city) ?></td>
                <td><?= h($educationalQualification->fromdate) ?></td>
                <td><?= h($educationalQualification->passdate) ?></td>
                <td><?= h($educationalQualification->grade) ?></td>
                <td><?= $educationalQualification->has('customer') ? $this->Html->link($educationalQualification->customer->name, ['controller' => 'Customers', 'action' => 'view', $educationalQualification->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $educationalQualification->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $educationalQualification->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $educationalQualification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationalQualification->id)]) ?>
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
