<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cost Centre'), ['action' => 'edit', $costCentre->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cost Centre'), ['action' => 'delete', $costCentre->id], ['confirm' => __('Are you sure you want to delete # {0}?', $costCentre->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cost Centres'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cost Centre'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="costCentres view large-9 medium-8 columns content">
    <h3><?= h($costCentre->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($costCentre->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($costCentre->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Cost Center') ?></th>
            <td><?= h($costCentre->parent_cost_center) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($costCentre->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($costCentre->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cost Center Manager') ?></th>
            <td><?= $this->Number->format($costCentre->cost_center_manager) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($costCentre->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($costCentre->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $costCentre->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
