<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Job'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Classes'), ['controller' => 'JobClasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Class'), ['controller' => 'JobClasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Functions'), ['controller' => 'JobFunctions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Function'), ['controller' => 'JobFunctions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Job Infos'), ['controller' => 'JobInfos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job Info'), ['controller' => 'JobInfos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="jobs index large-9 medium-8 columns content">
    <h3><?= __('Jobs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('job_class_id') ?></th>
                <th><?= $this->Paginator->sort('job_function_id') ?></th>
                <th><?= $this->Paginator->sort('job_info_id') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jobs as $job): ?>
            <tr>
                <td><?= $this->Number->format($job->id) ?></td>
                <td><?= $job->has('job_class') ? $this->Html->link($job->job_class->name, ['controller' => 'JobClasses', 'action' => 'view', $job->job_class->id]) : '' ?></td>
                <td><?= $job->has('job_function') ? $this->Html->link($job->job_function->name, ['controller' => 'JobFunctions', 'action' => 'view', $job->job_function->id]) : '' ?></td>
                <td><?= $job->has('job_info') ? $this->Html->link($job->job_info->id, ['controller' => 'JobInfos', 'action' => 'view', $job->job_info->id]) : '' ?></td>
                <td><?= $this->Number->format($job->customer_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $job->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $job->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id)]) ?>
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
