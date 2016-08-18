<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job Function'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobFunctions index large-9 medium-8 columns content">
    <h3><?= __('Job Functions') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
