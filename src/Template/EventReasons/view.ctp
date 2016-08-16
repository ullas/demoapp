<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event Reason'), ['action' => 'edit', $eventReason->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event Reason'), ['action' => 'delete', $eventReason->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventReason->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Event Reasons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event Reason'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="eventReasons view large-9 medium-8 columns content">
    <h3><?= h($eventReason->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($eventReason->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($eventReason->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= h($eventReason->event) ?></td>
        </tr>
        <tr>
            <th><?= __('Empl Status') ?></th>
            <td><?= h($eventReason->empl_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Implicit Position Action') ?></th>
            <td><?= h($eventReason->implicit_position_action) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($eventReason->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventReason->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($eventReason->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($eventReason->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $eventReason->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
