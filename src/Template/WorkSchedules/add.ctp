<section class="content-header">
      <h1>
        Work Schedule
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
        <?php
            echo $this->Form->input('ws_name');
            echo $this->Form->input('flex_request_allowed');
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('hours_day');
            echo $this->Form->input('hours_week');
            echo $this->Form->input('hours_month');
            echo $this->Form->input('hours_year');
            echo $this->Form->input('days_week');
            echo $this->Form->input('ws_days');
            echo $this->Form->input('model');
            echo "<div class='form-group'><label>Start Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='start_date'></div></div>";
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
            echo "<div class='form-group'><label>Start Time:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='start_time'></div></div>";
			echo "<div class='form-group'><label>End Time:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='end_time'></div></div>";
            echo $this->Form->input('shift_class');
            echo $this->Form->input('planned_hours');
			echo "<div class='form-group'><label>Planned Hours Minutes:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='planned_hours_minutes'></div></div>";
            echo $this->Form->input('day_model');
            echo $this->Form->input('time_rec_variant_2');
            echo $this->Form->input('search_field');
			echo "<div class='form-group'><label>Starting Date:</label><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control' id='starting_date'></div></div>";
            echo $this->Form->input('period_model');
            echo $this->Form->input('time_rec_variant_3');
            echo $this->Form->input('ws_code');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div></div></section>
<!-- Date picker -->
<?php
$this->Html->css([  'AdminLTE./plugins/datepicker/datepicker3' ], ['block' => 'css']);
$this->Html->script([ 'AdminLTE./plugins/datepicker/bootstrap-datepicker' ], ['block' => 'script']); ?>
<?php $this->start('scriptBotton'); ?>
<script>
  $(function () { 
     $('#start_date').datepicker({ autoclose: true }); 
     $('#start_time').datepicker({ autoclose: true });
     $('#end_time').datepicker({ autoclose: true }); 
     $('#planned_hours_minutes').datepicker({ autoclose: true });
     $('#starting_date').datepicker({ autoclose: true }); 
  });
</script>
<?php $this->end(); ?>