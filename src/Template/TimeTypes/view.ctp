<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Time Type'), ['action' => 'edit', $timeType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Time Type'), ['action' => 'delete', $timeType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Time Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workflow'), ['controller' => 'Workflow', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflow'), ['controller' => 'Workflow', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['controller' => 'TimeTypeProfiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type Profile'), ['controller' => 'TimeTypeProfiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="timeTypes view large-9 medium-8 columns content">
    <h3><?= h($timeType->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($timeType->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Classification') ?></th>
            <td><?= h($timeType->classification) ?></td>
        </tr>
        <tr>
            <th><?= __('Calc Base') ?></th>
            <td><?= h($timeType->calc_base) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Acc Type') ?></th>
            <td><?= h($timeType->time_acc_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Take Rule') ?></th>
            <td><?= h($timeType->take_rule) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= h($timeType->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $timeType->has('customer') ? $this->Html->link($timeType->customer->name, ['controller' => 'Customers', 'action' => 'view', $timeType->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Unit') ?></th>
            <td><?= $this->Number->format($timeType->unit) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Fractions Days') ?></th>
            <td><?= $this->Number->format($timeType->perm_fractions_days) ?></td>
        </tr>
        <tr>
            <th><?= __('Perm Fractions Hours') ?></th>
            <td><?= $this->Number->format($timeType->perm_fractions_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Flex Req Allow') ?></th>
            <td><?= $timeType->flex_req_allow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Time Type Profiles') ?></h4>
        <?php if (!empty($timeType->time_type_profiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Code') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Country') ?></th>
                <th><?= __('Start Date') ?></th>
                <th><?= __('Time Rec Variant') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Enable Ess') ?></th>
                <th><?= __('External Code') ?></th>
                <th><?= __('Time Type Id') ?></th>
                <th><?= __('Customer Id') ?></th>
                <th><?= __('Workflow Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($timeType->time_type_profiles as $timeTypeProfiles): ?>
            <tr>
                <td><?= h($timeTypeProfiles->id) ?></td>
                <td><?= h($timeTypeProfiles->code) ?></td>
                <td><?= h($timeTypeProfiles->name) ?></td>
                <td><?= h($timeTypeProfiles->country) ?></td>
                <td><?= h($timeTypeProfiles->start_date) ?></td>
                <td><?= h($timeTypeProfiles->time_rec_variant) ?></td>
                <td><?= h($timeTypeProfiles->status) ?></td>
                <td><?= h($timeTypeProfiles->enable_ess) ?></td>
                <td><?= h($timeTypeProfiles->external_code) ?></td>
                <td><?= h($timeTypeProfiles->time_type_id) ?></td>
                <td><?= h($timeTypeProfiles->customer_id) ?></td>
                <td><?= h($timeTypeProfiles->workflow_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TimeTypeProfiles', 'action' => 'view', $timeTypeProfiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TimeTypeProfiles', 'action' => 'edit', $timeTypeProfiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TimeTypeProfiles', 'action' => 'delete', $timeTypeProfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $timeTypeProfiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
