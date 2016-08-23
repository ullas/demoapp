<section class="content-header">
  <h1>
    Event Reason
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'EventReasons', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box box-primary"><div class="box-body">
    <table cellpadding="0" cellspacing="0" class="table table-hover">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('end_date') ?></th>
                <th><?= $this->Paginator->sort('event') ?></th>
                <th><?= $this->Paginator->sort('empl_status') ?></th>
                <th><?= $this->Paginator->sort('implicit_position_action') ?></th>
                <th><?= $this->Paginator->sort('external_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($eventReasons as $eventReason): ?>
            <tr>
                <td><?= $this->Number->format($eventReason->id) ?></td>
                <td><?= h($eventReason->name) ?></td>
                <td><?= h($eventReason->description) ?></td>
                <td><?= h($eventReason->status) ?></td>
                <td><?= h($eventReason->start_date) ?></td>
                <td><?= h($eventReason->end_date) ?></td>
                <td><?= h($eventReason->event) ?></td>
                <td><?= h($eventReason->empl_status) ?></td>
                <td><?= h($eventReason->implicit_position_action) ?></td>
                <td><?= h($eventReason->external_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $eventReason->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $eventReason->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $eventReason->id], ['confirm' => __('Are you sure you want to delete # {0}?', $eventReason->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table></div></div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</section>
