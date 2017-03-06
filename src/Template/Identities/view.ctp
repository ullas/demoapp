<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Identity'), ['action' => 'edit', $identity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Identity'), ['action' => 'delete', $identity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $identity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Identities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Identity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="identities view large-9 medium-8 columns content">
    <h3><?= h($identity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($identity->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Card Type') ?></th>
            <td><?= h($identity->card_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationalid') ?></th>
            <td><?= h($identity->nationalid) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $identity->has('customer') ? $this->Html->link($identity->customer->name, ['controller' => 'Customers', 'action' => 'view', $identity->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $identity->has('employee') ? $this->Html->link($identity->employee->id, ['controller' => 'Employees', 'action' => 'view', $identity->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($identity->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Primary') ?></th>
            <td><?= $identity->is_primary ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
