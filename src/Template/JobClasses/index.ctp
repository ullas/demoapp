<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Jobclass'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['controller' => 'PayGrades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['controller' => 'PayGrades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Functions'), ['controller' => 'JobFunctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Function'), ['controller' => 'JobFunctions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobclasses index large-9 medium-8 columns content">
    <h3><?= __('Jobclasses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('worker_comp_code') ?></th>
                <th><?= $this->Paginator->sort('default_job_level') ?></th>
                <th><?= $this->Paginator->sort('standard_weekly_hours') ?></th>
                <th><?= $this->Paginator->sort('regular_temporary') ?></th>
                <th><?= $this->Paginator->sort('default_employee_class') ?></th>
                <th><?= $this->Paginator->sort('full_time_employee') ?></th>
                <th><?= $this->Paginator->sort('default_supervisor_level') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th><?= $this->Paginator->sort('pay_grade_id') ?></th>
                <th><?= $this->Paginator->sort('job_function_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('job_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobclasses as $jobclass): ?>
            <tr>
                <td><?= $this->Number->format($jobclass->id) ?></td>
                <td><?= h($jobclass->name) ?></td>
                <td><?= h($jobclass->description) ?></td>
                <td><?= h($jobclass->effective_status) ?></td>
                <td><?= h($jobclass->effective_start_date) ?></td>
                <td><?= h($jobclass->effective_end_date) ?></td>
                <td><?= h($jobclass->worker_comp_code) ?></td>
                <td><?= h($jobclass->default_job_level) ?></td>
                <td><?= $this->Number->format($jobclass->standard_weekly_hours) ?></td>
                <td><?= h($jobclass->regular_temporary) ?></td>
                <td><?= h($jobclass->default_employee_class) ?></td>
                <td><?= h($jobclass->full_time_employee) ?></td>
                <td><?= h($jobclass->default_supervisor_level) ?></td>
                <td><?= h($jobclass->external_code) ?></td>
                <td><?= $jobclass->has('pay_grade') ? $this->Html->link($jobclass->pay_grade->name, ['controller' => 'PayGrades', 'action' => 'view', $jobclass->pay_grade->id]) : '' ?></td>
                <td><?= $jobclass->has('job_function') ? $this->Html->link($jobclass->job_function->name, ['controller' => 'JobFunctions', 'action' => 'view', $jobclass->job_function->id]) : '' ?></td>
                <td><?= $jobclass->has('customer') ? $this->Html->link($jobclass->customer->name, ['controller' => 'Customers', 'action' => 'view', $jobclass->customer->id]) : '' ?></td>
                <td><?= $jobclass->has('job') ? $this->Html->link($jobclass->job->id, ['controller' => 'Jobs', 'action' => 'view', $jobclass->job->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobclass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobclass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobclass->id)]) ?>
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
