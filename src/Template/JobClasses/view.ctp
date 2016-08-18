<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job Class'), ['action' => 'edit', $jobClass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job Class'), ['action' => 'delete', $jobClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobClass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Job Classes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Class'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobClasses view large-9 medium-8 columns content">
    <h3><?= h($jobClass->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($jobClass->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($jobClass->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Worker Comp Code') ?></th>
            <td><?= h($jobClass->worker_comp_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Job Level') ?></th>
            <td><?= h($jobClass->default_job_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Regular Temporary') ?></th>
            <td><?= h($jobClass->regular_temporary) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Employee Class') ?></th>
            <td><?= h($jobClass->default_employee_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Default Supervisor Level') ?></th>
            <td><?= h($jobClass->default_supervisor_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Grade') ?></th>
            <td><?= h($jobClass->pay_grade) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Function') ?></th>
            <td><?= h($jobClass->job_function) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($jobClass->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobClass->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Standard Weekly Hours') ?></th>
            <td><?= $this->Number->format($jobClass->standard_weekly_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($jobClass->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($jobClass->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $jobClass->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Full Time Employee') ?></th>
            <td><?= $jobClass->full_time_employee ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
