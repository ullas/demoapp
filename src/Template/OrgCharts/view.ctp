<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Org Chart'), ['action' => 'edit', $orgChart->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Org Chart'), ['action' => 'delete', $orgChart->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orgChart->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Org Charts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Org Chart'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orgCharts view large-9 medium-8 columns content">
    <h3><?= h($orgChart->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($orgChart->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($orgChart->id) ?></td>
        </tr>
    </table>
</div>
