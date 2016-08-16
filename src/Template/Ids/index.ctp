<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Id'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ids index large-9 medium-8 columns content">
    <h3><?= __('Ids') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('card_type') ?></th>
                <th><?= $this->Paginator->sort('nationalid') ?></th>
                <th><?= $this->Paginator->sort('is_primary') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ids as $id): ?>
            <tr>
                <td><?= $this->Number->format($id->id) ?></td>
                <td><?= h($id->country) ?></td>
                <td><?= h($id->card_type) ?></td>
                <td><?= h($id->nationalid) ?></td>
                <td><?= h($id->is_primary) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $id->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $id->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $id->id], ['confirm' => __('Are you sure you want to delete # {0}?', $id->id)]) ?>
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
