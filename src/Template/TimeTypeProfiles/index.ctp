<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Time Type Profile'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeTypeProfiles index large-9 medium-8 columns content">
    <h3><?= __('Time Type Profiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('time_rec_variant') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('time_type') ?></th>
                <th><?= $this->Paginator->sort('enable_ess') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeTypeProfiles as $timeTypeProfile): ?>
            <tr>
                <td><?= $this->Number->format($timeTypeProfile->id) ?></td>
                <td><?= h($timeTypeProfile->code) ?></td>
                <td><?= h($timeTypeProfile->name) ?></td>
                <td><?= h($timeTypeProfile->country) ?></td>
                <td><?= h($timeTypeProfile->start_date) ?></td>
                <td><?= h($timeTypeProfile->time_rec_variant) ?></td>
                <td><?= h($timeTypeProfile->status) ?></td>
                <td><?= h($timeTypeProfile->time_type) ?></td>
                <td><?= h($timeTypeProfile->enable_ess) ?></td>
                <td><?= h($timeTypeProfile->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timeTypeProfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeTypeProfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeTypeProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTypeProfile->id)]) ?>
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
