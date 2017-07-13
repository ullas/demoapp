<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Attendance'), ['action' => 'edit', $attendance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Attendance'), ['action' => 'delete', $attendance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Attendance'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Attendance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="attendance view large-9 medium-8 columns content">
    <h3><?= h($attendance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $attendance->has('employee') ? $this->Html->link($attendance->employee->id, ['controller' => 'Employees', 'action' => 'view', $attendance->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($attendance->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Time In') ?></th>
            <td><?= h($attendance->time_in) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Out') ?></th>
            <td><?= h($attendance->time_out) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($attendance->date) ?></td>
        </tr>
    </table>
</div>
