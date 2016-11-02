<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Job
                <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content"><?= $this->Form->create($job) ?>
	<div class="box box-primary" style="border-color:transparent;"><div class="box-body">
		<div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          	<li  class="active"><a href="#jobclass" data-toggle="tab">Details</a></li>	
            <li><a href="#jobfunction" data-toggle="tab">Job Functions</a></li>
           <li><a href="#jobinfo" data-toggle="tab">Job Infos</a></li>  
        </ul>
        
        <div class=" tab-content">
          <div class="active tab-pane" id="jobclass">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
                echo $this->Form->input('job_class.name');
            echo $this->Form->input('job_class.description');
            echo $this->Form->input('job_class.effective_status');
			echo $this->Form->input('job_class.emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_class.emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('job_class.worker_comp_code');
            echo $this->Form->input('job_class.default_job_level');
            echo $this->Form->input('job_class.standard_weekly_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('job_class.regular_temporary');
            echo $this->Form->input('job_class.default_employee_class');
            echo $this->Form->input('job_class.full_time_employee');
            echo $this->Form->input('job_class.default_supervisor_level');
            echo $this->Form->input('job_class.external_code');
            echo $this->Form->input('job_class.pay_grade_id', ['class'=>'select2','options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('job_class.job_function_id', ['class'=>'select2','options' => $jobFunctions, 'empty' => true]);
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="jobfunction">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            echo $this->Form->input('job_function.name');
            echo $this->Form->input('job_function.description');
            echo $this->Form->input('job_function.effective_status');
            echo $this->Form->input('job_function.emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_function.emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('job_function.job_function_type');
            echo $this->Form->input('job_function.external_code');
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php

			echo $this->Form->input('job_info.position');
			echo $this->Form->input('job_info.emp_data_biography.position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.time_in_position',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('job_info.company');
            echo $this->Form->input('job_info.country_of_company');
            echo $this->Form->input('job_info.business_unit');
            echo $this->Form->input('job_info.division');
            echo $this->Form->input('job_info.department');
            echo $this->Form->input('job_info.location',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location"></i></div>']]);
            echo $this->Form->input('job_info.timezone');
            echo $this->Form->input('job_info.cost_center');
            echo $this->Form->input('job_info.job_code');
            echo $this->Form->input('job_title');
            echo $this->Form->input('job_info.local_job_title');
            echo $this->Form->input('job_info.employee_class');
            echo $this->Form->input('job_info.pay_grade');
            echo $this->Form->input('job_info.regular_temp');
            echo $this->Form->input('job_info.standard_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('job_info.working_days_per_week');
            echo $this->Form->input('job_info.work_period');
            echo $this->Form->input('job_info.fte');
            echo $this->Form->input('job_info.is_full_time_employee');
            echo $this->Form->input('job_info.is_shift_employee');
            echo $this->Form->input('job_info.shift_code');
            echo $this->Form->input('job_info.shift_rate');
            echo $this->Form->input('job_info.shift_factor');
            echo $this->Form->input('job_info.employee_type');
            echo $this->Form->input('job_info.manager_category');
            echo $this->Form->input('job_info.is_cross_border_worker');
            echo $this->Form->input('job_info.is_competition_clause_active');
			echo $this->Form->input('job_info.emp_data_biography.probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.notes');
            echo $this->Form->input('job_info.attachmentid');
            echo $this->Form->input('job_info.custom_string1');
            echo $this->Form->input('job_info.eeo_class');
            echo $this->Form->input('job_info.change_reason_external');
            echo $this->Form->input('job_info.radford_jobcode');
            echo $this->Form->input('job_info.is_primary');
            echo $this->Form->input('job_info.trackid');
            echo $this->Form->input('job_info.employment_type');
            echo $this->Form->input('job_info.is_eligible_for_car');
            echo $this->Form->input('job_info.is_eligible_for_benefit');
            echo $this->Form->input('job_info.international_org_code');
            echo $this->Form->input('job_info.is_eligible_for_financial_plan');
            echo $this->Form->input('job_info.amount_of_financial_plan');
            echo $this->Form->input('job_info.supervisor_level');
            echo $this->Form->input('job_info.ern_number');
            echo $this->Form->input('job_info.sick_pay_supplement');
            echo $this->Form->input('job_info.company_leaving_for');
            echo $this->Form->input('job_info.is_side_line_job_allowed');
            echo $this->Form->input('job_info.holiday_calendar_code');
            echo $this->Form->input('job_info.work_schedule_code');
            echo $this->Form->input('job_info.time_type_profile_code');
            echo $this->Form->input('job_info.time_recording_profile_code');
            echo $this->Form->input('job_info.time_recording_admissibility_code');
            echo $this->Form->input('job_info.time_recording_variant');
            echo $this->Form->input('job_info.default_overtime_compensation_variant');
            echo $this->Form->input('job_info.event');
            echo $this->Form->input('job_info.event_reason');
            echo $this->Form->input('job_info.notice_period');
			echo $this->Form->input('job_info.emp_data_biography.expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.pay_scale_area');
            echo $this->Form->input('job_info.pay_scale_type');
            echo $this->Form->input('job_info.pay_scale_group');
            echo $this->Form->input('job_info.pay_scale_level');
            echo $this->Form->input('job_info.emp_data_biography.job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.time_in_job');
			echo $this->Form->input('job_info.emp_data_biography.company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.time_in_company');
			echo $this->Form->input('job_info.emp_data_biography.location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.time_in_location');
			echo $this->Form->input('job_info.emp_data_biography.department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.time_in_department');
			echo $this->Form->input('job_info.emp_data_biography.pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.time_in_pay_scale_level');
            echo $this->Form->input('job_info.hire_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('job_info.termination_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('job_info.emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('job_info.users_id');
            echo $this->Form->input('job_info.emp_data_biographies_id');
	 ?></fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->
          
          
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  
   <!-- /.row -->
</div>

<div class="box-footer">
    <a href="/employees">Cancel</a>    
    <button class="pull-right btn btn-primary" type="submit">Save</button>  
</div>
    
    </div>

<!-- <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                  <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
   </div>
   </div> -->
  <?= $this->Form->end() ?></section>
