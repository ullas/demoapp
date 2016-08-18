<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Corporate Address'), ['action' => 'edit', $corporateAddress->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Corporate Address'), ['action' => 'delete', $corporateAddress->id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateAddress->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Corporate Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Corporate Address'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="corporateAddresses view large-9 medium-8 columns content">
    <h3><?= h($corporateAddress->id) ?></h3>
    <table class="vertical-table">
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
</div>
