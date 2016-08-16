<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cost Centre'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="costCentres index large-9 medium-8 columns content">
    <h3><?= __('Cost Centres') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('parent_cost_center') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('cost_center_manager') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($costCentres as $costCentre): ?>
            <tr>
                <td><?= $this->Number->format($costCentre->id) ?></td>
                <td><?= h($costCentre->name) ?></td>
                <td><?= h($costCentre->description) ?></td>
                <td><?= h($costCentre->effective_status) ?></td>
                <td><?= h($costCentre->effective_start_date) ?></td>
                <td><?= h($costCentre->effective_end_date) ?></td>
                <td><?= h($costCentre->parent_cost_center) ?></td>
                <td><?= h($costCentre->external_code) ?></td>
                <td><?= $this->Number->format($costCentre->cost_center_manager) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $costCentre->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $costCentre->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $costCentre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costCentre->id)]) ?>
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
