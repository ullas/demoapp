<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Emp Data Biography'), ['action' => 'edit', $empDataBiography->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emp Data Biography'), ['action' => 'delete', $empDataBiography->id], ['confirm' => __('Are you sure you want to delete # {0}?', $empDataBiography->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emp Data Biographies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emp Data Biography'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="empDataBiographies view large-9 medium-8 columns content">
    <h3><?= h($empDataBiography->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Country Of Birth') ?></th>
            <td><?= h($empDataBiography->country_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Region Of Birth') ?></th>
            <td><?= h($empDataBiography->region_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Place Of Birth') ?></th>
            <td><?= h($empDataBiography->place_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Birth Name') ?></th>
            <td><?= h($empDataBiography->birth_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Person Id External') ?></th>
            <td><?= h($empDataBiography->person_id_external) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($empDataBiography->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($empDataBiography->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Death') ?></th>
            <td><?= h($empDataBiography->date_of_death) ?></td>
        </tr>
    </table>
</div>