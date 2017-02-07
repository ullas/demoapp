<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $timeTypeProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $timeTypeProfile->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Time Types'), ['controller' => 'TimeTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Time Type'), ['controller' => 'TimeTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="timeTypeProfiles form large-9 medium-8 columns content">
    <?= $this->Form->create($timeTypeProfile) ?>
    <fieldset>
        <legend><?= __('Edit Time Type Profile') ?></legend>
        <?php
            echo $this->Form->input('code');
            echo $this->Form->input('name');
            echo $this->Form->input('country');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('time_rec_variant');
            echo $this->Form->input('status');
            echo $this->Form->input('enable_ess');
            echo $this->Form->input('external_code');
            echo $this->Form->input('time_type_id', ['options' => $timeTypes, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('workflow_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
