<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Division'), ['action' => 'edit', $division->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Division'), ['action' => 'delete', $division->id], ['confirm' => __('Are you sure you want to delete # {0}?', $division->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Divisions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Division'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="divisions view large-9 medium-8 columns content">
    <h3><?= h($division->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($division->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($division->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Division') ?></th>
            <td><?= h($division->parent_division) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($division->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($division->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Head Of Unit') ?></th>
            <td><?= $this->Number->format($division->head_of_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($division->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($division->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $division->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
