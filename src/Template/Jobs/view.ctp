<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Job
                <small>View</small>
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
                echo $this->Form->input('job_class.name',['disabled' => true]);
            echo $this->Form->input('job_class.description',['disabled' => true]);
            echo $this->Form->input('job_class.effective_status',['disabled' => true]);
			echo $this->Form->input('job_class.emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_class.emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_class.worker_comp_code',['disabled' => true]);
            echo $this->Form->input('job_class.default_job_level',['disabled' => true]);
            echo $this->Form->input('job_class.standard_weekly_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_class.regular_temporary',['disabled' => true]);
            echo $this->Form->input('job_class.default_employee_class',['disabled' => true]);
            echo $this->Form->input('job_class.full_time_employee',['disabled' => true]);
            echo $this->Form->input('job_class.default_supervisor_level',['disabled' => true]);
            echo $this->Form->input('job_class.external_code',['disabled' => true]);
            echo $this->Form->input('job_class.pay_grade_id', ['options' => $payGrades, 'disabled' => true]);
            echo $this->Form->input('job_class.job_function_id', ['options' => $jobFunctions,'disabled' => true]);
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="jobfunction">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            echo $this->Form->input('job_function.name',['disabled' => true]);
            echo $this->Form->input('job_function.description',['disabled' => true]);
            echo $this->Form->input('job_function.effective_status',['disabled' => true]);
            echo $this->Form->input('job_function.emp_data_biography.effective_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_function.emp_data_biography.effective_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_function.job_function_type',['disabled' => true]);
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php

			echo $this->Form->input('job_info.position',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.time_in_position',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_info.company',['disabled' => true]);
            echo $this->Form->input('job_info.country_of_company',['disabled' => true]);
            echo $this->Form->input('job_info.business_unit',['disabled' => true]);
            echo $this->Form->input('job_info.division',['disabled' => true]);
            echo $this->Form->input('job_info.department',['disabled' => true]);
            echo $this->Form->input('job_info.location',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_info.timezone',['disabled' => true]);
            echo $this->Form->input('job_info.cost_center',['disabled' => true]);
            echo $this->Form->input('job_info.job_code',['disabled' => true]);
            echo $this->Form->input('job_info.job_title',['disabled' => true]);
            echo $this->Form->input('job_info.local_job_title',['disabled' => true]);
            echo $this->Form->input('job_info.employee_class',['disabled' => true]);
            echo $this->Form->input('job_info.pay_grade',['disabled' => true]);
            echo $this->Form->input('job_info.regular_temp',['disabled' => true]);
            echo $this->Form->input('job_info.standard_hours',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-clock"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_info.working_days_per_week',['disabled' => true]);
            echo $this->Form->input('job_info.work_period',['disabled' => true]);
            echo $this->Form->input('job_info.fte',['disabled' => true]);
            echo $this->Form->input('job_info.is_full_time_employee',['disabled' => true]);
            echo $this->Form->input('job_info.is_shift_employee',['disabled' => true]);
            echo $this->Form->input('job_info.shift_code',['disabled' => true]);
            echo $this->Form->input('job_info.shift_rate',['disabled' => true]);
            echo $this->Form->input('job_info.shift_factor',['disabled' => true]);
            echo $this->Form->input('job_info.employee_type',['disabled' => true]);
            echo $this->Form->input('job_info.manager_category',['disabled' => true]);
            echo $this->Form->input('job_info.is_cross_border_worker',['disabled' => true]);
            echo $this->Form->input('job_info.is_competition_clause_active',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.notes',['disabled' => true]);
            echo $this->Form->input('job_info.attachmentid',['disabled' => true]);
            echo $this->Form->input('job_info.custom_string1',['disabled' => true]);
            echo $this->Form->input('job_info.eeo_class',['disabled' => true]);
            echo $this->Form->input('job_info.change_reason_external',['disabled' => true]);
            echo $this->Form->input('job_info.radford_jobcode',['disabled' => true]);
            echo $this->Form->input('job_info.is_primary',['disabled' => true]);
            echo $this->Form->input('job_info.trackid',['disabled' => true]);
            echo $this->Form->input('job_info.employment_type',['disabled' => true]);
            echo $this->Form->input('job_info.is_eligible_for_car',['disabled' => true]);
            echo $this->Form->input('job_info.is_eligible_for_benefit',['disabled' => true]);
            echo $this->Form->input('job_info.international_org_code',['disabled' => true]);
            echo $this->Form->input('job_info.is_eligible_for_financial_plan',['disabled' => true]);
            echo $this->Form->input('job_info.amount_of_financial_plan',['disabled' => true]);
            echo $this->Form->input('job_info.supervisor_level',['disabled' => true]);
            echo $this->Form->input('job_info.ern_number',['disabled' => true]);
            echo $this->Form->input('job_info.sick_pay_supplement',['disabled' => true]);
            echo $this->Form->input('job_info.company_leaving_for',['disabled' => true]);
            echo $this->Form->input('job_info.is_side_line_job_allowed',['disabled' => true]);
            echo $this->Form->input('job_info.holiday_calendar_code',['disabled' => true]);
            echo $this->Form->input('job_info.work_schedule_code',['disabled' => true]);
            echo $this->Form->input('job_info.time_type_profile_code',['disabled' => true]);
            echo $this->Form->input('job_info.time_recording_profile_code',['disabled' => true]);
            echo $this->Form->input('job_info.time_recording_admissibility_code',['disabled' => true]);
            echo $this->Form->input('job_info.time_recording_variant',['disabled' => true]);
            echo $this->Form->input('job_info.default_overtime_compensation_variant',['disabled' => true]);
            echo $this->Form->input('job_info.event',['disabled' => true]);
            echo $this->Form->input('job_info.event_reason',['disabled' => true]);
            echo $this->Form->input('job_info.notice_period',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.pay_scale_area',['disabled' => true]);
            echo $this->Form->input('job_info.pay_scale_type',['disabled' => true]);
            echo $this->Form->input('job_info.pay_scale_group',['disabled' => true]);
            echo $this->Form->input('job_info.pay_scale_level',['disabled' => true]);
            echo $this->Form->input('job_info.emp_data_biography.job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.time_in_job',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.time_in_company',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.time_in_location',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.time_in_department',['disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.time_in_pay_scale_level',['disabled' => true]);
            echo $this->Form->input('job_info.hire_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_info.termination_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('job_info.emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.emp_data_biography.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('job_info.users_id',['class' => 'select2','disabled' => true]);
            echo $this->Form->input('job_info.emp_data_biographies_id',['class' => 'select2','disabled' => true]);
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
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?=$this->Html->link(__('Edit Job'), ['action' => 'edit', $job['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>  
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
