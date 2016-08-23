<section class="content-header">
  <h1>
    Event reason
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
            <th><?= __('Name') ?></th>
            <td><?= h($eventReason->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($eventReason->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Event') ?></th>
            <td><?= h($eventReason->event) ?></td>
        </tr>
        <tr>
            <th><?= __('Empl Status') ?></th>
            <td><?= h($eventReason->empl_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Implicit Position Action') ?></th>
            <td><?= h($eventReason->implicit_position_action) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($eventReason->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($eventReason->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($eventReason->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($eventReason->end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $eventReason->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
