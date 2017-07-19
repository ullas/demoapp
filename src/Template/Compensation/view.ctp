<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Compensation'), ['action' => 'edit', $compensation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Compensation'), ['action' => 'delete', $compensation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $compensation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Compensation'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Compensation'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="compensation view large-9 medium-8 columns content">
    <h3><?= h($compensation->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($compensation->id) ?></td>
        </tr>
    </table>
</div>
