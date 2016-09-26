<section class="content-header">
  <h1>
    Corporate Address
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
            <th><?= __('Address1') ?></th>
            <td><?= h($corporateAddress->address1) ?></td>
        </tr>
        <tr>
            <th><?= __('Address2') ?></th>
            <td><?= h($corporateAddress->address2) ?></td>
        </tr>
        <tr>
            <th><?= __('Address3') ?></th>
            <td><?= h($corporateAddress->address3) ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($corporateAddress->city) ?></td>
        </tr>
        <tr>
            <th><?= __('County') ?></th>
            <td><?= h($corporateAddress->county) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= h($corporateAddress->state) ?></td>
        </tr>
        <tr>
            <th><?= __('Province') ?></th>
            <td><?= h($corporateAddress->province) ?></td>
        </tr>
        <tr>
            <th><?= __('Zip Code') ?></th>
            <td><?= h($corporateAddress->zip_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($corporateAddress->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($corporateAddress->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($corporateAddress->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('End Date') ?></th>
            <td><?= h($corporateAddress->end_date) ?></td>
        </tr>
    </table>
</div></div></section>
