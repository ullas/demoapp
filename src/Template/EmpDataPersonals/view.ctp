<section class="content-header">
  <h1>
    Emp Data Personal
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table class="table table-hover">
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
            <td><?= h($empDataPersonal->religion) ?></td>
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
</div></div></section>
