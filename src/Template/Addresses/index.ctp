<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addresses index large-9 medium-8 columns content">
    <h3><?= __('Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
                <th><?= $this->Paginator->sort('person_id_external') ?></th>
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
                <td><?= h($address->person_id_external) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $address->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $address->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
