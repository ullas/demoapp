<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Contact Info'), ['action' => 'edit', $contactInfo->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Contact Info'), ['action' => 'delete', $contactInfo->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contactInfo->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Contact Infos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Contact Info'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="contactInfos view large-9 medium-8 columns content">
    <h3><?= h($contactInfo->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($contactInfo->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Mobile') ?></th>
            <td><?= h($contactInfo->mobile) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Address1') ?></th>
            <td><?= h($contactInfo->email_address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Email Address2') ?></th>
            <td><?= h($contactInfo->email_address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Facebook') ?></th>
            <td><?= h($contactInfo->facebook) ?></td>
        </tr>
        <tr>
            <th><?= __('Linkedin') ?></th>
            <td><?= h($contactInfo->linkedin) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $contactInfo->has('customer') ? $this->Html->link($contactInfo->customer->name, ['controller' => 'Customers', 'action' => 'view', $contactInfo->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $contactInfo->has('employee') ? $this->Html->link($contactInfo->employee->id, ['controller' => 'Employees', 'action' => 'view', $contactInfo->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($contactInfo->id) ?></td>
        </tr>
    </table>
</div>
