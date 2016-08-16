<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Calendar Assignment'), ['action' => 'edit', $calendarAssignment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Calendar Assignment'), ['action' => 'delete', $calendarAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendarAssignment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Calendar Assignments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calendar Assignment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="calendarAssignments view large-9 medium-8 columns content">
    <h3><?= h($calendarAssignment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Calendar') ?></th>
            <td><?= h($calendarAssignment->calendar) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignmentyear') ?></th>
            <td><?= h($calendarAssignment->assignmentyear) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= h($calendarAssignment->User) ?></td>
        </tr>
        <tr>
            <th><?= __('Holiday Code') ?></th>
            <td><?= h($calendarAssignment->holiday_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($calendarAssignment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Assignmentdate') ?></th>
            <td><?= h($calendarAssignment->assignmentdate) ?></td>
        </tr>
    </table>
</div>
