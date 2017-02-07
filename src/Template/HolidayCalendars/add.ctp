<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Holiday Calendars'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="holidayCalendars form large-9 medium-8 columns content">
    <?= $this->Form->create($holidayCalendar) ?>
    <fieldset>
        <legend><?= __('Add Holiday Calendar') ?></legend>
        <?php
            echo $this->Form->input('calendar');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo $this->Form->input('valid_from', ['empty' => true]);
            echo $this->Form->input('valid_to', ['empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
