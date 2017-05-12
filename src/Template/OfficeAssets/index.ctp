<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Office Asset'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="officeAssets index large-9 medium-8 columns content">
    <h3><?= __('Office Assets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th><?= $this->Paginator->sort('location') ?></th>
                <th><?= $this->Paginator->sort('assettype') ?></th>
                <th><?= $this->Paginator->sort('assetnumber') ?></th>
                <th><?= $this->Paginator->sort('assetdescription') ?></th>
                <th><?= $this->Paginator->sort('issuedate') ?></th>
                <th><?= $this->Paginator->sort('todate') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($officeAssets as $officeAsset): ?>
            <tr>
                <td><?= $this->Number->format($officeAsset->id) ?></td>
                <td><?= $officeAsset->has('customer') ? $this->Html->link($officeAsset->customer->name, ['controller' => 'Customers', 'action' => 'view', $officeAsset->customer->id]) : '' ?></td>
                <td><?= $officeAsset->has('employee') ? $this->Html->link($officeAsset->employee->id, ['controller' => 'Employees', 'action' => 'view', $officeAsset->employee->id]) : '' ?></td>
                <td><?= h($officeAsset->location) ?></td>
                <td><?= h($officeAsset->assettype) ?></td>
                <td><?= h($officeAsset->assetnumber) ?></td>
                <td><?= h($officeAsset->assetdescription) ?></td>
                <td><?= h($officeAsset->issuedate) ?></td>
                <td><?= h($officeAsset->todate) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $officeAsset->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $officeAsset->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeAsset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $officeAsset->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
