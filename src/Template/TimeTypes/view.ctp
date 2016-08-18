<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Type'), ['action' => 'edit', $timeType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Type'), ['action' => 'delete', $timeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeTypes view large-9 medium-8 columns content">
    <h3><?= h($timeType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($timeType->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Classification') ?></th>
            <td><?= h($timeType->classification) ?></td>
        </tr>
        <tr>
            <th><?= __('Workflow') ?></th>
            <td><?= h($timeType->workflow) ?></td>
        </tr>
        <tr>
            <th><?= __('Calc Base') ?></th>
            <td><?= h($timeType->calc_base) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Acc Type') ?></th>
            <td><?= h($timeType->time_acc_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Take Rule') ?></th>
            <td><?= h($timeType->take_rule) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($timeType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= $this->Number->format($timeType->unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Fractions Days') ?></th>
            <td><?= $this->Number->format($timeType->perm_fractions_days) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Fractions Hours') ?></th>
            <td><?= $this->Number->format($timeType->perm_fractions_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Flex Req Allow') ?></th>
            <td><?= $timeType->flex_req_allow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
