<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $experience->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $experience->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Experiences'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="experiences form large-9 medium-8 columns content">
    <?= $this->Form->create($experience) ?>
    <fieldset>
        <legend><?= __('Edit Experience') ?></legend>
        <?php
            echo $this->Form->input('employee_id', ['options' => $employees, 'empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('designation');
            echo $this->Form->input('industry');
            echo $this->Form->input('function');
            echo $this->Form->input('employer');
            echo $this->Form->input('city');
            echo $this->Form->input('country');
            echo $this->Form->input('fromdate', ['empty' => true]);
            echo $this->Form->input('todate', ['empty' => true]);
            echo $this->Form->input('contract');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
