<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Experience'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="experiences index large-9 medium-8 columns content">
    <h3><?= __('Experiences') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('designation') ?></th>
                <th><?= $this->Paginator->sort('industry') ?></th>
                <th><?= $this->Paginator->sort('function') ?></th>
                <th><?= $this->Paginator->sort('employer') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('fromdate') ?></th>
                <th><?= $this->Paginator->sort('todate') ?></th>
                <th><?= $this->Paginator->sort('contract') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($experiences as $experience): ?>
            <tr>
                <td><?= $experience->has('employee') ? $this->Html->link($experience->employee->id, ['controller' => 'Employees', 'action' => 'view', $experience->employee->id]) : '' ?></td>
                <td><?= $experience->has('customer') ? $this->Html->link($experience->customer->name, ['controller' => 'Customers', 'action' => 'view', $experience->customer->id]) : '' ?></td>
                <td><?= h($experience->designation) ?></td>
                <td><?= h($experience->industry) ?></td>
                <td><?= h($experience->function) ?></td>
                <td><?= h($experience->employer) ?></td>
                <td><?= h($experience->city) ?></td>
                <td><?= h($experience->country) ?></td>
                <td><?= h($experience->fromdate) ?></td>
                <td><?= h($experience->todate) ?></td>
                <td><?= h($experience->contract) ?></td>
                <td><?= $this->Number->format($experience->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $experience->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $experience->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $experience->id], ['confirm' => __('Are you sure you want to delete # {0}?', $experience->id)]) ?>
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
