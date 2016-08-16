<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Business Unit'), ['action' => 'edit', $businessUnit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Business Unit'), ['action' => 'delete', $businessUnit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $businessUnit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Business Units'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Business Unit'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="businessUnits view large-9 medium-8 columns content">
    <h3><?= h($businessUnit->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($businessUnit->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($businessUnit->description) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($businessUnit->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($businessUnit->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Head Of Unit') ?></th>
            <td><?= $this->Number->format($businessUnit->head_of_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($businessUnit->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($businessUnit->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $businessUnit->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
