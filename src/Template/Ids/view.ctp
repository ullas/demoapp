<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Id'), ['action' => 'edit', $id->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Id'), ['action' => 'delete', $id->id], ['confirm' => __('Are you sure you want to delete # {0}?', $id->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Id'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ids view large-9 medium-8 columns content">
    <h3><?= h($id->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($id->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Card Type') ?></th>
            <td><?= h($id->card_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Nationalid') ?></th>
            <td><?= h($id->nationalid) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($id->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Primary') ?></th>
            <td><?= $id->is_primary ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
