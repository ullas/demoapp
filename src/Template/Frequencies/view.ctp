<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Frequency'), ['action' => 'edit', $frequency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Frequency'), ['action' => 'delete', $frequency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frequency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Frequencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frequency'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="frequencies view large-9 medium-8 columns content">
    <h3><?= h($frequency->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($frequency->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($frequency->description) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($frequency->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($frequency->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Annualization Factor') ?></th>
            <td><?= $this->Number->format($frequency->annualization_factor) ?></td>
        </tr>
    </table>
</div>
