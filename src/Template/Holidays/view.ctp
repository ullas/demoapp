<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Holiday'), ['action' => 'edit', $holiday->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Holiday'), ['action' => 'delete', $holiday->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holiday->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Holidays'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Holiday'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="holidays view large-9 medium-8 columns content">
    <h3><?= h($holiday->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Holiday Class') ?></th>
            <td><?= h($holiday->holiday_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($holiday->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Holiday Code') ?></th>
            <td><?= h($holiday->holiday_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($holiday->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= h($holiday->date) ?></td>
        </tr>
    </table>
</div>
