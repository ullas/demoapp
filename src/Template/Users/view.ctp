<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Calendar Assignments'), ['controller' => 'CalendarAssignments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Calendar Assignment'), ['controller' => 'CalendarAssignments', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Role') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Calendar Assignments') ?></h4>
        <?php if (!empty($user->calendar_assignments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Calendar') ?></th>
                <th><?= __('Assignmentyear') ?></th>
                <th><?= __('Assignmentdate') ?></th>
                <th><?= __('User') ?></th>
                <th><?= __('Holiday Code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->calendar_assignments as $calendarAssignments): ?>
            <tr>
                <td><?= h($calendarAssignments->id) ?></td>
                <td><?= h($calendarAssignments->calendar) ?></td>
                <td><?= h($calendarAssignments->assignmentyear) ?></td>
                <td><?= h($calendarAssignments->assignmentdate) ?></td>
                <td><?= h($calendarAssignments->User) ?></td>
                <td><?= h($calendarAssignments->holiday_code) ?></td>
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
