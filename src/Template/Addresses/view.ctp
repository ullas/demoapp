<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Address'), ['action' => 'edit', $address->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Address'), ['action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addresses view large-9 medium-8 columns content">
    <h3><?= h($address->id) ?></h3>
    <table class="vertical-table">
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
            <th><?= __('Person Id External') ?></th>
            <td><?= h($address->person_id_external) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($address->id) ?></td>
        </tr>
    </table>
</div>
