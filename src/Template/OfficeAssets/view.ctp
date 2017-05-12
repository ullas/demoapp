<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Office Asset'), ['action' => 'edit', $officeAsset->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Office Asset'), ['action' => 'delete', $officeAsset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officeAsset->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Office Assets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Office Asset'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="officeAssets view large-9 medium-8 columns content">
    <h3><?= h($officeAsset->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $officeAsset->has('customer') ? $this->Html->link($officeAsset->customer->name, ['controller' => 'Customers', 'action' => 'view', $officeAsset->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $officeAsset->has('employee') ? $this->Html->link($officeAsset->employee->id, ['controller' => 'Employees', 'action' => 'view', $officeAsset->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($officeAsset->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Assettype') ?></th>
            <td><?= h($officeAsset->assettype) ?></td>
        </tr>
        <tr>
            <th><?= __('Assetnumber') ?></th>
            <td><?= h($officeAsset->assetnumber) ?></td>
        </tr>
        <tr>
            <th><?= __('Assetdescription') ?></th>
            <td><?= h($officeAsset->assetdescription) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($officeAsset->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Issuedate') ?></th>
            <td><?= h($officeAsset->issuedate) ?></td>
        </tr>
        <tr>
            <th><?= __('Todate') ?></th>
            <td><?= h($officeAsset->todate) ?></td>
        </tr>
    </table>
</div>
