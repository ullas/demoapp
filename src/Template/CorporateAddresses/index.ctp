<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Corporate Address'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="corporateAddresses index large-9 medium-8 columns content">
    <h3><?= __('Corporate Addresses') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
