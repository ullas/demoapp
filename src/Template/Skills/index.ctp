<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="skills index large-9 medium-8 columns content">
    <h3><?= __('Skills') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('skill') ?></th>
                <th><?= $this->Paginator->sort('skillgroup') ?></th>
                <th><?= $this->Paginator->sort('proficiency') ?></th>
                <th><?= $this->Paginator->sort('fromdate') ?></th>
                <th><?= $this->Paginator->sort('todate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($skills as $skill): ?>
            <tr>
                <td><?= $this->Number->format($skill->id) ?></td>
                <td><?= $skill->has('employee') ? $this->Html->link($skill->employee->id, ['controller' => 'Employees', 'action' => 'view', $skill->employee->id]) : '' ?></td>
                <td><?= $skill->has('customer') ? $this->Html->link($skill->customer->name, ['controller' => 'Customers', 'action' => 'view', $skill->customer->id]) : '' ?></td>
                <td><?= h($skill->skill) ?></td>
                <td><?= h($skill->skillgroup) ?></td>
                <td><?= h($skill->proficiency) ?></td>
                <td><?= h($skill->fromdate) ?></td>
                <td><?= h($skill->todate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $skill->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $skill->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?>
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
