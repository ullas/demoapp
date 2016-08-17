<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Legal Entity'), ['action' => 'edit', $legalEntity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Legal Entity'), ['action' => 'delete', $legalEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $legalEntity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Legal Entities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Legal Entity'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pay Groups'), ['controller' => 'PayGroups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pay Group'), ['controller' => 'PayGroups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="legalEntities view large-9 medium-8 columns content">
    <h3><?= h($legalEntity->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($legalEntity->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($legalEntity->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Country Of Registration') ?></th>
            <td><?= h($legalEntity->country_of_registration) ?></td>
        </tr>
        <tr>
            <th><?= __('Official Language') ?></th>
            <td><?= h($legalEntity->official_language) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($legalEntity->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= $legalEntity->has('location') ? $this->Html->link($legalEntity->location->name, ['controller' => 'Locations', 'action' => 'view', $legalEntity->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Group') ?></th>
            <td><?= $legalEntity->has('pay_group') ? $this->Html->link($legalEntity->pay_group->name, ['controller' => 'PayGroups', 'action' => 'view', $legalEntity->pay_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($legalEntity->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Standard Weekly Hours') ?></th>
            <td><?= $this->Number->format($legalEntity->standard_weekly_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= $this->Number->format($legalEntity->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($legalEntity->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($legalEntity->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $legalEntity->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
