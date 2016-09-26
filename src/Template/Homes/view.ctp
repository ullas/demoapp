<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Home'), ['action' => 'edit', $home->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Home'), ['action' => 'delete', $home->id], ['confirm' => __('Are you sure you want to delete # {0}?', $home->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Homes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Home'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="homes view large-9 medium-8 columns content">
    <h3><?= h($home->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($home->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($home->id) ?></td>
        </tr>
    </table>
</div>
