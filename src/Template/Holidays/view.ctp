<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Holiday'), ['action' => 'edit', $holiday->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Holiday'), ['action' => 'delete', $holiday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holiday->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Holidays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holiday'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Holiday Calendars'), ['controller' => 'HolidayCalendars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holiday Calendar'), ['controller' => 'HolidayCalendars', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calendar Assignments'), ['controller' => 'CalendarAssignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calendar Assignment'), ['controller' => 'CalendarAssignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="holidays view large-9 medium-8 columns content">
    <h3><?= h($holiday->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Holiday Class') ?></th>
            <td><?= h($holiday->holiday_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($holiday->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Holiday Code') ?></th>
            <td><?= h($holiday->holiday_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $holiday->has('customer') ? $this->Html->link($holiday->customer->name, ['controller' => 'Customers', 'action' => 'view', $holiday->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($holiday->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Holiday Calendar Id') ?></th>
            <td><?= $this->Number->format($holiday->holiday_calendar_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($holiday->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Calendar Assignments') ?></h4>
        <?php if (!empty($holiday->calendar_assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Assignmentyear') ?></th>
                <th><?= __('Assignmentdate') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Holiday Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Holiday Calendar Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($holiday->calendar_assignments as $calendarAssignments): ?>
            <tr>
                <td><?= h($calendarAssignments->id) ?></td>
                <td><?= h($calendarAssignments->assignmentyear) ?></td>
                <td><?= h($calendarAssignments->assignmentdate) ?></td>
                <td><?= h($calendarAssignments->user_id) ?></td>
                <td><?= h($calendarAssignments->holiday_id) ?></td>
                <td><?= h($calendarAssignments->customer_id) ?></td>
                <td><?= h($calendarAssignments->holiday_calendar_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CalendarAssignments', 'action' => 'view', $calendarAssignments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CalendarAssignments', 'action' => 'edit', $calendarAssignments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CalendarAssignments', 'action' => 'delete', $calendarAssignments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendarAssignments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
