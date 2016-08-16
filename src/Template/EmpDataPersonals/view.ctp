<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emp Data Personal'), ['action' => 'edit', $empDataPersonal->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emp Data Personal'), ['action' => 'delete', $empDataPersonal->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataPersonal->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Personals'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Personal'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empDataPersonals view large-9 medium-8 columns content">
    <h3><?= h($empDataPersonal->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Salutation') ?></th>
            <td><?= h($empDataPersonal->salutation) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($empDataPersonal->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($empDataPersonal->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Initials') ?></th>
            <td><?= h($empDataPersonal->initials) ?></td>
        </tr>
        <tr>
            <th><?= __('Middle Name') ?></th>
            <td><?= h($empDataPersonal->middle_name) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name Alt1') ?></th>
            <td><?= h($empDataPersonal->first_name_alt1) ?></td>
        </tr>
        <tr>
            <th><?= __('Middle Name Alt1') ?></th>
            <td><?= h($empDataPersonal->middle_name_alt1) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name Alt1') ?></th>
            <td><?= h($empDataPersonal->last_name_alt1) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name Alt2') ?></th>
            <td><?= h($empDataPersonal->first_name_alt2) ?></td>
        </tr>
        <tr>
            <th><?= __('Middle Name Alt2') ?></th>
            <td><?= h($empDataPersonal->middle_name_alt2) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name Alt2') ?></th>
            <td><?= h($empDataPersonal->last_name_alt2) ?></td>
        </tr>
        <tr>
            <th><?= __('Display Name') ?></th>
            <td><?= h($empDataPersonal->display_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Formal Name') ?></th>
            <td><?= h($empDataPersonal->formal_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Name') ?></th>
            <td><?= h($empDataPersonal->birth_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Name Alt1') ?></th>
            <td><?= h($empDataPersonal->birth_name_alt1) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Name Alt2') ?></th>
            <td><?= h($empDataPersonal->birth_name_alt2) ?></td>
        </tr>
        <tr>
            <th><?= __('Preferred Name') ?></th>
            <td><?= h($empDataPersonal->preferred_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Display Name Alt1') ?></th>
            <td><?= h($empDataPersonal->display_name_alt1) ?></td>
        </tr>
        <tr>
            <th><?= __('Display Name Alt2') ?></th>
            <td><?= h($empDataPersonal->display_name_alt2) ?></td>
        </tr>
        <tr>
            <th><?= __('Formal Name Alt1') ?></th>
            <td><?= h($empDataPersonal->formal_name_alt1) ?></td>
        </tr>
        <tr>
            <th><?= __('Formal Name Alt2') ?></th>
            <td><?= h($empDataPersonal->formal_name_alt2) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Format') ?></th>
            <td><?= h($empDataPersonal->name_format) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationality') ?></th>
            <td><?= h($empDataPersonal->nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('Second Nationality') ?></th>
            <td><?= h($empDataPersonal->second_nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('Third Nationality') ?></th>
            <td><?= h($empDataPersonal->third_nationality) ?></td>
        </tr>
        <tr>
            <th><?= __('Wps Code') ?></th>
            <td><?= h($empDataPersonal->wps_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Uniqueid') ?></th>
            <td><?= h($empDataPersonal->uniqueid) ?></td>
        </tr>
        <tr>
            <th><?= __('Prof Legal') ?></th>
            <td><?= h($empDataPersonal->prof_legal) ?></td>
        </tr>
        <tr>
            <th><?= __('Exclude Legal') ?></th>
            <td><?= h($empDataPersonal->exclude_legal) ?></td>
        </tr>
        <tr>
            <th><?= __('Home Airport') ?></th>
            <td><?= h($empDataPersonal->home_airport) ?></td>
        </tr>
        <tr>
            <th><?= __('Religion') ?></th>
            <td><?= h($empDataPersonal->Religion) ?></td>
        </tr>
        <tr>
            <th><?= __('Disable Group') ?></th>
            <td><?= h($empDataPersonal->disable_group) ?></td>
        </tr>
        <tr>
            <th><?= __('Disable Type') ?></th>
            <td><?= h($empDataPersonal->disable_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Disable Authority') ?></th>
            <td><?= h($empDataPersonal->disable_authority) ?></td>
        </tr>
        <tr>
            <th><?= __('Disable Ref') ?></th>
            <td><?= h($empDataPersonal->disable_ref) ?></td>
        </tr>
        <tr>
            <th><?= __('Person Id External') ?></th>
            <td><?= h($empDataPersonal->person_id_external) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($empDataPersonal->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Number Children') ?></th>
            <td><?= $this->Number->format($empDataPersonal->number_children) ?></td>
        </tr>
        <tr>
            <th><?= __('Disable Degree') ?></th>
            <td><?= $this->Number->format($empDataPersonal->disable_degree) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationality Date') ?></th>
            <td><?= h($empDataPersonal->nationality_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Disability Date') ?></th>
            <td><?= h($empDataPersonal->disability_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Overridden') ?></th>
            <td><?= $empDataPersonal->is_overridden ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
