<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Group'), ['action' => 'edit', $payGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Group'), ['action' => 'delete', $payGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payGroups view large-9 medium-8 columns content">
    <h3><?= h($payGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($payGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payGroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Payment Frequency') ?></th>
            <td><?= h($payGroup->payment_frequency) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Contactid') ?></th>
            <td><?= h($payGroup->primary_contactid) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Contact Email') ?></th>
            <td><?= h($payGroup->primary_contact_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Contact Name') ?></th>
            <td><?= h($payGroup->primary_contact_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contactid') ?></th>
            <td><?= h($payGroup->secondary_contactid) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contact Email') ?></th>
            <td><?= h($payGroup->secondary_contact_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contact Name') ?></th>
            <td><?= h($payGroup->secondary_contact_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Delimiter') ?></th>
            <td><?= h($payGroup->data_delimiter) ?></td>
        </tr>
        <tr>
            <th><?= __('Decimal Point') ?></th>
            <td><?= h($payGroup->decimal_point) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payGroup->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payGroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weeks In Pay Period') ?></th>
            <td><?= $this->Number->format($payGroup->weeks_in_pay_period) ?></td>
        </tr>
        <tr>
            <th><?= __('Lag') ?></th>
            <td><?= $this->Number->format($payGroup->lag) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($payGroup->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($payGroup->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Earliest Change Date') ?></th>
            <td><?= h($payGroup->earliest_change_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $payGroup->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
