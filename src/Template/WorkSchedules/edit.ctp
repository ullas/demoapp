<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $workSchedule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $workSchedule->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Work Schedules'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="workSchedules form large-9 medium-8 columns content">
    <?= $this->Form->create($workSchedule) ?>
    <fieldset>
        <legend><?= __('Edit Work Schedule') ?></legend>
        <?php
            echo $this->Form->input('ws_name');
            echo $this->Form->input('flex_request_allowed');
            echo $this->Form->input('country');
            echo $this->Form->input('hours_day');
            echo $this->Form->input('hours_week');
            echo $this->Form->input('hours_month');
            echo $this->Form->input('hours_year');
            echo $this->Form->input('days_week');
            echo $this->Form->input('ws_days');
            echo $this->Form->input('model');
            echo $this->Form->input('start_date', ['empty' => true]);
            echo $this->Form->input('day1_planhours');
            echo $this->Form->input('day2_planhours');
            echo $this->Form->input('day3_planhours');
            echo $this->Form->input('day4_planhours');
            echo $this->Form->input('day5_planhours');
            echo $this->Form->input('day7_planhours');
            echo $this->Form->input('day_n_hours');
            echo $this->Form->input('employee');
            echo $this->Form->input('time_rec_variant_1');
            echo $this->Form->input('category');
            echo $this->Form->input('day');
            echo $this->Form->input('start_time', ['empty' => true]);
            echo $this->Form->input('end_time', ['empty' => true]);
            echo $this->Form->input('shift_class');
            echo $this->Form->input('planned_hours');
            echo $this->Form->input('planned_hours_minutes', ['empty' => true]);
            echo $this->Form->input('day_model');
            echo $this->Form->input('time_rec_variant_2');
            echo $this->Form->input('search_field');
            echo $this->Form->input('starting_date', ['empty' => true]);
            echo $this->Form->input('period_model');
            echo $this->Form->input('time_rec_variant_3');
            echo $this->Form->input('ws_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
