<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Range'), ['action' => 'edit', $payRange->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Range'), ['action' => 'delete', $payRange->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payRange->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Ranges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Range'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payRanges view large-9 medium-8 columns content">
    <h3><?= h($payRange->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($payRange->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payRange->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($payRange->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= h($payRange->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Frequency Code') ?></th>
            <td><?= h($payRange->frequency_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Geo Zone') ?></th>
            <td><?= h($payRange->geo_zone) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Group') ?></th>
            <td><?= h($payRange->pay_group) ?></td>
        </tr>
        <tr>
            <th><?= __('Legal Entity') ?></th>
            <td><?= h($payRange->legal_entity) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payRange->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Minimum Pay') ?></th>
            <td><?= $this->Number->format($payRange->minimum_pay) ?></td>
        </tr>
        <tr>
            <th><?= __('Maximum Pay') ?></th>
            <td><?= $this->Number->format($payRange->maximum_pay) ?></td>
        </tr>
        <tr>
            <th><?= __('Increment') ?></th>
            <td><?= $this->Number->format($payRange->increment) ?></td>
        </tr>
        <tr>
            <th><?= __('Incr Percentage') ?></th>
            <td><?= $this->Number->format($payRange->incr_percentage) ?></td>
        </tr>
        <tr>
            <th><?= __('Mid Point') ?></th>
            <td><?= $this->Number->format($payRange->mid_point) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payRange->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($payRange->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($payRange->end_date) ?></td>
        </tr>
    </table>
</div>
