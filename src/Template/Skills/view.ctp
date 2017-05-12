<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Skill'), ['action' => 'edit', $skill->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Skill'), ['action' => 'delete', $skill->id], ['confirm' => __('Are you sure you want to delete # {0}?', $skill->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Skills'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Skill'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="skills view large-9 medium-8 columns content">
    <h3><?= h($skill->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $skill->has('employee') ? $this->Html->link($skill->employee->id, ['controller' => 'Employees', 'action' => 'view', $skill->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $skill->has('customer') ? $this->Html->link($skill->customer->name, ['controller' => 'Customers', 'action' => 'view', $skill->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Skill') ?></th>
            <td><?= h($skill->skill) ?></td>
        </tr>
        <tr>
            <th><?= __('Skillgroup') ?></th>
            <td><?= h($skill->skillgroup) ?></td>
        </tr>
        <tr>
            <th><?= __('Proficiency') ?></th>
            <td><?= h($skill->proficiency) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($skill->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fromdate') ?></th>
            <td><?= h($skill->fromdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Todate') ?></th>
            <td><?= h($skill->todate) ?></td>
        </tr>
    </table>
</div>
