<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Experience'), ['action' => 'edit', $experience->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Experience'), ['action' => 'delete', $experience->id], ['confirm' => __('Are you sure you want to delete # {0}?', $experience->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Experiences'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Experience'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="experiences view large-9 medium-8 columns content">
    <h3><?= h($experience->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $experience->has('employee') ? $this->Html->link($experience->employee->id, ['controller' => 'Employees', 'action' => 'view', $experience->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $experience->has('customer') ? $this->Html->link($experience->customer->name, ['controller' => 'Customers', 'action' => 'view', $experience->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Designation') ?></th>
            <td><?= h($experience->designation) ?></td>
        </tr>
        <tr>
            <th><?= __('Industry') ?></th>
            <td><?= h($experience->industry) ?></td>
        </tr>
        <tr>
            <th><?= __('Function') ?></th>
            <td><?= h($experience->function) ?></td>
        </tr>
        <tr>
            <th><?= __('Employer') ?></th>
            <td><?= h($experience->employer) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($experience->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($experience->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Contract') ?></th>
            <td><?= h($experience->contract) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($experience->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fromdate') ?></th>
            <td><?= h($experience->fromdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Todate') ?></th>
            <td><?= h($experience->todate) ?></td>
        </tr>
    </table>
</div>
