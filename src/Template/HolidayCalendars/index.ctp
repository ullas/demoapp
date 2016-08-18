<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Holiday Calendar'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="holidayCalendars index large-9 medium-8 columns content">
    <h3><?= __('Holiday Calendars') ?></h3>
    <table cellpadding="0" cellspacing="0">
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
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
