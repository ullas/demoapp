<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Identity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="identities index large-9 medium-8 columns content">
    <h3><?= __('Identities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('card_type') ?></th>
                <th><?= $this->Paginator->sort('nationalid') ?></th>
                <th><?= $this->Paginator->sort('is_primary') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($identities as $identity): ?>
            <tr>
                <td><?= $this->Number->format($identity->id) ?></td>
                <td><?= h($identity->country) ?></td>
                <td><?= h($identity->card_type) ?></td>
                <td><?= h($identity->nationalid) ?></td>
                <td><?= h($identity->is_primary) ?></td>
                <td><?= $identity->has('customer') ? $this->Html->link($identity->customer->name, ['controller' => 'Customers', 'action' => 'view', $identity->customer->id]) : '' ?></td>
                <td><?= $identity->has('employee') ? $this->Html->link($identity->employee->id, ['controller' => 'Employees', 'action' => 'view', $identity->employee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $identity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $identity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $identity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $identity->id)]) ?>
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
