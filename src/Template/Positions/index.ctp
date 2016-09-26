<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positions index large-9 medium-8 columns content">
    <h3><?= __('Positions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('external_name') ?></th>
                <th><?= $this->Paginator->sort('effective_start_date') ?></th>
                <th><?= $this->Paginator->sort('effective_end_date') ?></th>
                <th><?= $this->Paginator->sort('positiontype') ?></th>
                <th><?= $this->Paginator->sort('position_criticality') ?></th>
                <th><?= $this->Paginator->sort('position_controlled') ?></th>
                <th><?= $this->Paginator->sort('multiple_incumbents_allowed') ?></th>
                <th><?= $this->Paginator->sort('comment') ?></th>
                <th><?= $this->Paginator->sort('incumbent') ?></th>
                <th><?= $this->Paginator->sort('change_reason') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('job_title') ?></th>
                <th><?= $this->Paginator->sort('job_code') ?></th>
                <th><?= $this->Paginator->sort('job_level') ?></th>
                <th><?= $this->Paginator->sort('employee_class') ?></th>
                <th><?= $this->Paginator->sort('regular_temporary') ?></th>
                <th><?= $this->Paginator->sort('pay_grade') ?></th>
                <th><?= $this->Paginator->sort('target_fte') ?></th>
                <th><?= $this->Paginator->sort('vacant') ?></th>
                <th><?= $this->Paginator->sort('standard_hours') ?></th>
                <th><?= $this->Paginator->sort('company') ?></th>
                <th><?= $this->Paginator->sort('business_unit') ?></th>
                <th><?= $this->Paginator->sort('division') ?></th>
                <th><?= $this->Paginator->sort('department') ?></th>
                <th><?= $this->Paginator->sort('location') ?></th>
                <th><?= $this->Paginator->sort('cost_center') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('created_date') ?></th>
                <th><?= $this->Paginator->sort('last_modified_by') ?></th>
                <th><?= $this->Paginator->sort('last_modified_date') ?></th>
                <th><?= $this->Paginator->sort('parent_position') ?></th>
                <th><?= $this->Paginator->sort('pay_range') ?></th>
                <th><?= $this->Paginator->sort('position_matrix_relationship') ?></th>
                <th><?= $this->Paginator->sort('right_to_return') ?></th>
                <th><?= $this->Paginator->sort('position_code') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $this->Number->format($position->id) ?></td>
                <td><?= h($position->external_name) ?></td>
                <td><?= h($position->effective_start_date) ?></td>
                <td><?= h($position->effective_end_date) ?></td>
                <td><?= h($position->positiontype) ?></td>
                <td><?= h($position->position_criticality) ?></td>
                <td><?= h($position->position_controlled) ?></td>
                <td><?= h($position->multiple_incumbents_allowed) ?></td>
                <td><?= h($position->comment) ?></td>
                <td><?= h($position->incumbent) ?></td>
                <td><?= h($position->change_reason) ?></td>
                <td><?= h($position->description) ?></td>
                <td><?= h($position->job_title) ?></td>
                <td><?= h($position->job_code) ?></td>
                <td><?= h($position->job_level) ?></td>
                <td><?= h($position->employee_class) ?></td>
                <td><?= h($position->regular_temporary) ?></td>
                <td><?= h($position->pay_grade) ?></td>
                <td><?= $this->Number->format($position->target_fte) ?></td>
                <td><?= h($position->vacant) ?></td>
                <td><?= $this->Number->format($position->standard_hours) ?></td>
                <td><?= h($position->company) ?></td>
                <td><?= h($position->business_unit) ?></td>
                <td><?= h($position->division) ?></td>
                <td><?= h($position->department) ?></td>
                <td><?= h($position->location) ?></td>
                <td><?= h($position->cost_center) ?></td>
                <td><?= h($position->created_by) ?></td>
                <td><?= h($position->created_date) ?></td>
                <td><?= h($position->last_modified_by) ?></td>
                <td><?= h($position->last_modified_date) ?></td>
                <td><?= h($position->parent_position) ?></td>
                <td><?= h($position->pay_range) ?></td>
                <td><?= h($position->position_matrix_relationship) ?></td>
                <td><?= h($position->right_to_return) ?></td>
                <td><?= h($position->position_code) ?></td>
                <td><?= h($position->effective_status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $position->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $position->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $position->id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->id)]) ?>
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
