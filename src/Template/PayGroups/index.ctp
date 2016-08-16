<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pay Group'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payGroups index large-9 medium-8 columns content">
    <h3><?= __('Pay Groups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('earliest_change_date') ?></th>
                <th><?= $this->Paginator->sort('payment_frequency') ?></th>
                <th><?= $this->Paginator->sort('primary_contactid') ?></th>
                <th><?= $this->Paginator->sort('primary_contact_email') ?></th>
                <th><?= $this->Paginator->sort('primary_contact_name') ?></th>
                <th><?= $this->Paginator->sort('secondary_contactid') ?></th>
                <th><?= $this->Paginator->sort('secondary_contact_email') ?></th>
                <th><?= $this->Paginator->sort('secondary_contact_name') ?></th>
                <th><?= $this->Paginator->sort('weeks_in_pay_period') ?></th>
                <th><?= $this->Paginator->sort('data_delimiter') ?></th>
                <th><?= $this->Paginator->sort('decimal_point') ?></th>
                <th><?= $this->Paginator->sort('lag') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payGroups as $payGroup): ?>
            <tr>
                <td><?= $this->Number->format($payGroup->id) ?></td>
                <td><?= h($payGroup->name) ?></td>
                <td><?= h($payGroup->description) ?></td>
                <td><?= h($payGroup->effective_status) ?></td>
                <td><?= h($payGroup->effective_start_date) ?></td>
                <td><?= h($payGroup->effective_end_date) ?></td>
                <td><?= h($payGroup->earliest_change_date) ?></td>
                <td><?= h($payGroup->payment_frequency) ?></td>
                <td><?= h($payGroup->primary_contactid) ?></td>
                <td><?= h($payGroup->primary_contact_email) ?></td>
                <td><?= h($payGroup->primary_contact_name) ?></td>
                <td><?= h($payGroup->secondary_contactid) ?></td>
                <td><?= h($payGroup->secondary_contact_email) ?></td>
                <td><?= h($payGroup->secondary_contact_name) ?></td>
                <td><?= $this->Number->format($payGroup->weeks_in_pay_period) ?></td>
                <td><?= h($payGroup->data_delimiter) ?></td>
                <td><?= h($payGroup->decimal_point) ?></td>
                <td><?= $this->Number->format($payGroup->lag) ?></td>
                <td><?= h($payGroup->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payGroup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payGroup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payGroup->id)]) ?>
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
