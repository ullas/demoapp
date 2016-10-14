<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legal Entities'), ['controller' => 'LegalEntities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Legal Entity'), ['controller' => 'LegalEntities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cost Centres'), ['controller' => 'CostCentres', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cost Centre'), ['controller' => 'CostCentres', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Divisions'), ['controller' => 'Divisions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Division'), ['controller' => 'Divisions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['controller' => 'PayGrades', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['controller' => 'PayGrades', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Ranges'), ['controller' => 'PayRanges', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Range'), ['controller' => 'PayRanges', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="positions index large-9 medium-8 columns content">
    <h3><?= __('Positions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
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
                <th><?= $this->Paginator->sort('target_fte') ?></th>
                <th><?= $this->Paginator->sort('vacant') ?></th>
                <th><?= $this->Paginator->sort('standard_hours') ?></th>
                <th><?= $this->Paginator->sort('created_by') ?></th>
                <th><?= $this->Paginator->sort('created_date') ?></th>
                <th><?= $this->Paginator->sort('last_modified_by') ?></th>
                <th><?= $this->Paginator->sort('last_modified_date') ?></th>
                <th><?= $this->Paginator->sort('position_matrix_relationship') ?></th>
                <th><?= $this->Paginator->sort('right_to_return') ?></th>
                <th><?= $this->Paginator->sort('position_code') ?></th>
                <th><?= $this->Paginator->sort('effective_status') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('legal_entity_id') ?></th>
                <th><?= $this->Paginator->sort('department_id') ?></th>
                <th><?= $this->Paginator->sort('cost_center_id') ?></th>
                <th><?= $this->Paginator->sort('location_id') ?></th>
                <th><?= $this->Paginator->sort('division_id') ?></th>
                <th><?= $this->Paginator->sort('pay_grade_id') ?></th>
                <th><?= $this->Paginator->sort('pay_range_id') ?></th>
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th><?= $this->Paginator->sort('lft') ?></th>
                <th><?= $this->Paginator->sort('rght') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $this->Number->format($position->id) ?></td>
                <td><?= h($position->name) ?></td>
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
                <td><?= $this->Number->format($position->target_fte) ?></td>
                <td><?= h($position->vacant) ?></td>
                <td><?= $this->Number->format($position->standard_hours) ?></td>
                <td><?= h($position->created_by) ?></td>
                <td><?= h($position->created_date) ?></td>
                <td><?= h($position->last_modified_by) ?></td>
                <td><?= h($position->last_modified_date) ?></td>
                <td><?= h($position->position_matrix_relationship) ?></td>
                <td><?= h($position->right_to_return) ?></td>
                <td><?= h($position->position_code) ?></td>
                <td><?= h($position->effective_status) ?></td>
                <td><?= $position->has('customer') ? $this->Html->link($position->customer->name, ['controller' => 'Customers', 'action' => 'view', $position->customer->id]) : '' ?></td>
                <td><?= $position->has('legal_entity') ? $this->Html->link($position->legal_entity->name, ['controller' => 'LegalEntities', 'action' => 'view', $position->legal_entity->id]) : '' ?></td>
                <td><?= $position->has('department') ? $this->Html->link($position->department->name, ['controller' => 'Departments', 'action' => 'view', $position->department->id]) : '' ?></td>
                <td><?= $position->has('cost_centre') ? $this->Html->link($position->cost_centre->name, ['controller' => 'CostCentres', 'action' => 'view', $position->cost_centre->id]) : '' ?></td>
                <td><?= $position->has('location') ? $this->Html->link($position->location->name, ['controller' => 'Locations', 'action' => 'view', $position->location->id]) : '' ?></td>
                <td><?= $position->has('division') ? $this->Html->link($position->division->name, ['controller' => 'Divisions', 'action' => 'view', $position->division->id]) : '' ?></td>
                <td><?= $position->has('pay_grade') ? $this->Html->link($position->pay_grade->name, ['controller' => 'PayGrades', 'action' => 'view', $position->pay_grade->id]) : '' ?></td>
                <td><?= $position->has('pay_range') ? $this->Html->link($position->pay_range->name, ['controller' => 'PayRanges', 'action' => 'view', $position->pay_range->id]) : '' ?></td>
                <td><?= $position->has('parent_position') ? $this->Html->link($position->parent_position->name, ['controller' => 'Positions', 'action' => 'view', $position->parent_position->id]) : '' ?></td>
                <td><?= $this->Number->format($position->lft) ?></td>
                <td><?= $this->Number->format($position->rght) ?></td>
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
