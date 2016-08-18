<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Type Profile'), ['action' => 'edit', $timeTypeProfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Type Profile'), ['action' => 'delete', $timeTypeProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTypeProfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type Profile'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeTypeProfiles view large-9 medium-8 columns content">
    <h3><?= h($timeTypeProfile->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($timeTypeProfile->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeTypeProfile->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($timeTypeProfile->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Rec Variant') ?></th>
            <td><?= h($timeTypeProfile->time_rec_variant) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($timeTypeProfile->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Type') ?></th>
            <td><?= h($timeTypeProfile->time_type) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($timeTypeProfile->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeTypeProfile->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($timeTypeProfile->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Enable Ess') ?></th>
            <td><?= $timeTypeProfile->enable_ess ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
