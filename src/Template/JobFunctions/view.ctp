<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Job Function'), ['action' => 'edit', $jobFunction->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Job Function'), ['action' => 'delete', $jobFunction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobFunction->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Job Functions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Function'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobFunctions view large-9 medium-8 columns content">
    <h3><?= h($jobFunction->name) ?></h3>
    <table class="vertical-table">
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
</div>
