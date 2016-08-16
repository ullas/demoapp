<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Business Unit'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="businessUnits index large-9 medium-8 columns content">
    <h3><?= __('Business Units') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('head_of_unit') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($businessUnits as $businessUnit): ?>
            <tr>
                <td><?= $this->Number->format($businessUnit->id) ?></td>
                <td><?= h($businessUnit->name) ?></td>
                <td><?= h($businessUnit->description) ?></td>
                <td><?= h($businessUnit->effective_status) ?></td>
                <td><?= h($businessUnit->effective_start_date) ?></td>
                <td><?= h($businessUnit->effective_end_date) ?></td>
                <td><?= h($businessUnit->external_code) ?></td>
                <td><?= $this->Number->format($businessUnit->head_of_unit) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $businessUnit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $businessUnit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $businessUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessUnit->id)]) ?>
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
