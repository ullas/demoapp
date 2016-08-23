<section class="content-header">
  <h1>
    Address
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Addresses', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('address_no') ?></th>
                <th><?= $this->Paginator->sort('address1') ?></th>
                <th><?= $this->Paginator->sort('address2') ?></th>
                <th><?= $this->Paginator->sort('address3') ?></th>
                <th><?= $this->Paginator->sort('address4') ?></th>
                <th><?= $this->Paginator->sort('address5') ?></th>
                <th><?= $this->Paginator->sort('address6') ?></th>
                <th><?= $this->Paginator->sort('address7') ?></th>
                <th><?= $this->Paginator->sort('address8') ?></th>
                <th><?= $this->Paginator->sort('zip_code') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('county') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('emp_data_biographies_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addresses as $address): ?>
            <tr>
                <td><?= $this->Number->format($address->id) ?></td>
                <td><?= h($address->address_no) ?></td>
                <td><?= h($address->address1) ?></td>
                <td><?= h($address->address2) ?></td>
                <td><?= h($address->address3) ?></td>
                <td><?= h($address->address4) ?></td>
                <td><?= h($address->address5) ?></td>
                <td><?= h($address->address6) ?></td>
                <td><?= h($address->address7) ?></td>
                <td><?= h($address->address8) ?></td>
                <td><?= h($address->zip_code) ?></td>
                <td><?= h($address->city) ?></td>
                <td><?= h($address->county) ?></td>
                <td><?= h($address->state) ?></td>
                <td><?= $address->has('emp_data_biography') ? $this->Html->link($address->emp_data_biography->id, ['controller' => 'EmpDataBiographies', 'action' => 'view', $address->emp_data_biography->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
