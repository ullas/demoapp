<section class="content-header">
  <h1>
    Calendar Assignment
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'CalendarAssignments', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('calendar') ?></th>
                <th><?= $this->Paginator->sort('assignmentyear') ?></th>
                <th><?= $this->Paginator->sort('assignmentdate') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('holiday_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calendarAssignments as $calendarAssignment): ?>
            <tr>
                <td><?= $this->Number->format($calendarAssignment->id) ?></td>
                <td><?= h($calendarAssignment->calendar) ?></td>
                <td><?= h($calendarAssignment->assignmentyear) ?></td>
                <td><?= h($calendarAssignment->assignmentdate) ?></td>
                <td><?= $calendarAssignment->has('user') ? $this->Html->link($calendarAssignment->user->id, ['controller' => 'Users', 'action' => 'view', $calendarAssignment->user->id]) : '' ?></td>
                <td><?= $calendarAssignment->has('holiday') ? $this->Html->link($calendarAssignment->holiday->name, ['controller' => 'Holidays', 'action' => 'view', $calendarAssignment->holiday->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $calendarAssignment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calendarAssignment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calendarAssignment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendarAssignment->id)]) ?>
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
