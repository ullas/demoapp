<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Educational Qualification'), ['action' => 'edit', $educationalQualification->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Educational Qualification'), ['action' => 'delete', $educationalQualification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $educationalQualification->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Educational Qualifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Educational Qualification'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Employees'), ['controller' => 'Employees', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Employee'), ['controller' => 'Employees', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="educationalQualifications view large-9 medium-8 columns content">
    <h3><?= h($educationalQualification->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= $educationalQualification->has('employee') ? $this->Html->link($educationalQualification->employee->id, ['controller' => 'Employees', 'action' => 'view', $educationalQualification->employee->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Qualification') ?></th>
            <td><?= h($educationalQualification->qualification) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject') ?></th>
            <td><?= h($educationalQualification->subject) ?></td>
        </tr>
        <tr>
            <th><?= __('Subject2') ?></th>
            <td><?= h($educationalQualification->subject2) ?></td>
        </tr>
        <tr>
            <th><?= __('Schoolcollege') ?></th>
            <td><?= h($educationalQualification->schoolcollege) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($educationalQualification->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $educationalQualification->has('customer') ? $this->Html->link($educationalQualification->customer->name, ['controller' => 'Customers', 'action' => 'view', $educationalQualification->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($educationalQualification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fromdate') ?></th>
            <td><?= h($educationalQualification->fromdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Passdate') ?></th>
            <td><?= h($educationalQualification->passdate) ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= h($educationalQualification->grade) ?></td>
        </tr>
    </table>
</div>
