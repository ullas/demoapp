<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Educational Qualifications'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="educationalQualifications form large-9 medium-8 columns content">
    <?= $this->Form->create($educationalQualification) ?>
    <fieldset>
        <legend><?= __('Add Educational Qualification') ?></legend>
        <?php
            echo $this->Form->input('employee_id', ['options' => $employees, 'empty' => true]);
            echo $this->Form->input('qualification');
            echo $this->Form->input('subject');
            echo $this->Form->input('subject2');
            echo $this->Form->input('schoolcollege');
            echo $this->Form->input('city');
            echo $this->Form->input('fromdate', ['empty' => true]);
            echo $this->Form->input('passdate', ['empty' => true]);
            echo $this->Form->input('grade', ['empty' => true]);
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
