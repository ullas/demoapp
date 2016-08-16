<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job Class'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobClasses index large-9 medium-8 columns content">
    <h3><?= __('Job Classes') ?></h3>
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
                <th><?= $this->Paginator->sort('pay_grade') ?></th>
                <th><?= $this->Paginator->sort('job_function') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobClasses as $jobClass): ?>
            <tr>
                <td><?= $this->Number->format($jobClass->id) ?></td>
                <td><?= h($jobClass->name) ?></td>
                <td><?= h($jobClass->description) ?></td>
                <td><?= h($jobClass->effective_status) ?></td>
                <td><?= h($jobClass->effective_start_date) ?></td>
                <td><?= h($jobClass->effective_end_date) ?></td>
                <td><?= h($jobClass->worker_comp_code) ?></td>
                <td><?= h($jobClass->default_job_level) ?></td>
                <td><?= $this->Number->format($jobClass->standard_weekly_hours) ?></td>
                <td><?= h($jobClass->regular_temporary) ?></td>
                <td><?= h($jobClass->default_employee_class) ?></td>
                <td><?= h($jobClass->full_time_employee) ?></td>
                <td><?= h($jobClass->default_supervisor_level) ?></td>
                <td><?= h($jobClass->pay_grade) ?></td>
                <td><?= h($jobClass->job_function) ?></td>
                <td><?= h($jobClass->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobClass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobClass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobClass->id)]) ?>
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
