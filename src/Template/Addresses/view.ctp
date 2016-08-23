<section class="content-header">
  <h1>
    Address
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
            <th><?= __('Address No') ?></th>
            <td><?= h($address->address_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Address1') ?></th>
            <td><?= h($address->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Address2') ?></th>
            <td><?= h($address->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Address3') ?></th>
            <td><?= h($address->address3) ?></td>
        </tr>
        <tr>
            <th><?= __('Address4') ?></th>
            <td><?= h($address->address4) ?></td>
        </tr>
        <tr>
            <th><?= __('Address5') ?></th>
            <td><?= h($address->address5) ?></td>
        </tr>
        <tr>
            <th><?= __('Address6') ?></th>
            <td><?= h($address->address6) ?></td>
        </tr>
        <tr>
            <th><?= __('Address7') ?></th>
            <td><?= h($address->address7) ?></td>
        </tr>
        <tr>
            <th><?= __('Address8') ?></th>
            <td><?= h($address->address8) ?></td>
        </tr>
        <tr>
            <th><?= __('Zip Code') ?></th>
            <td><?= h($address->zip_code) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($address->city) ?></td>
        </tr>
        <tr>
            <th><?= __('County') ?></th>
            <td><?= h($address->county) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($address->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Emp Data Biography') ?></th>
            <td><?= $address->has('emp_data_biography') ? $this->Html->link($address->emp_data_biography->id, ['controller' => 'EmpDataBiographies', 'action' => 'view', $address->emp_data_biography->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
    </table>
</div></div></section>
