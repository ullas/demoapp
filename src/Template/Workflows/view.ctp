<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workflow'), ['action' => 'edit', $workflow->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workflow'), ['action' => 'delete', $workflow->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workflow->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workflows'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflow'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Workflowrules'), ['controller' => 'Workflowrules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workflowrule'), ['controller' => 'Workflowrules', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Time Type Profiles'), ['controller' => 'TimeTypeProfiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Time Type Profile'), ['controller' => 'TimeTypeProfiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workflows view large-9 medium-8 columns content">
    <h3><?= h($workflow->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Workflowrule') ?></th>
            <td><?= $workflow->has('workflowrule') ? $this->Html->link($workflow->workflowrule->name, ['controller' => 'Workflowrules', 'action' => 'view', $workflow->workflowrule->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Lastaction') ?></th>
            <td><?= h($workflow->lastaction) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workflow->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Currentstep') ?></th>
            <td><?= $this->Number->format($workflow->currentstep) ?></td>
        </tr>
        <tr>
            <th><?= __('Customer Id') ?></th>
            <td><?= $this->Number->format($workflow->customer_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Updatetime') ?></th>
            <td><?= h($workflow->updatetime) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Time Type Profiles') ?></h4>
        <?php if (!empty($workflow->time_type_profiles)): ?>
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
            <?php foreach ($workflow->time_type_profiles as $timeTypeProfiles): ?>
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
