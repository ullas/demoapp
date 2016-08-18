<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Grade'), ['action' => 'edit', $payGrade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Grade'), ['action' => 'delete', $payGrade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payGrade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payGrades view large-9 medium-8 columns content">
    <h3><?= h($payGrade->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($payGrade->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payGrade->description) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payGrade->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payGrade->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Grade Level') ?></th>
            <td><?= $this->Number->format($payGrade->pay_grade_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($payGrade->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($payGrade->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $payGrade->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
