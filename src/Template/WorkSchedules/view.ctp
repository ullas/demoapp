<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Work Schedule'), ['action' => 'edit', $workSchedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Work Schedule'), ['action' => 'delete', $workSchedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workSchedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Work Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Work Schedule'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workSchedules view large-9 medium-8 columns content">
    <h3><?= h($workSchedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ws Name') ?></th>
            <td><?= h($workSchedule->ws_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= h($workSchedule->country) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= h($workSchedule->model) ?></td>
        </tr>
        <tr>
            <th><?= __('Employee') ?></th>
            <td><?= h($workSchedule->employee) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Rec Variant 1') ?></th>
            <td><?= h($workSchedule->time_rec_variant_1) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= h($workSchedule->category) ?></td>
        </tr>
        <tr>
            <th><?= __('Shift Class') ?></th>
            <td><?= h($workSchedule->shift_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Day Model') ?></th>
            <td><?= h($workSchedule->day_model) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Rec Variant 2') ?></th>
            <td><?= h($workSchedule->time_rec_variant_2) ?></td>
        </tr>
        <tr>
            <th><?= __('Search Field') ?></th>
            <td><?= h($workSchedule->search_field) ?></td>
        </tr>
        <tr>
            <th><?= __('Period Model') ?></th>
            <td><?= h($workSchedule->period_model) ?></td>
        </tr>
        <tr>
            <th><?= __('Time Rec Variant 3') ?></th>
            <td><?= h($workSchedule->time_rec_variant_3) ?></td>
        </tr>
        <tr>
            <th><?= __('Ws Code') ?></th>
            <td><?= h($workSchedule->ws_code) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($workSchedule->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Hours Day') ?></th>
            <td><?= $this->Number->format($workSchedule->hours_day) ?></td>
        </tr>
        <tr>
            <th><?= __('Hours Week') ?></th>
            <td><?= $this->Number->format($workSchedule->hours_week) ?></td>
        </tr>
        <tr>
            <th><?= __('Hours Month') ?></th>
            <td><?= $this->Number->format($workSchedule->hours_month) ?></td>
        </tr>
        <tr>
            <th><?= __('Hours Year') ?></th>
            <td><?= $this->Number->format($workSchedule->hours_year) ?></td>
        </tr>
        <tr>
            <th><?= __('Days Week') ?></th>
            <td><?= $this->Number->format($workSchedule->days_week) ?></td>
        </tr>
        <tr>
            <th><?= __('Ws Days') ?></th>
            <td><?= $this->Number->format($workSchedule->ws_days) ?></td>
        </tr>
        <tr>
            <th><?= __('Day1 Planhours') ?></th>
            <td><?= $this->Number->format($workSchedule->day1_planhours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day2 Planhours') ?></th>
            <td><?= $this->Number->format($workSchedule->day2_planhours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day3 Planhours') ?></th>
            <td><?= $this->Number->format($workSchedule->day3_planhours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day4 Planhours') ?></th>
            <td><?= $this->Number->format($workSchedule->day4_planhours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day5 Planhours') ?></th>
            <td><?= $this->Number->format($workSchedule->day5_planhours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day7 Planhours') ?></th>
            <td><?= $this->Number->format($workSchedule->day7_planhours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day N Hours') ?></th>
            <td><?= $this->Number->format($workSchedule->day_n_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Day') ?></th>
            <td><?= $this->Number->format($workSchedule->day) ?></td>
        </tr>
        <tr>
            <th><?= __('Planned Hours') ?></th>
            <td><?= $this->Number->format($workSchedule->planned_hours) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Date') ?></th>
            <td><?= h($workSchedule->start_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Start Time') ?></th>
            <td><?= h($workSchedule->start_time) ?></td>
        </tr>
        <tr>
            <th><?= __('End Time') ?></th>
            <td><?= h($workSchedule->end_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Planned Hours Minutes') ?></th>
            <td><?= h($workSchedule->planned_hours_minutes) ?></td>
        </tr>
        <tr>
            <th><?= __('Starting Date') ?></th>
            <td><?= h($workSchedule->starting_date) ?></td>
        </tr>
        <tr>
            <th><?= __('Flex Request Allowed') ?></th>
            <td><?= $workSchedule->flex_request_allowed ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
