<section class="content-header">
  <h1>
    Holiday Calendar
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'HolidayCalendars', 'action' => 'add')); ?>">Add</a></li>
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
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('valid_from') ?></th>
                <th><?= $this->Paginator->sort('valid_to') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($holidayCalendars as $holidayCalendar): ?>
            <tr>
                <td><?= $this->Number->format($holidayCalendar->id) ?></td>
                <td><?= h($holidayCalendar->calendar) ?></td>
                <td><?= h($holidayCalendar->name) ?></td>
                <td><?= h($holidayCalendar->country) ?></td>
                <td><?= h($holidayCalendar->valid_from) ?></td>
                <td><?= h($holidayCalendar->valid_to) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $holidayCalendar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $holidayCalendar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $holidayCalendar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $holidayCalendar->id)]) ?>
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
