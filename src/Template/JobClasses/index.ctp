<section class="content-header">
  <h1>
    Job Class
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'JobClasses', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
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
                <td><?= h($jobClass->external_code) ?></td>
                <td><?= $jobClass->has('pay_grade') ? $this->Html->link($jobClass->pay_grade->name, ['controller' => 'PayGrades', 'action' => 'view', $jobClass->pay_grade->id]) : '' ?></td>
                <td><?= $jobClass->has('job_function') ? $this->Html->link($jobClass->job_function->name, ['controller' => 'JobFunctions', 'action' => 'view', $jobClass->job_function->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobClass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobClass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobClass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobClass->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
