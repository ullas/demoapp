<section class="content-header">
  <h1>
    Job Function
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'JobFunctions', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('job_function_type') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobFunctions as $jobFunction): ?>
            <tr>
                <td><?= $this->Number->format($jobFunction->id) ?></td>
                <td><?= h($jobFunction->name) ?></td>
                <td><?= h($jobFunction->description) ?></td>
                <td><?= h($jobFunction->effective_status) ?></td>
                <td><?= h($jobFunction->effective_start_date) ?></td>
                <td><?= h($jobFunction->effective_end_date) ?></td>
                <td><?= h($jobFunction->job_function_type) ?></td>
                <td><?= h($jobFunction->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $jobFunction->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $jobFunction->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobFunction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobFunction->id)]) ?>
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
