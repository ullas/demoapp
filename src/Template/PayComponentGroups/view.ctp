<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pay Component Group'), ['action' => 'edit', $payComponentGroup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pay Component Group'), ['action' => 'delete', $payComponentGroup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payComponentGroup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pay Component Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Component Group'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="payComponentGroups view large-9 medium-8 columns content">
    <h3><?= h($payComponentGroup->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($payComponentGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payComponentGroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= h($payComponentGroup->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Show On Comp Ui') ?></th>
            <td><?= h($payComponentGroup->show_on_comp_ui) ?></td>
        </tr>
        <tr>
            <th><?= __('Use For Comparatio Calc') ?></th>
            <td><?= h($payComponentGroup->use_for_comparatio_calc) ?></td>
        </tr>
        <tr>
            <th><?= __('Use For Range Penetration') ?></th>
            <td><?= h($payComponentGroup->use_for_range_penetration) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payComponentGroup->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payComponentGroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sort Order') ?></th>
            <td><?= $this->Number->format($payComponentGroup->sort_order) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($payComponentGroup->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($payComponentGroup->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $payComponentGroup->status ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('System Defined') ?></th>
            <td><?= $payComponentGroup->system_defined ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
