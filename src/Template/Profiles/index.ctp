<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Profile
                <small>View</small>
      </h1>
     
    </section>
<section class="content"><?= $this->Form->create($profile) ?>
	<div class="box box-primary" style="border-color:transparent;"><div class="box-body">
		<div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
           <li  class="active"><a href="#personal" data-toggle="tab">Personal Information</a></li>	
           <li><a href="#employment" data-toggle="tab">Employment Information</a></li>
           <li><a href="#profile" data-toggle="tab">Profile</a></li>  
           <li><a href="#notes" data-toggle="tab">Notes</a></li>
           <li><a href="#timeoff" data-toggle="tab">Time off</a></li>
           <li><a href="#others" data-toggle="tab">Others</a></li>
        </ul>
        
        <div class=" tab-content">
          <div class="active tab-pane" id="personal">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
                echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
			echo $this->Form->input('emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('worker_comp_code');
            echo $this->Form->input('default_job_level');
            echo $this->Form->input('standard_weekly_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('regular_temporary');
            echo $this->Form->input('default_employee_class');
            echo $this->Form->input('full_time_employee');
            echo $this->Form->input('default_supervisor_level');
            echo $this->Form->input('external_code');
            echo $this->Form->input('pay_grade_id', ['options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('job_function_id', ['options' => $jobFunctions, 'empty' => true]);
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="jobfunction">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('effective_status');
            echo $this->Form->input('emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('job_function_type');
            echo $this->Form->input('external_code');
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php

			echo $this->Form->input('position');
			echo $this->Form->input('emp_data_biography.position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('time_in_position',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('company');
            echo $this->Form->input('country_of_company');
            echo $this->Form->input('business_unit');
            echo $this->Form->input('division');
            echo $this->Form->input('department');
            echo $this->Form->input('location',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location"></i></div>']]);
            echo $this->Form->input('timezone');
            echo $this->Form->input('cost_center');
            echo $this->Form->input('job_code');
            echo $this->Form->input('job_title');
            echo $this->Form->input('local_job_title');
            echo $this->Form->input('employee_class');
            echo $this->Form->input('pay_grade');
            echo $this->Form->input('regular_temp');
            echo $this->Form->input('standard_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>']]);
            echo $this->Form->input('working_days_per_week');
            echo $this->Form->input('work_period');
            echo $this->Form->input('fte');
            echo $this->Form->input('is_full_time_employee');
            echo $this->Form->input('is_shift_employee');
            echo $this->Form->input('shift_code');
            echo $this->Form->input('shift_rate');
            echo $this->Form->input('shift_factor');
            echo $this->Form->input('employee_type');
            echo $this->Form->input('manager_category');
            echo $this->Form->input('is_cross_border_worker');
            echo $this->Form->input('is_competition_clause_active');
			echo $this->Form->input('emp_data_biography.probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('notes');
            echo $this->Form->input('attachmentid');
            echo $this->Form->input('custom_string1');
            echo $this->Form->input('eeo_class');
            echo $this->Form->input('change_reason_external');
            echo $this->Form->input('radford_jobcode');
            echo $this->Form->input('is_primary');
            echo $this->Form->input('trackid');
            echo $this->Form->input('employment_type');
            echo $this->Form->input('is_eligible_for_car');
            echo $this->Form->input('is_eligible_for_benefit');
            echo $this->Form->input('international_org_code');
            echo $this->Form->input('is_eligible_for_financial_plan');
            echo $this->Form->input('amount_of_financial_plan');
            echo $this->Form->input('supervisor_level');
            echo $this->Form->input('ern_number');
            echo $this->Form->input('sick_pay_supplement');
            echo $this->Form->input('company_leaving_for');
            echo $this->Form->input('is_side_line_job_allowed');
            echo $this->Form->input('holiday_calendar_code');
            echo $this->Form->input('work_schedule_code');
            echo $this->Form->input('time_type_profile_code');
            echo $this->Form->input('time_recording_profile_code');
            echo $this->Form->input('time_recording_admissibility_code');
            echo $this->Form->input('time_recording_variant');
            echo $this->Form->input('default_overtime_compensation_variant');
            echo $this->Form->input('event');
            echo $this->Form->input('event_reason');
            echo $this->Form->input('notice_period');
			echo $this->Form->input('emp_data_biography.expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('pay_scale_area');
            echo $this->Form->input('pay_scale_type');
            echo $this->Form->input('pay_scale_group');
            echo $this->Form->input('pay_scale_level');
            echo $this->Form->input('emp_data_biography.job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('time_in_job');
			echo $this->Form->input('emp_data_biography.company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('time_in_company');
			echo $this->Form->input('emp_data_biography.location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('time_in_location');
			echo $this->Form->input('emp_data_biography.department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('time_in_department');
			echo $this->Form->input('emp_data_biography.pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('time_in_pay_scale_level');
            echo $this->Form->input('hire_date', ['empty' => true]);
            echo $this->Form->input('termination_date', ['empty' => true]);
            echo $this->Form->input('emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('users_id');
            echo $this->Form->input('emp_data_biographies_id');
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
