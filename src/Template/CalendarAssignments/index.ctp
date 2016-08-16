<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Calendar Assignment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calendarAssignments index large-9 medium-8 columns content">
    <h3><?= __('Calendar Assignments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('calendar') ?></th>
                <th><?= $this->Paginator->sort('assignmentyear') ?></th>
                <th><?= $this->Paginator->sort('assignmentdate') ?></th>
                <th><?= $this->Paginator->sort('User') ?></th>
                <th><?= $this->Paginator->sort('holiday_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calendarAssignments as $calendarAssignment): ?>
            <tr>
                <td><?= $this->Number->format($calendarAssignment->id) ?></td>
                <td><?= h($calendarAssignment->calendar) ?></td>
                <td><?= h($calendarAssignment->assignmentyear) ?></td>
                <td><?= h($calendarAssignment->assignmentdate) ?></td>
                <td><?= h($calendarAssignment->User) ?></td>
                <td><?= h($calendarAssignment->holiday_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $calendarAssignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calendarAssignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calendarAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendarAssignment->id)]) ?>
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
