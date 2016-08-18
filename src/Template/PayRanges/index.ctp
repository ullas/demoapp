<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pay Range'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payRanges index large-9 medium-8 columns content">
    <h3><?= __('Pay Ranges') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('currency') ?></th>
                <th><?= $this->Paginator->sort('frequency_code') ?></th>
                <th><?= $this->Paginator->sort('minimum_pay') ?></th>
                <th><?= $this->Paginator->sort('maximum_pay') ?></th>
                <th><?= $this->Paginator->sort('increment') ?></th>
                <th><?= $this->Paginator->sort('incr_percentage') ?></th>
                <th><?= $this->Paginator->sort('mid_point') ?></th>
                <th><?= $this->Paginator->sort('geo_zone') ?></th>
                <th><?= $this->Paginator->sort('pay_group') ?></th>
                <th><?= $this->Paginator->sort('legal_entity') ?></th>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($payRanges as $payRange): ?>
            <tr>
                <td><?= h($payRange->name) ?></td>
                <td><?= h($payRange->description) ?></td>
                <td><?= h($payRange->status) ?></td>
                <td><?= h($payRange->start_date) ?></td>
                <td><?= h($payRange->end_date) ?></td>
                <td><?= h($payRange->currency) ?></td>
                <td><?= h($payRange->frequency_code) ?></td>
                <td><?= $this->Number->format($payRange->minimum_pay) ?></td>
                <td><?= $this->Number->format($payRange->maximum_pay) ?></td>
                <td><?= $this->Number->format($payRange->increment) ?></td>
                <td><?= $this->Number->format($payRange->incr_percentage) ?></td>
                <td><?= $this->Number->format($payRange->mid_point) ?></td>
                <td><?= h($payRange->geo_zone) ?></td>
                <td><?= h($payRange->pay_group) ?></td>
                <td><?= h($payRange->legal_entity) ?></td>
                <td><?= $this->Number->format($payRange->id) ?></td>
                <td><?= h($payRange->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $payRange->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payRange->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payRange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payRange->id)]) ?>
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
