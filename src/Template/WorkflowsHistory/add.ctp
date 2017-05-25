<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Workflows History'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'Empdatabiographies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'Empdatabiographies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workflowsHistory form large-9 medium-8 columns content">
    <?= $this->Form->create($workflowsHistory) ?>
    <fieldset>
        <legend><?= __('Add Workflows History') ?></legend>
        <?php
            echo $this->Form->input('workflow_id', ['options' => $workflows, 'empty' => true]);
            echo $this->Form->input('currentstep');
            echo $this->Form->input('workflowrule_id', ['options' => $workflowrules, 'empty' => true]);
            echo $this->Form->input('lastaction');
            echo $this->Form->input('updatetime');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('emp_data_biographies_id', ['options' => $empDataBiographies, 'empty' => true]);
            echo $this->Form->input('status');
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('description');
            echo $this->Form->input('active');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
