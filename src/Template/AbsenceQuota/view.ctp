<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Absence Quotum'), ['action' => 'edit', $absenceQuotum->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Absence Quotum'), ['action' => 'delete', $absenceQuotum->id], ['confirm' => __('Are you sure you want to delete # {0}?', $absenceQuotum->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Absence Quota'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Absence Quotum'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Time Types'), ['controller' => 'TimeTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type'), ['controller' => 'TimeTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['controller' => 'Frequencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['controller' => 'Frequencies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="absenceQuota view large-9 medium-8 columns content">
    <h3><?= h($absenceQuotum->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $absenceQuotum->has('employee') ? $this->Html->link($absenceQuotum->employee->name, ['controller' => 'Employees', 'action' => 'view', $absenceQuotum->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Time Type') ?></th>
            <td><?= $absenceQuotum->has('time_type') ? $this->Html->link($absenceQuotum->time_type->name, ['controller' => 'TimeTypes', 'action' => 'view', $absenceQuotum->time_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Frequency') ?></th>
            <td><?= $absenceQuotum->has('frequency') ? $this->Html->link($absenceQuotum->frequency->name, ['controller' => 'Frequencies', 'action' => 'view', $absenceQuotum->frequency->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $absenceQuotum->has('customer') ? $this->Html->link($absenceQuotum->customer->name, ['controller' => 'Customers', 'action' => 'view', $absenceQuotum->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($absenceQuotum->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Quota') ?></th>
            <td><?= $this->Number->format($absenceQuotum->quota) ?></td>
        </tr>
        <tr>
            <th><?= __('Balance') ?></th>
            <td><?= $this->Number->format($absenceQuotum->balance) ?></td>
        </tr>
        <tr>
            <th><?= __('Expirylot') ?></th>
            <td><?= $this->Number->format($absenceQuotum->expirylot) ?></td>
        </tr>
        <tr>
            <th><?= __('Nxtexpiry') ?></th>
            <td><?= h($absenceQuotum->nxtexpiry) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($absenceQuotum->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($absenceQuotum->modified) ?></td>
        </tr>
    </table>
</div>
