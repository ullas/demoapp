<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Event Reasons'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="eventReasons form large-9 medium-8 columns content">
    <?= $this->Form->create($eventReason) ?>
    <fieldset>
        <legend><?= __('Add Event Reason') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('status');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('end_date', ['empty' => true]);
            echo $this->Form->input('event');
            echo $this->Form->input('empl_status');
            echo $this->Form->input('implicit_position_action');
            echo $this->Form->input('external_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
