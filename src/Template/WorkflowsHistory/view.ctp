<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workflows History'), ['action' => 'edit', $workflowsHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workflows History'), ['action' => 'delete', $workflowsHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workflowsHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workflows History'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflows History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workflows'), ['controller' => 'Workflows', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflows', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['controller' => 'Empdatabiographies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['controller' => 'Empdatabiographies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workflowsHistory view large-9 medium-8 columns content">
    <h3><?= h($workflowsHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Workflow') ?></th>
            <td><?= $workflowsHistory->has('workflow') ? $this->Html->link($workflowsHistory->workflow->id, ['controller' => 'Workflows', 'action' => 'view', $workflowsHistory->workflow->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Workflowrule') ?></th>
            <td><?= $workflowsHistory->has('workflowrule') ? $this->Html->link($workflowsHistory->workflowrule->name, ['controller' => 'Workflowrules', 'action' => 'view', $workflowsHistory->workflowrule->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lastaction') ?></th>
            <td><?= h($workflowsHistory->lastaction) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $workflowsHistory->has('customer') ? $this->Html->link($workflowsHistory->customer->name, ['controller' => 'Customers', 'action' => 'view', $workflowsHistory->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Biography') ?></th>
            <td><?= $workflowsHistory->has('emp_data_biography') ? $this->Html->link($workflowsHistory->emp_data_biography->name, ['controller' => 'Empdatabiographies', 'action' => 'view', $workflowsHistory->emp_data_biography->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($workflowsHistory->status) ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $workflowsHistory->has('user') ? $this->Html->link($workflowsHistory->user->id, ['controller' => 'Users', 'action' => 'view', $workflowsHistory->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($workflowsHistory->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Currentstep') ?></th>
            <td><?= $this->Number->format($workflowsHistory->currentstep) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workflowsHistory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $this->Number->format($workflowsHistory->active) ?></td>
        </tr>
        <tr>
            <th><?= __('Updatetime') ?></th>
            <td><?= h($workflowsHistory->updatetime) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($workflowsHistory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($workflowsHistory->modified) ?></td>
        </tr>
    </table>
</div>
