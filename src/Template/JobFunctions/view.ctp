<section class="content-header">
  <h1>
    Job Function
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
            <td><?= h($jobFunction->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($jobFunction->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Function Type') ?></th>
            <td><?= h($jobFunction->job_function_type) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($jobFunction->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobFunction->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($jobFunction->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($jobFunction->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $jobFunction->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
