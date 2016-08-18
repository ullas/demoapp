<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Picklist'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="picklists index large-9 medium-8 columns content">
    <h3><?= __('Picklists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('comments') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($picklists as $picklist): ?>
            <tr>
                <td><?= $this->Number->format($picklist->id) ?></td>
                <td><?= h($picklist->description) ?></td>
                <td><?= h($picklist->comments) ?></td>
                <td><?= h($picklist->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $picklist->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $picklist->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $picklist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picklist->id)]) ?>
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