<section class="content-header">
  <h1>
    Corporate Address
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'CorporateAddresses', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('address1') ?></th>
                <th><?= $this->Paginator->sort('address2') ?></th>
                <th><?= $this->Paginator->sort('address3') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('county') ?></th>
                <th><?= $this->Paginator->sort('state') ?></th>
                <th><?= $this->Paginator->sort('province') ?></th>
                <th><?= $this->Paginator->sort('zip_code') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($corporateAddresses as $corporateAddress): ?>
            <tr>
                <td><?= $this->Number->format($corporateAddress->id) ?></td>
                <td><?= h($corporateAddress->start_date) ?></td>
                <td><?= h($corporateAddress->end_date) ?></td>
                <td><?= h($corporateAddress->address1) ?></td>
                <td><?= h($corporateAddress->address2) ?></td>
                <td><?= h($corporateAddress->address3) ?></td>
                <td><?= h($corporateAddress->city) ?></td>
                <td><?= h($corporateAddress->county) ?></td>
                <td><?= h($corporateAddress->state) ?></td>
                <td><?= h($corporateAddress->province) ?></td>
                <td><?= h($corporateAddress->zip_code) ?></td>
                <td><?= h($corporateAddress->country) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $corporateAddress->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corporateAddress->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corporateAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateAddress->id)]) ?>
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
