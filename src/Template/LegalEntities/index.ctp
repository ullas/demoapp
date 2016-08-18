<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Legal Entity'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Groups'), ['controller' => 'PayGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Group'), ['controller' => 'PayGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="legalEntities index large-9 medium-8 columns content">
    <h3><?= __('Legal Entities') ?></h3>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('country_of_registration') ?></th>
                <th><?= $this->Paginator->sort('standard_weekly_hours') ?></th>
                <th><?= $this->Paginator->sort('currency') ?></th>
                <th><?= $this->Paginator->sort('official_language') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('paygroup_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($legalEntities as $legalEntity): ?>
            <tr>
                <td><?= $this->Number->format($legalEntity->id) ?></td>
                <td><?= h($legalEntity->name) ?></td>
                <td><?= h($legalEntity->description) ?></td>
                <td><?= h($legalEntity->effective_status) ?></td>
                <td><?= h($legalEntity->effective_start_date) ?></td>
                <td><?= h($legalEntity->effective_end_date) ?></td>
                <td><?= $this->Country->get_country_name(h($legalEntity->country_of_registration)) ?></td>
                <td><?= $this->Number->format($legalEntity->standard_weekly_hours) ?></td>
                <td><?= $this->Number->format($legalEntity->currency) ?></td>
                <td><?= $this->Language->get_language_name(h($legalEntity->official_language)) ?></td>
                <td><?= h($legalEntity->external_code) ?></td>
                <td><?= $legalEntity->has('location') ? $this->Html->link($legalEntity->location->name, ['controller' => 'Locations', 'action' => 'view', $legalEntity->location->id]) : '' ?></td>
                <td><?= $legalEntity->has('pay_group') ? $this->Html->link($legalEntity->pay_group->name, ['controller' => 'PayGroups', 'action' => 'view', $legalEntity->pay_group->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $legalEntity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $legalEntity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $legalEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $legalEntity->id)]) ?>
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
