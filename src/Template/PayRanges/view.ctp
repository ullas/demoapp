<section class="content-header">
  <h1>
    Pay Range
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
            <td><?= h($payRange->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payRange->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($payRange->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Currency') ?></th>
            <td><?= h($payRange->currency) ?></td>
        </tr>
        <tr>
            <th><?= __('Frequency Code') ?></th>
            <td><?= h($payRange->frequency_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Geo Zone') ?></th>
            <td><?= h($payRange->geo_zone) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payRange->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Legal Entity') ?></th>
            <td><?= $payRange->has('legal_entity') ? $this->Html->link($payRange->legal_entity->name, ['controller' => 'LegalEntities', 'action' => 'view', $payRange->legal_entity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Pay Group') ?></th>
            <td><?= $payRange->has('pay_group') ? $this->Html->link($payRange->pay_group->name, ['controller' => 'PayGroups', 'action' => 'view', $payRange->pay_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Minimum Pay') ?></th>
            <td><?= $this->Number->format($payRange->minimum_pay) ?></td>
        </tr>
        <tr>
            <th><?= __('Maximum Pay') ?></th>
            <td><?= $this->Number->format($payRange->maximum_pay) ?></td>
        </tr>
        <tr>
            <th><?= __('Increment') ?></th>
            <td><?= $this->Number->format($payRange->increment) ?></td>
        </tr>
        <tr>
            <th><?= __('Incr Percentage') ?></th>
            <td><?= $this->Number->format($payRange->incr_percentage) ?></td>
        </tr>
        <tr>
            <th><?= __('Mid Point') ?></th>
            <td><?= $this->Number->format($payRange->mid_point) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payRange->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($payRange->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($payRange->end_date) ?></td>
        </tr>
    </table>
</div></div></section>
