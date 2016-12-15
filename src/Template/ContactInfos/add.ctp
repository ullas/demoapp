<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contact Infos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contactInfos form large-9 medium-8 columns content">
    <?= $this->Form->create($contactInfo) ?>
    <fieldset>
        <legend><?= __('Add Contact Info') ?></legend>
        <?php
            echo $this->Form->input('phone');
            echo $this->Form->input('mobile');
            echo $this->Form->input('email_address1');
            echo $this->Form->input('email_address2');
            echo $this->Form->input('facebook');
            echo $this->Form->input('linkedin');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('employee_id', ['options' => $employees, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
