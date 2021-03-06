<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Contact Info'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contactInfos index large-9 medium-8 columns content">
    <h3><?= __('Contact Infos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('mobile') ?></th>
                <th><?= $this->Paginator->sort('email_address1') ?></th>
                <th><?= $this->Paginator->sort('email_address2') ?></th>
                <th><?= $this->Paginator->sort('facebook') ?></th>
                <th><?= $this->Paginator->sort('linkedin') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactInfos as $contactInfo): ?>
            <tr>
                <td><?= $this->Number->format($contactInfo->id) ?></td>
                <td><?= h($contactInfo->phone) ?></td>
                <td><?= h($contactInfo->mobile) ?></td>
                <td><?= h($contactInfo->email_address1) ?></td>
                <td><?= h($contactInfo->email_address2) ?></td>
                <td><?= h($contactInfo->facebook) ?></td>
                <td><?= h($contactInfo->linkedin) ?></td>
                <td><?= $contactInfo->has('customer') ? $this->Html->link($contactInfo->customer->name, ['controller' => 'Customers', 'action' => 'view', $contactInfo->customer->id]) : '' ?></td>
                <td><?= $contactInfo->has('employee') ? $this->Html->link($contactInfo->employee->id, ['controller' => 'Employees', 'action' => 'view', $contactInfo->employee->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $contactInfo->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $contactInfo->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $contactInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactInfo->id)]) ?>
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
