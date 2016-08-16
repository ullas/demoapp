<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Time Account Type'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeAccountTypes index large-9 medium-8 columns content">
    <h3><?= __('Time Account Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('unit') ?></th>
                <th><?= $this->Paginator->sort('perm_reccur') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('valid_from') ?></th>
                <th><?= $this->Paginator->sort('valid_from_day') ?></th>
                <th><?= $this->Paginator->sort('account_booking_off') ?></th>
                <th><?= $this->Paginator->sort('freq_period') ?></th>
                <th><?= $this->Paginator->sort('first_offset') ?></th>
                <th><?= $this->Paginator->sort('start_accrual') ?></th>
                <th><?= $this->Paginator->sort('accrual_base') ?></th>
                <th><?= $this->Paginator->sort('min_balance') ?></th>
                <th><?= $this->Paginator->sort('posting_order') ?></th>
                <th><?= $this->Paginator->sort('time_to_accrual') ?></th>
                <th><?= $this->Paginator->sort('time_to_accrual_unit') ?></th>
                <th><?= $this->Paginator->sort('proration_used') ?></th>
                <th><?= $this->Paginator->sort('rounding_used') ?></th>
                <th><?= $this->Paginator->sort('update_rule') ?></th>
                <th><?= $this->Paginator->sort('payout_eligiblity') ?></th>
                <th><?= $this->Paginator->sort('pay_comp_group') ?></th>
                <th><?= $this->Paginator->sort('pay_comp') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($timeAccountTypes as $timeAccountType): ?>
            <tr>
                <td><?= $this->Number->format($timeAccountType->id) ?></td>
                <td><?= h($timeAccountType->name) ?></td>
                <td><?= h($timeAccountType->unit) ?></td>
                <td><?= h($timeAccountType->perm_reccur) ?></td>
                <td><?= h($timeAccountType->start_date) ?></td>
                <td><?= h($timeAccountType->valid_from) ?></td>
                <td><?= h($timeAccountType->valid_from_day) ?></td>
                <td><?= $this->Number->format($timeAccountType->account_booking_off) ?></td>
                <td><?= h($timeAccountType->freq_period) ?></td>
                <td><?= $this->Number->format($timeAccountType->first_offset) ?></td>
                <td><?= $this->Number->format($timeAccountType->start_accrual) ?></td>
                <td><?= h($timeAccountType->accrual_base) ?></td>
                <td><?= $this->Number->format($timeAccountType->min_balance) ?></td>
                <td><?= h($timeAccountType->posting_order) ?></td>
                <td><?= $this->Number->format($timeAccountType->time_to_accrual) ?></td>
                <td><?= h($timeAccountType->time_to_accrual_unit) ?></td>
                <td><?= h($timeAccountType->proration_used) ?></td>
                <td><?= h($timeAccountType->rounding_used) ?></td>
                <td><?= h($timeAccountType->update_rule) ?></td>
                <td><?= h($timeAccountType->payout_eligiblity) ?></td>
                <td><?= h($timeAccountType->pay_comp_group) ?></td>
                <td><?= h($timeAccountType->pay_comp) ?></td>
                <td><?= h($timeAccountType->code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $timeAccountType->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $timeAccountType->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $timeAccountType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeAccountType->id)]) ?>
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
