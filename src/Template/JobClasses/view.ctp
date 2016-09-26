<section class="content-header">
  <h1>
    Job Class
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table class="table table-hover">
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
            <th><?= __('External Code') ?></th>
            <td><?= h($jobClass->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Grade') ?></th>
            <td><?= $jobClass->has('pay_grade') ? $this->Html->link($jobClass->pay_grade->name, ['controller' => 'PayGrades', 'action' => 'view', $jobClass->pay_grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Job Function') ?></th>
            <td><?= $jobClass->has('job_function') ? $this->Html->link($jobClass->job_function->name, ['controller' => 'JobFunctions', 'action' => 'view', $jobClass->job_function->id]) : '' ?></td>
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
</div></div></section>
