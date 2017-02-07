<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Holiday'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Holiday Calendars'), ['controller' => 'HolidayCalendars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Holiday Calendar'), ['controller' => 'HolidayCalendars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Calendar Assignments'), ['controller' => 'CalendarAssignments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Calendar Assignment'), ['controller' => 'CalendarAssignments', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="holidays index large-9 medium-8 columns content">
    <h3><?= __('Holidays') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('holiday_class') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('date') ?></th>
                <th><?= $this->Paginator->sort('holiday_code') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('holiday_calendar_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($holidays as $holiday): ?>
            <tr>
                <td><?= $this->Number->format($holiday->id) ?></td>
                <td><?= h($holiday->holiday_class) ?></td>
                <td><?= h($holiday->name) ?></td>
                <td><?= h($holiday->date) ?></td>
                <td><?= h($holiday->holiday_code) ?></td>
                <td><?= $holiday->has('customer') ? $this->Html->link($holiday->customer->name, ['controller' => 'Customers', 'action' => 'view', $holiday->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($holiday->holiday_calendar_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $holiday->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $holiday->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $holiday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holiday->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
