<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Workflows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['controller' => 'TimeTypeProfiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Time Type Profile'), ['controller' => 'TimeTypeProfiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workflows form large-9 medium-8 columns content">
    <?= $this->Form->create($workflow) ?>
    <fieldset>
        <legend><?= __('Add Workflow') ?></legend>
        <?php
            echo $this->Form->input('currentstep');
            echo $this->Form->input('workflowrule_id', ['options' => $workflowrules, 'empty' => true]);
            echo $this->Form->input('lastaction');
            echo $this->Form->input('updatetime');
            echo $this->Form->input('customer_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
