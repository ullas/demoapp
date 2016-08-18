<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Division'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="divisions index large-9 medium-8 columns content">
    <h3><?= __('Divisions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('parent_division') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('head_of_unit') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($divisions as $division): ?>
            <tr>
                <td><?= $this->Number->format($division->id) ?></td>
                <td><?= h($division->name) ?></td>
                <td><?= h($division->description) ?></td>
                <td><?= h($division->effective_status) ?></td>
                <td><?= h($division->effective_start_date) ?></td>
                <td><?= h($division->effective_end_date) ?></td>
                <td><?= h($division->parent_division) ?></td>
                <td><?= h($division->external_code) ?></td>
                <td><?= $this->Number->format($division->head_of_unit) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $division->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $division->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $division->id], ['confirm' => __('Are you sure you want to delete # {0}?', $division->id)]) ?>
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
