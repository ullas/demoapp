<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Holiday Calendar'), ['action' => 'edit', $holidayCalendar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Holiday Calendar'), ['action' => 'delete', $holidayCalendar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holidayCalendar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Holiday Calendars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holiday Calendar'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="holidayCalendars view large-9 medium-8 columns content">
    <h3><?= h($holidayCalendar->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Calendar') ?></th>
            <td><?= h($holidayCalendar->calendar) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($holidayCalendar->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($holidayCalendar->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $holidayCalendar->has('customer') ? $this->Html->link($holidayCalendar->customer->name, ['controller' => 'Customers', 'action' => 'view', $holidayCalendar->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($holidayCalendar->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid From') ?></th>
            <td><?= h($holidayCalendar->valid_from) ?></td>
        </tr>
        <tr>
            <th><?= __('Valid To') ?></th>
            <td><?= h($holidayCalendar->valid_to) ?></td>
        </tr>
    </table>
</div>
