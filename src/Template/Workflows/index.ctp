<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workflow'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['controller' => 'TimeTypeProfiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Time Type Profile'), ['controller' => 'TimeTypeProfiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workflows index large-9 medium-8 columns content">
    <h3><?= __('Workflows') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('currentstep') ?></th>
                <th><?= $this->Paginator->sort('workflowrule_id') ?></th>
                <th><?= $this->Paginator->sort('lastaction') ?></th>
                <th><?= $this->Paginator->sort('updatetime') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('emp_data_biographies_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workflows as $workflow): ?>
            <tr>
                <td><?= $this->Number->format($workflow->id) ?></td>
                <td><?= $this->Number->format($workflow->currentstep) ?></td>
                <td><?= $workflow->has('workflowrule') ? $this->Html->link($workflow->workflowrule->name, ['controller' => 'Workflowrules', 'action' => 'view', $workflow->workflowrule->id]) : '' ?></td>
                <td><?= h($workflow->lastaction) ?></td>
                <td><?= h($workflow->updatetime) ?></td>
                <td><?= $workflow->has('customer') ? $this->Html->link($workflow->customer->name, ['controller' => 'Customers', 'action' => 'view', $workflow->customer->id]) : '' ?></td>
                <td><?= $workflow->has('emp_data_biography') ? $this->Html->link($workflow->emp_data_biography->id, ['controller' => 'EmpDataBiographies', 'action' => 'view', $workflow->emp_data_biography->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workflow->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workflow->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workflow->id)]) ?>
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
