<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Legal Entities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Groups'), ['controller' => 'PayGroups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Group'), ['controller' => 'PayGroups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="legalEntities form large-9 medium-8 columns content">
    <?= $this->Form->create($legalEntity) ?>
    <fieldset>
        <legend><?= __('Add Legal Entity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('effective_start_date', ['empty' => true]);
            echo $this->Form->input('effective_end_date', ['empty' => true]);
            echo $this->Form->input('country_of_registration',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('standard_weekly_hours',['options' => $hours, 'empty' => true]);
            echo $this->Form->input('currency',['options' => $this->Currency->get_currencies(), 'empty' => true]);
            echo $this->Form->input('official_language',['options' => $this->Language->get_languages(), 'empty' => true]);
            echo $this->Form->input('external_code');
            echo $this->Form->input('location_id', ['options' => $locations, 'empty' => true]);
            echo $this->Form->input('paygroup_id', ['options' => $payGroups, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
