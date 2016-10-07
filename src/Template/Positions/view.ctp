<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Legal Entities'), ['controller' => 'LegalEntities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Legal Entity'), ['controller' => 'LegalEntities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Departments'), ['controller' => 'Departments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Department'), ['controller' => 'Departments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cost Centres'), ['controller' => 'CostCentres', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Centre'), ['controller' => 'CostCentres', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Divisions'), ['controller' => 'Divisions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Division'), ['controller' => 'Divisions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pay Grades'), ['controller' => 'PayGrades', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Grade'), ['controller' => 'PayGrades', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pay Ranges'), ['controller' => 'PayRanges', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Range'), ['controller' => 'PayRanges', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parents'), ['controller' => 'Positions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent'), ['controller' => 'Positions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positions view large-9 medium-8 columns content">
    <h3><?= h($position->external_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('External Name') ?></th>
            <td><?= h($position->external_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Positiontype') ?></th>
            <td><?= h($position->positiontype) ?></td>
        </tr>
        <tr>
            <th><?= __('Position Criticality') ?></th>
            <td><?= h($position->position_criticality) ?></td>
        </tr>
        <tr>
            <th><?= __('Comment') ?></th>
            <td><?= h($position->comment) ?></td>
        </tr>
        <tr>
            <th><?= __('Incumbent') ?></th>
            <td><?= h($position->incumbent) ?></td>
        </tr>
        <tr>
            <th><?= __('Change Reason') ?></th>
            <td><?= h($position->change_reason) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($position->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Title') ?></th>
            <td><?= h($position->job_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Code') ?></th>
            <td><?= h($position->job_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Level') ?></th>
            <td><?= h($position->job_level) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee Class') ?></th>
            <td><?= h($position->employee_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Regular Temporary') ?></th>
            <td><?= h($position->regular_temporary) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= h($position->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Modified By') ?></th>
            <td><?= h($position->last_modified_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Position Matrix Relationship') ?></th>
            <td><?= h($position->position_matrix_relationship) ?></td>
        </tr>
        <tr>
            <th><?= __('Right To Return') ?></th>
            <td><?= h($position->right_to_return) ?></td>
        </tr>
        <tr>
            <th><?= __('Position Code') ?></th>
            <td><?= h($position->position_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $position->has('customer') ? $this->Html->link($position->customer->name, ['controller' => 'Customers', 'action' => 'view', $position->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Legal Entity') ?></th>
            <td><?= $position->has('legal_entity') ? $this->Html->link($position->legal_entity->name, ['controller' => 'LegalEntities', 'action' => 'view', $position->legal_entity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= $position->has('department') ? $this->Html->link($position->department->name, ['controller' => 'Departments', 'action' => 'view', $position->department->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Centre') ?></th>
            <td><?= $position->has('cost_centre') ? $this->Html->link($position->cost_centre->name, ['controller' => 'CostCentres', 'action' => 'view', $position->cost_centre->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $position->has('location') ? $this->Html->link($position->location->name, ['controller' => 'Locations', 'action' => 'view', $position->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Division') ?></th>
            <td><?= $position->has('division') ? $this->Html->link($position->division->name, ['controller' => 'Divisions', 'action' => 'view', $position->division->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Grade') ?></th>
            <td><?= $position->has('pay_grade') ? $this->Html->link($position->pay_grade->name, ['controller' => 'PayGrades', 'action' => 'view', $position->pay_grade->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Range') ?></th>
            <td><?= $position->has('pay_range') ? $this->Html->link($position->pay_range->name, ['controller' => 'PayRanges', 'action' => 'view', $position->pay_range->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Parent') ?></th>
            <td><?= $position->has('parent') ? $this->Html->link($position->parent->external_name, ['controller' => 'Positions', 'action' => 'view', $position->parent->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($position->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Target Fte') ?></th>
            <td><?= $this->Number->format($position->target_fte) ?></td>
        </tr>
        <tr>
            <th><?= __('Standard Hours') ?></th>
            <td><?= $this->Number->format($position->standard_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($position->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($position->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Created Date') ?></th>
            <td><?= h($position->created_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Modified Date') ?></th>
            <td><?= h($position->last_modified_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Position Controlled') ?></th>
            <td><?= $position->position_controlled ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Multiple Incumbents Allowed') ?></th>
            <td><?= $position->multiple_incumbents_allowed ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Vacant') ?></th>
            <td><?= $position->vacant ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $position->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
