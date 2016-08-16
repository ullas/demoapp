<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Frequency'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="frequencies index large-9 medium-8 columns content">
    <h3><?= __('Frequencies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('annualization_factor') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($frequencies as $frequency): ?>
            <tr>
                <td><?= $this->Number->format($frequency->id) ?></td>
                <td><?= h($frequency->name) ?></td>
                <td><?= h($frequency->description) ?></td>
                <td><?= $this->Number->format($frequency->annualization_factor) ?></td>
                <td><?= h($frequency->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $frequency->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $frequency->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $frequency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frequency->id)]) ?>
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
