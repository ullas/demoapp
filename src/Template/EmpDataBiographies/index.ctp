<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="empDataBiographies index large-9 medium-8 columns content">
    <h3><?= __('Emp Data Biographies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th><?= $this->Paginator->sort('country_of_birth') ?></th>
                <th><?= $this->Paginator->sort('region_of_birth') ?></th>
                <th><?= $this->Paginator->sort('place_of_birth') ?></th>
                <th><?= $this->Paginator->sort('birth_name') ?></th>
                <th><?= $this->Paginator->sort('date_of_death') ?></th>
                <th><?= $this->Paginator->sort('person_id_external') ?></th>
                <th><?= $this->Paginator->sort('customer_id') ?></th>
                <th><?= $this->Paginator->sort('employee_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($empDataBiographies as $empDataBiography): ?>
            <tr>
                <td><?= $this->Number->format($empDataBiography->id) ?></td>
                <td><?= h($empDataBiography->date_of_birth) ?></td>
                <td><?= h($empDataBiography->country_of_birth) ?></td>
                <td><?= h($empDataBiography->region_of_birth) ?></td>
                <td><?= h($empDataBiography->place_of_birth) ?></td>
                <td><?= h($empDataBiography->birth_name) ?></td>
                <td><?= h($empDataBiography->date_of_death) ?></td>
                <td><?= h($empDataBiography->person_id_external) ?></td>
                <td><?= $empDataBiography->has('customer') ? $this->Html->link($empDataBiography->customer->name, ['controller' => 'Customers', 'action' => 'view', $empDataBiography->customer->id]) : '' ?></td>
                <td><?= $this->Number->format($empDataBiography->employee_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $empDataBiography->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $empDataBiography->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $empDataBiography->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataBiography->id)]) ?>
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
