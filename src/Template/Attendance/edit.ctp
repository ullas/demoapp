<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $attendance->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $attendance->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Attendance'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="attendance form large-9 medium-8 columns content">
    <?= $this->Form->create($attendance) ?>
    <fieldset>
        <legend><?= __('Edit Attendance') ?></legend>
        <?php
            echo $this->Form->input('time_in', ['empty' => true]);
            echo $this->Form->input('time_out', ['empty' => true]);
            echo $this->Form->input('employee_id', ['options' => $employees, 'empty' => true]);
            echo $this->Form->input('date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
