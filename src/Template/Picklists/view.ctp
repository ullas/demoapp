<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Picklist'), ['action' => 'edit', $picklist->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Picklist'), ['action' => 'delete', $picklist->id], ['confirm' => __('Are you sure you want to delete # {0}?', $picklist->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Picklists'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Picklist'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="picklists view large-9 medium-8 columns content">
    <h3><?= h($picklist->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($picklist->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Comments') ?></th>
            <td><?= h($picklist->comments) ?></td>
        </tr>
        <tr>
            <th><?= __('External Code') ?></th>
            <td><?= h($picklist->external_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($picklist->id) ?></td>
        </tr>
    </table>
</div>
