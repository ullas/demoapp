<section class="content-header">
      <h1>
        Division
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($workSchedule) ?>
    <fieldset>
        <legend><?= __('Add Work Schedule') ?></legend>
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
