<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Account Type'), ['action' => 'edit', $timeAccountType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Account Type'), ['action' => 'delete', $timeAccountType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeAccountType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Account Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Account Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeAccountTypes view large-9 medium-8 columns content">
    <h3><?= h($timeAccountType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeAccountType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= h($timeAccountType->unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Reccur') ?></th>
            <td><?= h($timeAccountType->perm_reccur) ?></td>
        </tr>
        <tr>
            <th><?= __('Freq Period') ?></th>
            <td><?= h($timeAccountType->freq_period) ?></td>
        </tr>
        <tr>
            <th><?= __('Accrual Base') ?></th>
            <td><?= h($timeAccountType->accrual_base) ?></td>
        </tr>
        <tr>
            <th><?= __('Posting Order') ?></th>
            <td><?= h($timeAccountType->posting_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Time To Accrual Unit') ?></th>
            <td><?= h($timeAccountType->time_to_accrual_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Update Rule') ?></th>
            <td><?= h($timeAccountType->update_rule) ?></td>
        </tr>
        <tr>
            <th><?= __('Payout Eligiblity') ?></th>
            <td><?= h($timeAccountType->payout_eligiblity) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Comp Group') ?></th>
            <td><?= h($timeAccountType->pay_comp_group) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Comp') ?></th>
            <td><?= h($timeAccountType->pay_comp) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($timeAccountType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeAccountType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Account Booking Off') ?></th>
            <td><?= $this->Number->format($timeAccountType->account_booking_off) ?></td>
        </tr>
        <tr>
            <th><?= __('First Offset') ?></th>
            <td><?= $this->Number->format($timeAccountType->first_offset) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Accrual') ?></th>
            <td><?= $this->Number->format($timeAccountType->start_accrual) ?></td>
        </tr>
        <tr>
            <th><?= __('Min Balance') ?></th>
            <td><?= $this->Number->format($timeAccountType->min_balance) ?></td>
        </tr>
        <tr>
            <th><?= __('Time To Accrual') ?></th>
            <td><?= $this->Number->format($timeAccountType->time_to_accrual) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($timeAccountType->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From') ?></th>
            <td><?= h($timeAccountType->valid_from) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From Day') ?></th>
            <td><?= h($timeAccountType->valid_from_day) ?></td>
        </tr>
        <tr>
            <th><?= __('Proration Used') ?></th>
            <td><?= $timeAccountType->proration_used ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Rounding Used') ?></th>
            <td><?= $timeAccountType->rounding_used ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
