<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Emp Data Personal'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empDataPersonals index large-9 medium-8 columns content">
    <h3><?= __('Emp Data Personals') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('salutation') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('initials') ?></th>
                <th><?= $this->Paginator->sort('middle_name') ?></th>
                <th><?= $this->Paginator->sort('first_name_alt1') ?></th>
                <th><?= $this->Paginator->sort('middle_name_alt1') ?></th>
                <th><?= $this->Paginator->sort('last_name_alt1') ?></th>
                <th><?= $this->Paginator->sort('first_name_alt2') ?></th>
                <th><?= $this->Paginator->sort('middle_name_alt2') ?></th>
                <th><?= $this->Paginator->sort('last_name_alt2') ?></th>
                <th><?= $this->Paginator->sort('display_name') ?></th>
                <th><?= $this->Paginator->sort('formal_name') ?></th>
                <th><?= $this->Paginator->sort('birth_name') ?></th>
                <th><?= $this->Paginator->sort('birth_name_alt1') ?></th>
                <th><?= $this->Paginator->sort('birth_name_alt2') ?></th>
                <th><?= $this->Paginator->sort('preferred_name') ?></th>
                <th><?= $this->Paginator->sort('display_name_alt1') ?></th>
                <th><?= $this->Paginator->sort('display_name_alt2') ?></th>
                <th><?= $this->Paginator->sort('formal_name_alt1') ?></th>
                <th><?= $this->Paginator->sort('formal_name_alt2') ?></th>
                <th><?= $this->Paginator->sort('name_format') ?></th>
                <th><?= $this->Paginator->sort('is_overridden') ?></th>
                <th><?= $this->Paginator->sort('nationality') ?></th>
                <th><?= $this->Paginator->sort('second_nationality') ?></th>
                <th><?= $this->Paginator->sort('third_nationality') ?></th>
                <th><?= $this->Paginator->sort('wps_code') ?></th>
                <th><?= $this->Paginator->sort('uniqueid') ?></th>
                <th><?= $this->Paginator->sort('prof_legal') ?></th>
                <th><?= $this->Paginator->sort('exclude_legal') ?></th>
                <th><?= $this->Paginator->sort('nationality_date') ?></th>
                <th><?= $this->Paginator->sort('home_airport') ?></th>
                <th><?= $this->Paginator->sort('religion') ?></th>
                <th><?= $this->Paginator->sort('number_children') ?></th>
                <th><?= $this->Paginator->sort('disability_date') ?></th>
                <th><?= $this->Paginator->sort('disable_group') ?></th>
                <th><?= $this->Paginator->sort('disable_degree') ?></th>
                <th><?= $this->Paginator->sort('disable_type') ?></th>
                <th><?= $this->Paginator->sort('disable_authority') ?></th>
                <th><?= $this->Paginator->sort('disable_ref') ?></th>
                <th><?= $this->Paginator->sort('person_id_external') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empDataPersonals as $empDataPersonal): ?>
            <tr>
                <td><?= $this->Number->format($empDataPersonal->id) ?></td>
                <td><?= h($empDataPersonal->salutation) ?></td>
                <td><?= h($empDataPersonal->first_name) ?></td>
                <td><?= h($empDataPersonal->last_name) ?></td>
                <td><?= h($empDataPersonal->initials) ?></td>
                <td><?= h($empDataPersonal->middle_name) ?></td>
                <td><?= h($empDataPersonal->first_name_alt1) ?></td>
                <td><?= h($empDataPersonal->middle_name_alt1) ?></td>
                <td><?= h($empDataPersonal->last_name_alt1) ?></td>
                <td><?= h($empDataPersonal->first_name_alt2) ?></td>
                <td><?= h($empDataPersonal->middle_name_alt2) ?></td>
                <td><?= h($empDataPersonal->last_name_alt2) ?></td>
                <td><?= h($empDataPersonal->display_name) ?></td>
                <td><?= h($empDataPersonal->formal_name) ?></td>
                <td><?= h($empDataPersonal->birth_name) ?></td>
                <td><?= h($empDataPersonal->birth_name_alt1) ?></td>
                <td><?= h($empDataPersonal->birth_name_alt2) ?></td>
                <td><?= h($empDataPersonal->preferred_name) ?></td>
                <td><?= h($empDataPersonal->display_name_alt1) ?></td>
                <td><?= h($empDataPersonal->display_name_alt2) ?></td>
                <td><?= h($empDataPersonal->formal_name_alt1) ?></td>
                <td><?= h($empDataPersonal->formal_name_alt2) ?></td>
                <td><?= h($empDataPersonal->name_format) ?></td>
                <td><?= h($empDataPersonal->is_overridden) ?></td>
                <td><?= h($empDataPersonal->nationality) ?></td>
                <td><?= h($empDataPersonal->second_nationality) ?></td>
                <td><?= h($empDataPersonal->third_nationality) ?></td>
                <td><?= h($empDataPersonal->wps_code) ?></td>
                <td><?= h($empDataPersonal->uniqueid) ?></td>
                <td><?= h($empDataPersonal->prof_legal) ?></td>
                <td><?= h($empDataPersonal->exclude_legal) ?></td>
                <td><?= h($empDataPersonal->nationality_date) ?></td>
                <td><?= h($empDataPersonal->home_airport) ?></td>
                <td><?= h($empDataPersonal->religion) ?></td>
                <td><?= $this->Number->format($empDataPersonal->number_children) ?></td>
                <td><?= h($empDataPersonal->disability_date) ?></td>
                <td><?= h($empDataPersonal->disable_group) ?></td>
                <td><?= $this->Number->format($empDataPersonal->disable_degree) ?></td>
                <td><?= h($empDataPersonal->disable_type) ?></td>
                <td><?= h($empDataPersonal->disable_authority) ?></td>
                <td><?= h($empDataPersonal->disable_ref) ?></td>
                <td><?= h($empDataPersonal->person_id_external) ?></td>
                <td><?= $empDataPersonal->has('customer') ? $this->Html->link($empDataPersonal->customer->name, ['controller' => 'Customers', 'action' => 'view', $empDataPersonal->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($empDataPersonal->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $empDataPersonal->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $empDataPersonal->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empDataPersonal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataPersonal->id)]) ?>
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
