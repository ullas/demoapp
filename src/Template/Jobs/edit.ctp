
<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Job
                <small>Edit</small>
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
                echo $this->Form->input('jobclass.name');
            echo $this->Form->input('jobclass.description');
            echo $this->Form->input('jobclass.effective_status');
			echo $this->Form->input('jobclass.emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobclass.emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobclass.worker_comp_code');
            echo $this->Form->input('jobclass.default_job_level');
            echo $this->Form->input('jobclass.standard_weekly_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock-o"></i></div>']]);
            echo $this->Form->input('jobclass.regular_temporary');
            echo $this->Form->input('jobclass.default_employee_class');
            echo $this->Form->input('jobclass.full_time_employee');
            echo $this->Form->input('jobclass.default_supervisor_level');
            echo $this->Form->input('jobclass.external_code');
            echo $this->Form->input('jobclass.pay_grade_id', ['class'=>'select2','options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('jobclass.job_function_id', ['class'=>'select2','options' => $jobFunctions, 'empty' => true]);
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="jobfunction">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            echo $this->Form->input('jobfunction.name');
            echo $this->Form->input('jobfunction.description');
            echo $this->Form->input('jobfunction.effective_status');
            echo $this->Form->input('jobfunction.emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobfunction.emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobfunction.job_function_type');
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php

			echo $this->Form->input('jobinfo.position');
			echo $this->Form->input('jobinfo.emp_data_biography.position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.time_in_position',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('jobinfo.company');
            echo $this->Form->input('jobinfo.country_of_company');
            echo $this->Form->input('jobinfo.business_unit');
            echo $this->Form->input('jobinfo.division');
            echo $this->Form->input('jobinfo.department');
            echo $this->Form->input('jobinfo.location',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location"></i></div>']]);
            echo $this->Form->input('jobinfo.timezone');
            echo $this->Form->input('jobinfo.cost_center');
            echo $this->Form->input('jobinfo.job_code');
            echo $this->Form->input('jobinfo.job_title');
            echo $this->Form->input('jobinfo.local_job_title');
            echo $this->Form->input('jobinfo.employee_class');
            echo $this->Form->input('jobinfo.pay_grade');
            echo $this->Form->input('jobinfo.regular_temp');
            echo $this->Form->input('jobinfo.standard_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('jobinfo.working_days_per_week');
            echo $this->Form->input('jobinfo.work_period');
            echo $this->Form->input('jobinfo.fte');
            echo $this->Form->input('jobinfo.is_full_time_employee');
            echo $this->Form->input('jobinfo.is_shift_employee');
            echo $this->Form->input('jobinfo.shift_code');
            echo $this->Form->input('jobinfo.shift_rate');
            echo $this->Form->input('jobinfo.shift_factor');
            echo $this->Form->input('jobinfo.employee_type');
            echo $this->Form->input('jobinfo.manager_category');
            echo $this->Form->input('jobinfo.is_cross_border_worker');
            echo $this->Form->input('jobinfo.is_competition_clause_active');
			echo $this->Form->input('jobinfo.emp_data_biography.probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.notes');
            echo $this->Form->input('jobinfo.attachmentid');
            echo $this->Form->input('jobinfo.custom_string1');
            echo $this->Form->input('jobinfo.eeo_class');
            echo $this->Form->input('jobinfo.change_reason_external');
            echo $this->Form->input('jobinfo.radford_jobcode');
            echo $this->Form->input('jobinfo.is_primary');
            echo $this->Form->input('jobinfo.trackid');
            echo $this->Form->input('jobinfo.employment_type');
            echo $this->Form->input('jobinfo.is_eligible_for_car');
            echo $this->Form->input('jobinfo.is_eligible_for_benefit');
            echo $this->Form->input('jobinfo.international_org_code');
            echo $this->Form->input('jobinfo.is_eligible_for_financial_plan');
            echo $this->Form->input('jobinfo.amount_of_financial_plan');
            echo $this->Form->input('jobinfo.supervisor_level');
            echo $this->Form->input('jobinfo.ern_number');
            echo $this->Form->input('jobinfo.sick_pay_supplement');
            echo $this->Form->input('jobinfo.company_leaving_for');
            echo $this->Form->input('jobinfo.is_side_line_job_allowed');
            echo $this->Form->input('jobinfo.holiday_calendar_code');
            echo $this->Form->input('jobinfo.work_schedule_code');
            echo $this->Form->input('jobinfo.time_type_profile_code');
            echo $this->Form->input('jobinfo.time_recording_profile_code');
            echo $this->Form->input('jobinfo.time_recording_admissibility_code');
            echo $this->Form->input('jobinfo.time_recording_variant');
            echo $this->Form->input('jobinfo.default_overtime_compensation_variant');
            echo $this->Form->input('jobinfo.event');
            echo $this->Form->input('jobinfo.event_reason');
            echo $this->Form->input('jobinfo.notice_period');
			echo $this->Form->input('jobinfo.emp_data_biography.expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.pay_scale_area');
            echo $this->Form->input('jobinfo.pay_scale_type');
            echo $this->Form->input('jobinfo.pay_scale_group');
            echo $this->Form->input('jobinfo.pay_scale_level');
            echo $this->Form->input('jobinfo.emp_data_biography.job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.time_in_job');
			echo $this->Form->input('jobinfo.emp_data_biography.company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.time_in_company');
			echo $this->Form->input('jobinfo.emp_data_biography.location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.time_in_location');
			echo $this->Form->input('jobinfo.emp_data_biography.department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.time_in_department');
			echo $this->Form->input('jobinfo.emp_data_biography.pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.time_in_pay_scale_level');
            echo $this->Form->input('jobinfo.hire_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.termination_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('jobinfo.users_id',['class' => 'select2']);
            echo $this->Form->input('jobinfo.emp_data_biographies_id',['class' => 'select2']);
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
    <a href="/jobs">Cancel</a>    
    <button class="pull-right btn btn-primary" type="submit">Update</button>  
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
