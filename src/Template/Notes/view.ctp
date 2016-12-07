<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Note'), ['action' => 'edit', $note->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Note'), ['action' => 'delete', $note->id], ['confirm' => __('Are you sure you want to delete # {0}?', $note->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Notes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Note'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Empdatabiographies'), ['controller' => 'EmpDataBiographies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Empdatabiography'), ['controller' => 'EmpDataBiographies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="notes view large-9 medium-8 columns content">
    <h3><?= h($note->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $note->has('user') ? $this->Html->link($note->user->id, ['controller' => 'Users', 'action' => 'view', $note->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($note->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Empdatabiography') ?></th>
            <td><?= $note->has('empdatabiography') ? $this->Html->link($note->empdatabiography->id, ['controller' => 'EmpDataBiographies', 'action' => 'view', $note->empdatabiography->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $note->has('customer') ? $this->Html->link($note->customer->name, ['controller' => 'Customers', 'action' => 'view', $note->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($note->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Visibleto') ?></th>
            <td><?= $this->Number->format($note->visibleto) ?></td>
        </tr>
        <tr>
            <th><?= __('Created At') ?></th>
            <td><?= h($note->created_at) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified At') ?></th>
            <td><?= h($note->modified_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($note->description)); ?>
    </div>
</div>
