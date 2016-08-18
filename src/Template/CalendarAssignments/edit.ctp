<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $calendarAssignment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calendarAssignment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Calendar Assignments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="calendarAssignments form large-9 medium-8 columns content">
    <?= $this->Form->create($calendarAssignment) ?>
    <fieldset>
        <legend><?= __('Edit Calendar Assignment') ?></legend>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('assignmentyear');
            echo $this->Form->input('assignmentdate', ['empty' => true]);
            echo $this->Form->input('User');
            echo $this->Form->input('holiday_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
