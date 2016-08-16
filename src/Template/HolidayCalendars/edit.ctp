<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $holidayCalendar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $holidayCalendar->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Holiday Calendars'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="holidayCalendars form large-9 medium-8 columns content">
    <?= $this->Form->create($holidayCalendar) ?>
    <fieldset>
        <legend><?= __('Edit Holiday Calendar') ?></legend>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo $this->Form->input('valid_from', ['empty' => true]);
            echo $this->Form->input('valid_to', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
