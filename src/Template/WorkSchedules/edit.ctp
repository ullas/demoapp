<?= $this->element('templateelmnt'); ?>
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
            echo $this->Form->input('ws_code',['label'=>'Workschedule External Code']);
            echo $this->Form->input('ws_name',['label'=>'Workschedule Name']);
            echo $this->Form->input('flex_request_allowed',['label'=>'Flexible Requesting Allowed']);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('hours_day',['label'=>'Average Hours Per Day']);
            echo $this->Form->input('hours_week',['label'=>'Average Hours Per Week']);
            echo $this->Form->input('hours_month',['label'=>'Average Hours Per Month']);
            echo $this->Form->input('hours_year',['label'=>'Average Hours Per Year']);
            echo $this->Form->input('days_week',['label'=>'Average Working Days Per Week']);
            echo $this->Form->input('ws_days',['label'=>'Work Schedule Days']);
            echo $this->Form->input('model',['class'=>'select2','options' => array('Simple',' Period',' Schedule','Day'), 'empty' => 'Choose']);
            echo $this->Form->input('start_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('day1_planhours',['label'=>'Day 1 Planned Hours']);
            echo $this->Form->input('day2_planhours',['label'=>'Day 2 Planned Hours']);
            echo $this->Form->input('day3_planhours',['label'=>'Day 3 Planned Hours']);
            echo $this->Form->input('day4_planhours',['label'=>'Day 4 Planned Hours']);
            echo $this->Form->input('day5_planhours',['label'=>'Day 5 Planned Hours']);
			echo $this->Form->input('day6_planhours',['label'=>'Day 6 Planned Hours']);
            echo $this->Form->input('day7_planhours',['label'=>'Day 7 Planned Hours']);
            echo $this->Form->input('day_n_hours',['label'=>'Day N Hours']);
            echo $this->Form->input('employee_id',['label'=>'Individual Employee']);
            echo $this->Form->input('time_rec_variant_1',['label'=>'Time Recording Variant']);
            echo $this->Form->input('category');
            echo $this->Form->input('day');
            echo $this->Form->input('start_time',['label'=>'Segment Clock Start Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('end_time',['label'=>'Segment Clock End Time','class' => 'mptltp','type' => 'text','templateVars' => ['opentag' => '<div class="bootstrap-timepicker">','closetag' => '</div>','icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('shift_class',['label'=>'Shift Classification']);
            echo $this->Form->input('planned_hours',['label'=>'Segment Planned Hours']);
			echo $this->Form->input('planned_hours_minutes',['label'=>'Segment Planned Hours and Minutes','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('day_model',['label'=>'Day 6 Planned Hours']);
            echo $this->Form->input('time_rec_variant_2',['label'=>'Time Recording Variant']);
            echo $this->Form->input('search_field');
			echo $this->Form->input('starting_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('period_model');
            echo $this->Form->input('time_rec_variant_3',['label'=>'Time Recording Variant']);
            
        ?>
    </fieldset>
    <div class="box-footer">
    	<?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    	<?= $this->Form->button(__('Update'),['title'=>'Update','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div></section>

<?php $this->start('scriptBotton'); ?>
<script>
 
$(function () {
  	//initially hide all on page load
  	showHideSimple("none");
  	showHidePeriod("none");
  	showHideSchedule("none");
  	showHideDay("none");
  	var selval=$('#model').val();
  	if (selval === '0'){
        showHideSimple("block");
    } else if (selval === '1'){
        showHidePeriod("block");
    }else if (selval === '2'){
        showHideSchedule("block");
    }else if (selval === '3'){
        showHideDay("block");
    }
     
    //model onchange   	
  	$('#model').on('change', function () {
		//initially hide all
  		showHideSimple("none");
  		showHidePeriod("none");
  		showHideSchedule("none");
  		showHideDay("none");
    	if (this.value === '0'){
        	showHideSimple("block");
    	} else if (this.value === '1'){
        	showHidePeriod("block");
    	}else if (this.value === '2'){
        	showHideSchedule("block");
    	}else if (this.value === '3'){
        	showHideDay("block");
    	}
	});

});
function showHideSimple(prop){
	$("#start-date").parents('.col-md-4').css({'display' : prop});
	$("#day1-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day2-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day3-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day4-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day5-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day6-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day7-planhours").parents('.col-md-4').css({'display' : prop});
	$("#day-n-hours").parents('.col-md-4').css({'display' : prop});
	$("#employee-id").parents('.col-md-4').css({'display' : prop});
}
function showHidePeriod(prop){
	$("#time-rec-variant-1").parents('.col-md-4').css({'display' : prop});
	$("#category").parents('.col-md-4').css({'display' : prop});
	$("#day").parents('.col-md-4').css({'display' : prop});
	$("#start-time").parents('.col-md-4').css({'display' : prop});
	$("#end-time").parents('.col-md-4').css({'display' : prop});
	$("#shift-class").parents('.col-md-4').css({'display' : prop});
	$("#planned-hours").parents('.col-md-4').css({'display' : prop});
	$("#planned-hours-minutes").parents('.col-md-4').css({'display' : prop});
	$("#day-model").parents('.col-md-4').css({'display' : prop});
}
function showHideSchedule(prop){
	$("#time-rec-variant-2").parents('.col-md-4').css({'display' : prop});
	$("#search-field").parents('.col-md-4').css({'display' : prop});
	$("#starting-date").parents('.col-md-4').css({'display' : prop});
	$("#period-model").parents('.col-md-4').css({'display' : prop});
}
function showHideDay(prop){
	$("#time-rec-variant-3").parents('.col-md-4').css({'display' : prop});
	$("#start-time").parents('.col-md-4').css({'display' : prop});
	$("#end-time").parents('.col-md-4').css({'display' : prop});
	$("#category").parents('.col-md-4').css({'display' : prop});
	$("#shift-class").parents('.col-md-4').css({'display' : prop});
	$("#planned-hours").parents('.col-md-4').css({'display' : prop});
	$("#planned-hours-minutes").parents('.col-md-4').css({'display' : prop});
}
</script>
<?php $this->end(); ?>
