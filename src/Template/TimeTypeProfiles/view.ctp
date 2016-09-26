<section class="content-header">
  <h1>
    Time Type Profile
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
            <th><?= __('Code') ?></th>
            <td><?= h($timeTypeProfile->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($timeTypeProfile->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($timeTypeProfile->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Rec Variant') ?></th>
            <td><?= h($timeTypeProfile->time_rec_variant) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($timeTypeProfile->status) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($timeTypeProfile->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Type') ?></th>
            <td><?= $timeTypeProfile->has('time_type') ? $this->Html->link($timeTypeProfile->time_type->name, ['controller' => 'TimeTypes', 'action' => 'view', $timeTypeProfile->time_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($timeTypeProfile->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($timeTypeProfile->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Enable Ess') ?></th>
            <td><?= $timeTypeProfile->enable_ess ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
