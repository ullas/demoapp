<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Jobclass'), ['action' => 'edit', $jobclass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Jobclass'), ['action' => 'delete', $jobclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobclass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobclasses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jobclass'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['controller' => 'PayGrades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['controller' => 'PayGrades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Job Functions'), ['controller' => 'JobFunctions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Function'), ['controller' => 'JobFunctions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobclasses view large-9 medium-8 columns content">
    <h3><?= h($jobclass->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($jobclass->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($jobclass->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Worker Comp Code') ?></th>
            <td><?= h($jobclass->worker_comp_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Job Level') ?></th>
            <td><?= h($jobclass->default_job_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Regular Temporary') ?></th>
            <td><?= h($jobclass->regular_temporary) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Employee Class') ?></th>
            <td><?= h($jobclass->default_employee_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Supervisor Level') ?></th>
            <td><?= h($jobclass->default_supervisor_level) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($jobclass->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Grade') ?></th>
            <td><?= $jobclass->has('pay_grade') ? $this->Html->link($jobclass->pay_grade->name, ['controller' => 'PayGrades', 'action' => 'view', $jobclass->pay_grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Job Function') ?></th>
            <td><?= $jobclass->has('job_function') ? $this->Html->link($jobclass->job_function->name, ['controller' => 'JobFunctions', 'action' => 'view', $jobclass->job_function->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $jobclass->has('customer') ? $this->Html->link($jobclass->customer->name, ['controller' => 'Customers', 'action' => 'view', $jobclass->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Job') ?></th>
            <td><?= $jobclass->has('job') ? $this->Html->link($jobclass->job->id, ['controller' => 'Jobs', 'action' => 'view', $jobclass->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobclass->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Standard Weekly Hours') ?></th>
            <td><?= $this->Number->format($jobclass->standard_weekly_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($jobclass->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($jobclass->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $jobclass->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Full Time Employee') ?></th>
            <td><?= $jobclass->full_time_employee ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
