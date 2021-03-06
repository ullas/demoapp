<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Workflows'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?></li>
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
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('emp_data_biographies_id', ['options' => $empDataBiographies, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
