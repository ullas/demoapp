<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Position'), ['action' => 'edit', $position->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Position'), ['action' => 'delete', $position->id], ['confirm' => __('Are you sure you want to delete # {0}?', $position->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Positions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Position'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="positions view large-9 medium-8 columns content">
    <h3><?= h($position->id) ?></h3>
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
            <th><?= __('Pay Grade') ?></th>
            <td><?= h($position->pay_grade) ?></td>
        </tr>
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= h($position->company) ?></td>
        </tr>
        <tr>
            <th><?= __('Business Unit') ?></th>
            <td><?= h($position->business_unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Division') ?></th>
            <td><?= h($position->division) ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= h($position->department) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($position->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Center') ?></th>
            <td><?= h($position->cost_center) ?></td>
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
            <th><?= __('Parent Position') ?></th>
            <td><?= h($position->parent_position) ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Range') ?></th>
            <td><?= h($position->pay_range) ?></td>
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
