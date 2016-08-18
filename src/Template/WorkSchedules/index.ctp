<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Work Schedule'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workSchedules index large-9 medium-8 columns content">
    <h3><?= __('Work Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ws_name') ?></th>
                <th><?= $this->Paginator->sort('flex_request_allowed') ?></th>
                <th><?= $this->Paginator->sort('country') ?></th>
                <th><?= $this->Paginator->sort('hours_day') ?></th>
                <th><?= $this->Paginator->sort('hours_week') ?></th>
                <th><?= $this->Paginator->sort('hours_month') ?></th>
                <th><?= $this->Paginator->sort('hours_year') ?></th>
                <th><?= $this->Paginator->sort('days_week') ?></th>
                <th><?= $this->Paginator->sort('ws_days') ?></th>
                <th><?= $this->Paginator->sort('model') ?></th>
                <th><?= $this->Paginator->sort('start_date') ?></th>
                <th><?= $this->Paginator->sort('day1_planhours') ?></th>
                <th><?= $this->Paginator->sort('day2_planhours') ?></th>
                <th><?= $this->Paginator->sort('day3_planhours') ?></th>
                <th><?= $this->Paginator->sort('day4_planhours') ?></th>
                <th><?= $this->Paginator->sort('day5_planhours') ?></th>
                <th><?= $this->Paginator->sort('day7_planhours') ?></th>
                <th><?= $this->Paginator->sort('day_n_hours') ?></th>
                <th><?= $this->Paginator->sort('employee') ?></th>
                <th><?= $this->Paginator->sort('time_rec_variant_1') ?></th>
                <th><?= $this->Paginator->sort('category') ?></th>
                <th><?= $this->Paginator->sort('day') ?></th>
                <th><?= $this->Paginator->sort('start_time') ?></th>
                <th><?= $this->Paginator->sort('end_time') ?></th>
                <th><?= $this->Paginator->sort('shift_class') ?></th>
                <th><?= $this->Paginator->sort('planned_hours') ?></th>
                <th><?= $this->Paginator->sort('planned_hours_minutes') ?></th>
                <th><?= $this->Paginator->sort('day_model') ?></th>
                <th><?= $this->Paginator->sort('time_rec_variant_2') ?></th>
                <th><?= $this->Paginator->sort('search_field') ?></th>
                <th><?= $this->Paginator->sort('starting_date') ?></th>
                <th><?= $this->Paginator->sort('period_model') ?></th>
                <th><?= $this->Paginator->sort('time_rec_variant_3') ?></th>
                <th><?= $this->Paginator->sort('ws_code') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workSchedules as $workSchedule): ?>
            <tr>
                <td><?= $this->Number->format($workSchedule->id) ?></td>
                <td><?= h($workSchedule->ws_name) ?></td>
                <td><?= h($workSchedule->flex_request_allowed) ?></td>
                <td><?= h($workSchedule->country) ?></td>
                <td><?= $this->Number->format($workSchedule->hours_day) ?></td>
                <td><?= $this->Number->format($workSchedule->hours_week) ?></td>
                <td><?= $this->Number->format($workSchedule->hours_month) ?></td>
                <td><?= $this->Number->format($workSchedule->hours_year) ?></td>
                <td><?= $this->Number->format($workSchedule->days_week) ?></td>
                <td><?= $this->Number->format($workSchedule->ws_days) ?></td>
                <td><?= h($workSchedule->model) ?></td>
                <td><?= h($workSchedule->start_date) ?></td>
                <td><?= $this->Number->format($workSchedule->day1_planhours) ?></td>
                <td><?= $this->Number->format($workSchedule->day2_planhours) ?></td>
                <td><?= $this->Number->format($workSchedule->day3_planhours) ?></td>
                <td><?= $this->Number->format($workSchedule->day4_planhours) ?></td>
                <td><?= $this->Number->format($workSchedule->day5_planhours) ?></td>
                <td><?= $this->Number->format($workSchedule->day7_planhours) ?></td>
                <td><?= $this->Number->format($workSchedule->day_n_hours) ?></td>
                <td><?= h($workSchedule->employee) ?></td>
                <td><?= h($workSchedule->time_rec_variant_1) ?></td>
                <td><?= h($workSchedule->category) ?></td>
                <td><?= $this->Number->format($workSchedule->day) ?></td>
                <td><?= h($workSchedule->start_time) ?></td>
                <td><?= h($workSchedule->end_time) ?></td>
                <td><?= h($workSchedule->shift_class) ?></td>
                <td><?= $this->Number->format($workSchedule->planned_hours) ?></td>
                <td><?= h($workSchedule->planned_hours_minutes) ?></td>
                <td><?= h($workSchedule->day_model) ?></td>
                <td><?= h($workSchedule->time_rec_variant_2) ?></td>
                <td><?= h($workSchedule->search_field) ?></td>
                <td><?= h($workSchedule->starting_date) ?></td>
                <td><?= h($workSchedule->period_model) ?></td>
                <td><?= h($workSchedule->time_rec_variant_3) ?></td>
                <td><?= h($workSchedule->ws_code) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workSchedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workSchedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workSchedule->id)]) ?>
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
