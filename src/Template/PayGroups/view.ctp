<section class="content-header">
  <h1>
    Pay Group
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
            <td><?= h($payGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($payGroup->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Payment Frequency') ?></th>
            <td><?= h($payGroup->payment_frequency) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Contactid') ?></th>
            <td><?= h($payGroup->primary_contactid) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Contact Email') ?></th>
            <td><?= h($payGroup->primary_contact_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Primary Contact Name') ?></th>
            <td><?= h($payGroup->primary_contact_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contactid') ?></th>
            <td><?= h($payGroup->secondary_contactid) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contact Email') ?></th>
            <td><?= h($payGroup->secondary_contact_email) ?></td>
        </tr>
        <tr>
            <th><?= __('Secondary Contact Name') ?></th>
            <td><?= h($payGroup->secondary_contact_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Delimiter') ?></th>
            <td><?= h($payGroup->data_delimiter) ?></td>
        </tr>
        <tr>
            <th><?= __('Decimal Point') ?></th>
            <td><?= h($payGroup->decimal_point) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($payGroup->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($payGroup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Weeks In Pay Period') ?></th>
            <td><?= $this->Number->format($payGroup->weeks_in_pay_period) ?></td>
        </tr>
        <tr>
            <th><?= __('Lag') ?></th>
            <td><?= $this->Number->format($payGroup->lag) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Start Date') ?></th>
            <td><?= h($payGroup->effective_start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective End Date') ?></th>
            <td><?= h($payGroup->effective_end_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Earliest Change Date') ?></th>
            <td><?= h($payGroup->earliest_change_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Effective Status') ?></th>
            <td><?= $payGroup->effective_status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div></div></section>
