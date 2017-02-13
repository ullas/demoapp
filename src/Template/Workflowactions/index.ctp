<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workflowaction'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Positions'), ['controller' => 'Positions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Position'), ['controller' => 'Positions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workflowactions index large-9 medium-8 columns content">
    <h3><?= __('Workflowactions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('workflowrule_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('displayname') ?></th>
                <th><?= $this->Paginator->sort('position_id') ?></th>
                <th><?= $this->Paginator->sort('stepid') ?></th>
                <th><?= $this->Paginator->sort('nextactionid') ?></th>
                <th><?= $this->Paginator->sort('onfailureactionid') ?></th>
                <th><?= $this->Paginator->sort('failuretime') ?></th>
                <th><?= $this->Paginator->sort('failureskip') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workflowactions as $workflowaction): ?>
            <tr>
                <td><?= $this->Number->format($workflowaction->id) ?></td>
                <td><?= $workflowaction->has('workflowrule') ? $this->Html->link($workflowaction->workflowrule->name, ['controller' => 'Workflowrules', 'action' => 'view', $workflowaction->workflowrule->id]) : '' ?></td>
                <td><?= h($workflowaction->name) ?></td>
                <td><?= h($workflowaction->displayname) ?></td>
                <td><?= $workflowaction->has('position') ? $this->Html->link($workflowaction->position->name, ['controller' => 'Positions', 'action' => 'view', $workflowaction->position->id]) : '' ?></td>
                <td><?= $this->Number->format($workflowaction->stepid) ?></td>
                <td><?= $this->Number->format($workflowaction->nextactionid) ?></td>
                <td><?= $this->Number->format($workflowaction->onfailureactionid) ?></td>
                <td><?= h($workflowaction->failuretime) ?></td>
                <td><?= h($workflowaction->failureskip) ?></td>
                <td><?= $workflowaction->has('customer') ? $this->Html->link($workflowaction->customer->name, ['controller' => 'Customers', 'action' => 'view', $workflowaction->customer->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workflowaction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workflowaction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workflowaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workflowaction->id)]) ?>
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
