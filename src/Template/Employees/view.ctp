<style>
.emp-profilepic{
    width: 100px;
    height:100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}	
.widget-user-2 .widget-user-header {
    padding: 5px;
}
.widget-user-2 .widget-user-image > img {
    height: 65px;;
}
</style>

<?= $this->element('templateelmnt'); ?>

<section class="content-header">
  <h1>
    Employee
    <small>View</small>
  </h1>
  <ol class="breadcrumb">
    <li>
    <?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  	 <?= $this->Form->create($employee, array('role' => 'form')) ?>
  	 
  	 	<div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-gray" style="height:75px;">
              <div class="widget-user-image">
                <?php $picturename=$employee['profilepicture'];
								if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename) && $picturename!=""){
									echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'img-circle img-responsive', 'alt' => 'User profile picture'));
								}else{
									echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'img-responsive', 'alt' => 'User profile picture'));
								}
					?>
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php $dpname=$employee['empdatapersonal']['salutation'] . " ". $employee['empdatapersonal']['initials']. " "
              									. $employee['empdatapersonal']['first_name']. " ". $employee['empdatapersonal']['last_name']; 
              	echo $dpname; ?></h3>
              <h5 class="widget-user-desc"><?php echo $employee['empdatabiography']['person_id_external']; ?></h5>
            </div>
          
          </div>
          
          
  	<div class="box box-primary" style="border-color:transparent;"><div class="box-body">
		<div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          	<li class="active"><a href="#EmpDataPersonal" data-toggle="tab">Personal Information</a></li>
            <li><a href="#EmploymentInfo" data-toggle="tab">Employment Information</a></li>
            <li><a href="#EmpDataBiography" data-toggle="tab">Profile</a></li>
           	<li><a href="#jobinfo" data-toggle="tab">Job Info</a></li>
           	<li><a href="#social" data-toggle="tab">Social</a></li>
           	<li><a href="#address" data-toggle="tab">Address</a></li>
           	<li><a href="#ids" data-toggle="tab">ID's</a></li>
           	<li><a href="#qualification" data-toggle="tab">Educational Qualification</a></li>
           	<li><a href="#experience" data-toggle="tab">Experience</a></li>
           	<li id="li9"><a href="#skills" data-toggle="tab">Skills</a></li>
           	<li id="li10"><a href="#officeassets" data-toggle="tab">Office Assets</a></li>
        </ul>

        <div class=" tab-content">
          <div class="tab-pane" id="EmpDataBiography">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		
             	<div class="col-md-4">
        			<div class="form-group">
            		<label class="control-label" for="employee-profilepicture" style="margin-bottom: 5px;">Profile Picture</label>            		
        			<?php $picturename=$employee['profilepicture'];
								if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
									echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'User profile picture'));
								}else{
									echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'User profile picture'));
								}
					?>
          			</div>
          		</div>
          		
                <?php
            	echo $this->Form->input('empdatabiography.person_id_external',['disabled' => true,'label' => 'Employee Number']);
            	echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
				echo $this->Form->input('empdatabiography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('empdatabiography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            	echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);

        		?>
        			
          			
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->


          <div class="active tab-pane" id="EmpDataPersonal">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<div class="row" style="margin:0px;">
             		<?php
            echo $this->Form->input('empdatapersonal.salutation',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.initials',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            ?>
            		</div>
            <?php
            echo $this->Form->input('empdatapersonal.first_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            /*echo $this->Form->input('empdatapersonal.first_name_alt1',['label' => 'First Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name_alt1',['label' => 'Middle Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name_alt1',['label' => 'Last Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name_alt2',['label' => 'First Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name_alt2',['label' => 'Middle Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name_alt2',['label' => 'Last Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);*/
            echo $this->Form->input('empdatapersonal.display_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            /*echo $this->Form->input('empdatapersonal.birth_name_alt1',['label' => 'Birth Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name_alt2',['label' => 'Birth Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);*/
            echo $this->Form->input('empdatapersonal.preferred_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            /*echo $this->Form->input('empdatapersonal.display_name_alt1',['label' => 'Display Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name_alt2',['label' => 'Display Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name_alt1',['label' => 'Formal Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name_alt2',['label' => 'Formal Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);*/
            echo $this->Form->input('empdatapersonal.name_format',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.is_overridden',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.nationality',['class'=>'select2','label'=>['text'=>'Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            /*echo $this->Form->input('empdatapersonal.second_nationality',['class'=>'select2','label'=>['text'=>'Second Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.third_nationality',['class'=>'select2','label'=>['text'=>'Third Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);*/
            echo $this->Form->input('empdatapersonal.wps_code',['label' => 'WPS Code','disabled' => true]);
            //echo $this->Form->input('empdatapersonal.uniqueid',['label' => 'Employer Unique ID','disabled' => true]);
            echo $this->Form->input('empdatapersonal.prof_legal',['label' => 'Profession for Legal Reporting','disabled' => true]);
            echo $this->Form->input('empdatapersonal.exclude_legal',['label' => 'Exclude from Legal Reporting','disabled' => true]);
			      echo $this->Form->input('empdatapersonal.nationality_date',['label' => 'Nationality Acquisition Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.home_airport',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.religion',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.number_children',['label' => 'Number of Children','disabled' => true]);
            /*echo $this->Form->input('empdatapersonal.disability_date', ['label' => 'Disability Date Learned','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_group',['label' => 'Disability Challenge Group','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_degree',['label' => 'Degree of Challenge','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_type',['label' => 'Type of Challenge','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_authority',['label' => 'Issuing Authority','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_ref',['label' => 'Reference Number','disabled' => true]);*/
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->

          <div class="tab-pane" id="EmploymentInfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
              echo $this->Form->input('employmentinfo.start_date', ['label' => 'Hire Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.first_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.original_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.company',['label' => 'New Assignment Company','disabled' => true]);
              echo $this->Form->input('employmentinfo.is_primary',['disabled' => true]);
  			      echo $this->Form->input('employmentinfo.seniority_date', ['label' => 'Seniority Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.benefits_eligibility_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.prev_employeeid',['label' => 'Previous Employment ID','disabled' => true]);
              echo $this->Form->input('employmentinfo.eligible_for_stock',['label' => 'Eligible for Stock','disabled' => true]);
  			      echo $this->Form->input('employmentinfo.service_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.initial_stock_grant',['disabled' => true]);
              echo $this->Form->input('employmentinfo.initial_option_grant',['disabled' => true]);
              echo $this->Form->input('employmentinfo.job_credit',['disabled' => true]);
              echo $this->Form->input('employmentinfo.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.is_contingent_worker',['disabled' => true]);
			   ?>
			  
			  <div class="terminationcontent" style="display:none;">
			  <div class="col-md-12"><hr/><h3 class="box-title"><u>Termination</u></h3></div>
			  <?php
              echo $this->Form->input('employmentinfo.end_date', ['label' => 'Termination Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.ok_to_rehire',['label' => 'Ok to Rehire','disabled' => true]);
  			      echo $this->Form->input('employmentinfo.pay_roll_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
  			      echo $this->Form->input('employmentinfo.last_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.regret_termination',['disabled' => true]);
  			      echo $this->Form->input('employmentinfo.eligible_for_sal_continuation',['label' => 'Eligible for Salary Continuation','disabled' => true]);
              echo $this->Form->input('employmentinfo.bonus_pay_expiration_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.stock_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.salary_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
              echo $this->Form->input('employmentinfo.benefits_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
        ?></div></fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->

			<div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
              echo $this->Form->input('jobinfo.pay_group_id', ['disabled' => true,'label' => 'Select Paygroup','options'=>$payGroups, 'class'=>'select2', 'empty' => true]);
              echo $this->Form->input('jobinfo.position_id', ['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-briefcase"></i></div>'],'class'=>'select2','options' => $positions, 'empty' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.time_in_position',['disabled' => true]);
            echo $this->Form->input('jobinfo.legal_entity_id',['class'=>'select2','disabled' => true]);
			      echo $this->Form->input('jobinfo.business_unit_id',['class'=>'select2','disabled' => true]);
            echo $this->Form->input('jobinfo.division_id',['class'=>'select2','disabled' => true]);
            echo $this->Form->input('jobinfo.department_id',['class'=>'select2','disabled' => true]);
            echo $this->Form->input('jobinfo.cost_centre_id',['label' => 'Cost Center','class'=>'select2','disabled' => true]);
            echo $this->Form->input('jobinfo.location_id',['class'=>'select2','disabled' => true]);
            echo $this->Form->input('jobinfo.country_of_company',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.timezone',['disabled' => true]);
            echo $this->Form->input('jobinfo.job_code',['label' => 'Job Classification','disabled' => true]);
            echo $this->Form->input('jobinfo.job_title',['disabled' => true]);
            echo $this->Form->input('jobinfo.local_job_title',['disabled' => true]);
            echo $this->Form->input('jobinfo.employee_class',['disabled' => true]);
            echo $this->Form->input('jobinfo.pay_grade_id',['class'=>'select2','disabled' => true]);
            echo $this->Form->input('jobinfo.regular_temp',['label'=>'Regular/Temporary','class'=>'select2','options' => array('Regular', 'Temporary'), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.standard_hours',['label' => 'Standard Weekly Hours','disabled' => true]);
            echo $this->Form->input('jobinfo.working_days_per_week',['disabled' => true]);
            echo $this->Form->input('jobinfo.work_period',['disabled' => true]);
            echo $this->Form->input('jobinfo.fte',['label' => 'FTE','disabled' => true]);
            echo $this->Form->input('jobinfo.is_full_time_employee',['disabled' => true]);
            echo $this->Form->input('jobinfo.is_shift_employee',['disabled' => true]);
            echo $this->Form->input('jobinfo.shift_code',['disabled' => true]);
            echo $this->Form->input('jobinfo.shift_rate',['disabled' => true]);
            echo $this->Form->input('jobinfo.shift_factor',['label'=>'Shift Percent','disabled' => true]);
            echo $this->Form->input('jobinfo.employee_type',['disabled' => true]);
            echo $this->Form->input('jobinfo.manager_id1',['label'=>'Manager 1','disabled' => true]);
			      echo $this->Form->input('jobinfo.manager_id2',['label'=>'Manager 2','disabled' => true]);
			      echo $this->Form->input('jobinfo.manager_id3',['label'=>'Manager 3','disabled' => true]);
			      echo $this->Form->input('jobinfo.manager_id4',['label'=>'Manager 4','disabled' => true]);
			      echo $this->Form->input('jobinfo.manager_id5',['label'=>'Manager 5','disabled' => true]);
            echo $this->Form->input('jobinfo.is_cross_border_worker',['disabled' => true]);
            echo $this->Form->input('jobinfo.is_competition_clause_active',['disabled' => true]);
            echo $this->Form->input('jobinfo.probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.attachmentid',['label'=>'Attachment','disabled' => true]);
            echo $this->Form->input('jobinfo.custom_string1',['label'=>'Custom String 1','disabled' => true]);
            echo $this->Form->input('jobinfo.eeo_class',['label'=>'EEO Class','disabled' => true]);
            echo $this->Form->input('jobinfo.change_reason_external',['label'=>'Event Reason External','disabled' => true]);
            echo $this->Form->input('jobinfo.radford_jobcode',['disabled' => true]);
            echo $this->Form->input('jobinfo.is_primary',['disabled' => true]);
            echo $this->Form->input('jobinfo.trackid',['label'=>'Track Id','disabled' => true]);
            echo $this->Form->input('jobinfo.employment_type',['disabled' => true]);
            echo $this->Form->input('jobinfo.is_eligible_for_car',['disabled' => true]);
            echo $this->Form->input('jobinfo.is_eligible_for_benefit',['disabled' => true]);
            echo $this->Form->input('jobinfo.international_org_code',['disabled' => true]);
            echo $this->Form->input('jobinfo.is_eligible_for_financial_plan',['disabled' => true]);
            echo $this->Form->input('jobinfo.amount_of_financial_plan',['disabled' => true]);
            echo $this->Form->input('jobinfo.supervisor_level',['disabled' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.ern_number',['label'=>'Employee Record Number','disabled' => true]);
            echo $this->Form->input('jobinfo.sick_pay_supplement',['disabled' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.company_leaving_for',['disabled' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.is_side_line_job_allowed',['label'=>'Sideline Job Allowed','disabled' => true]);
            echo $this->Form->input('jobinfo.holiday_calendar_id',['class'=>'select2', 'empty' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.work_schedule_id',['class'=>'select2', 'empty' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.time_type_profile_id',['label'=>'Time Profile','class'=>'select2', 'empty' => true,'disabled' => true]);
            echo $this->Form->input('jobinfo.time_recording_profile_code',['label'=>'Time Recording Profile','disabled' => true]);
            echo $this->Form->input('jobinfo.time_recording_admissibility_code',['label'=>'Time Recording Admissibility','disabled' => true]);
            echo $this->Form->input('jobinfo.time_recording_variant',['disabled' => true]);
            echo $this->Form->input('jobinfo.default_overtime_compensation_variant',['disabled' => true]);
            echo $this->Form->input('jobinfo.event',['disabled' => true]);
            echo $this->Form->input('jobinfo.event_reason',['disabled' => true]);
            echo $this->Form->input('jobinfo.notice_period',['disabled' => true]);
            echo $this->Form->input('jobinfo.expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.pay_scale_area',['disabled' => true]);
            echo $this->Form->input('jobinfo.pay_scale_type',['disabled' => true]);
            echo $this->Form->input('jobinfo.pay_scale_group',['disabled' => true]);
            echo $this->Form->input('jobinfo.pay_scale_level',['disabled' => true]);
            echo $this->Form->input('jobinfo.job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.time_in_job',['disabled' => true]);
            echo $this->Form->input('jobinfo.company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.time_in_company',['disabled' => true]);
            echo $this->Form->input('jobinfo.location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.time_in_location',['disabled' => true]);
            echo $this->Form->input('jobinfo.department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.time_in_department',['disabled' => true]);
            echo $this->Form->input('jobinfo.pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.time_in_pay_scale_level',['disabled' => true]);
            echo $this->Form->input('jobinfo.hire_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.termination_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('jobinfo.leave_of_absence_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);

			echo $this->Form->input('jobinfo.notes',['type'=>'textArea','disabled' => true]);
			 ?></fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->

          <div class="tab-pane" id="social">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            		echo $this->Form->input('contact_info.phone',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-mobile"></i></div>'],'disabled' => true]);
            		echo $this->Form->input('contact_info.mobile',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-phone"></i></div>'],'disabled' => true]);
            		echo $this->Form->input('contact_info.email_address1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa  fa-envelope"></i></div>'],'disabled' => true]);
            		echo $this->Form->input('contact_info.email_address2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa  fa-envelope"></i></div>'],'disabled' => true]);
            		echo $this->Form->input('contact_info.facebook',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-facebook"></i></div>'],'disabled' => true]);
            		echo $this->Form->input('contact_info.linkedin',['label' =>'LinkedIn','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-linkedin"></i></div>'],'disabled' => true]);
        			?>

        			<?php echo $this->Form->input('profilepicture', array('type' => 'hidden')); ?>
            <!-- </div> -->
     		</fieldset>
          </div>
          <!-- Tab Pane-->

          <div class="tab-pane" id="address">
             <!-- <div class="form-horizontal"> -->
             <fieldset>
             	<div class="box box-solid box-default">
             	<div class="box-header with-border">
          			<h3 class="box-title"><i class="fa fa-map-marker"></i> Current Address</h3>
        		</div>
        		<div class="box-body">
             	<?php
            		echo $this->Form->input('address.address1',['label' => 'Care Of','disabled' => true]);
            		echo $this->Form->input('address.address2',['label' => 'Street','disabled' => true]);
            		echo $this->Form->input('address.address3',['label' => 'House Number','disabled' => true]);
            		echo $this->Form->input('address.address4',['label' => 'Apartment','disabled' => true]);
           	 		echo $this->Form->input('address.address5',['label' => 'Second Address Line','disabled' => true]);
            		echo $this->Form->input('address.address6',['label' => 'POBOX','disabled' => true]);
            		echo $this->Form->input('address.address7',['label' => 'Camp','disabled' => true]);
            		echo $this->Form->input('address.address8',['label' => 'Bed Number','disabled' => true]);
            		echo $this->Form->input('address.zip_code',['label' => 'Postal Code','disabled' => true]);
            		echo $this->Form->input('address.city',['label' => 'City','disabled' => true]);
            		echo $this->Form->input('address.county',['label' => 'District','disabled' => true]);
            		echo $this->Form->input('address.state',['label' => 'Region','disabled' => true]);
        		?>
        		</div>
     		 	</div>
        		
        		<!-- permanent address -->
        		<div class="box box-solid box-default">
             	<div class="box-header with-border">
          			<h3 class="box-title"><i class="fa fa-home"></i> Permanent Address</h3>
        		</div>
        		 <div class="box-body">
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Care Of</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress1" class="form-control"></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Street</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress2" class="form-control"></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">House Number</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress3" class="form-control"></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Apartment</label>
             		<div class="input-group"><input disabled type="text"  maxlength="256" id="paaddress4" class="form-control"></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Second Address Line</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress5" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">POBOX</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress6" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Camp</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress7" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Bed Number</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="paaddress8" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Postal Code</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="pazip-code" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">City</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="pacity" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">District</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="pacounty" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Region</label>
             		<div class="input-group"><input disabled type="text" maxlength="256" id="pastate" class="form-control" value=""></div></div></div> 		
     		 	</div>
     		 	</div>
     		 	
     		 </fieldset>
          </div>
          <!-- Tab Pane-->
          <div class="tab-pane" id="ids">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<div class="idfieldset">
             		<div class="col-md-6">	
             			<?php
             			echo $this->Form->input('identity.card_type',['label' => 'National ID Card Type','disabled' => true]);
            			echo $this->Form->input('identity.country',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            			echo $this->Form->input('identity.nationalid',['label' => 'National ID','disabled' => true]);
            			?>        		
            	</div>	
            	<div class="col-md-6">	
            	<?php
            			echo $this->Form->input('identity.is_primary',['disabled' => true]);
						echo $this->Form->input('identity.issuedate', ['disabled' => true,'label' => 'Issue Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            			echo $this->Form->input('identity.expirydate', ['disabled' => true,'label' => 'Expiry Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            
        			?>
        			</div>	
        			<div class="col-md-12"><hr/></div>
        			</div>
            <!-- </div> -->
     		</fieldset>
          </div>
          <!-- Tab Pane-->
			
			<div class="tab-pane" id="qualification">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="qualificationfieldset">
                <?php
                	echo $this->Form->input('educational_qualification.qualification', ['disabled' => true]);
            		echo $this->Form->input('educational_qualification.subject', ['disabled' => true]);
            		echo $this->Form->input('educational_qualification.subject2', ['disabled' => true]);
            		echo $this->Form->input('educational_qualification.schoolcollege', ['label' => 'School/College','disabled' => true]);
            		echo $this->Form->input('educational_qualification.city', ['disabled' => true]);
            		echo $this->Form->input('educational_qualification.fromdate', ['disabled' => true,'label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('educational_qualification.passdate', ['disabled' => true,'label' => 'Pass Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('educational_qualification.grade', ['disabled' => true,'label' => 'Grade/Percentage']);
			      ?>        		
            		
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
        			
        			
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="experience">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="experiencefieldset">
                <?php
                	echo $this->Form->input('experience.designation', ['disabled' => true]);
            		echo $this->Form->input('experience.industry', ['disabled' => true]);
            		echo $this->Form->input('experience.function', ['disabled' => true]);
            		echo $this->Form->input('experience.employer', ['disabled' => true]);
            		echo $this->Form->input('experience.city', ['disabled' => true]);
            		echo $this->Form->input('experience.country', ['disabled' => true]);
            		echo $this->Form->input('experience.fromdate', ['disabled' => true,'label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('experience.todate', ['disabled' => true,'label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('experience.contract', ['disabled' => true]);
			      ?>        		
            		
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
        			
        			
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->
          
           <div class="tab-pane" id="officeassets">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="officeassetfieldset">
        			<div class="col-md-6">
                <?php
                	echo $this->Form->input('office_asset.assettype', ['label' => 'Asset Type','disabled' => true]);
            		echo $this->Form->input('office_asset.assetnumber', ['label' => 'Asset Number','disabled' => true]);
            		echo $this->Form->input('office_asset.assetdescription', ['label' => 'Asset Description','disabled' => true]);
            		
            		?>        		
            	</div>	
            	<div class="col-md-6">	
            	<?php
            		echo $this->Form->input('office_asset.location',['disabled' => true]);
            		echo $this->Form->input('office_asset.issuedate', ['disabled' => true,'label' => 'Issue Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('office_asset.todate', ['disabled' => true,'label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			   ?>        		
            	</div>
            		
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->
          
           <div class="tab-pane" id="skills">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="skillfieldset">
        			<div class="col-md-6">	
                <?php
                	echo $this->Form->input('skill.skill',['disabled' => true]);
            		echo $this->Form->input('skill.skillgroup', ['label' => 'Skill Group','disabled' => true]);
            		echo $this->Form->input('skill.proficiency',['disabled' => true]);
            		?>        		
            	</div>	
            	<div class="col-md-6">	
            	<?php
            	echo $this->Form->input('skill.fromdate', ['disabled' => true,'label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('skill.todate', ['disabled' => true,'label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

			      ?>        		
            		</div>
            		<div class="col-md-12"><hr/></div>
        			</div>
   
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->
          
          

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
  	<!-- /.box-body -->
          <div class="box-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>

</section>


<?php $this->start('scriptBotton'); ?>
<script>
	var countrydata=[];
	var countryarr=<?php echo $countryarr ?>;
	$.each(countryarr, function(key, value) {
    	countrydata.push({'id':key, "text":value});
	});

function formattodmy(inputDate) {
    var date = new Date(inputDate);
    if (!isNaN(date.getTime())) {
        var day = date.getDate().toString();
        var month = (date.getMonth() + 1).toString();
        // Months use 0 index.

        return (day[1] ? day : '0' + day[0]) + '/' + 
        	(month[1] ? month : '0' + month[0]) + '/' +           
           date.getFullYear();
    }
}

function formattoymd(inputDate) {
    var date = new Date(inputDate);
    if (!isNaN(date.getTime())) {
        var day = date.getDate().toString();
        var month = (date.getMonth() + 1).toString();
        // Months use 0 index.

        return date.getFullYear()  + '/' +
        (month[1] ? month : '0' + month[0]) + '/' +
        (day[1] ? day : '0' + day[0]) ;
    }
}

	$(function () {
		
		//address
		var addressarr='<?php echo $addresses; ?>';
		var addressobj = JSON.parse(addressarr);

		for (i = 1; i <= addressobj.length; i++) {
			$("#paaddress1").val(addressobj[i-1]['address1']);
			$("#paaddress2").val(addressobj[i-1]['address2']);
			$("#paaddress3").val(addressobj[i-1]['address3']);
			$("#paaddress4").val(addressobj[i-1]['address4']);
			$("#paaddress5").val(addressobj[i-1]['address5']);
			$("#paaddress6").val(addressobj[i-1]['address6']);
			$("#paaddress7").val(addressobj[i-1]['address7']);
			$("#paaddress8").val(addressobj[i-1]['address8']);
			$("#pcity").val(addressobj[i-1]['city']);
			$("#pstate").val(addressobj[i-1]['state']);
			$("#pcounty").val(addressobj[i-1]['county']);
			$("#pzipcode").val(addressobj[i-1]['zip_code']);

		}
		//id's
		var idsarr='<?php echo $ids ?>';
		var idobj = JSON.parse(idsarr);
		
		var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
		
		for (i = 1; i <= idobj.length; i++) {
			var numItems = $('.idclass').length+1;
			
			//change dateformat
			if(userdf==1){
				if(idobj[i-1]['issuedate']){
					if(idobj[i-1]['issuedate'].length>11){
						idobj[i-1]['issuedate']=idobj[i-1]['issuedate'].substring(0 , 10);
						idobj[i-1]['issuedate']=formattodmy(idobj[i-1]['issuedate']);
					}
				}
				
				if(idobj[i-1]['expirydate']){
					if(idobj[i-1]['expirydate'].length>11){
						idobj[i-1]['expirydate']=idobj[i-1]['expirydate'].substring(0 , 10);
						idobj[i-1]['expirydate']=formattodmy(idobj[i-1]['expirydate']);
					}
				}
				
			}else if(userdf==0){
				if(idobj[i-1]['issuedate']){
					if(idobj[i-1]['issuedate'].length>11){
						idobj[i-1]['issuedate']=idobj[i-1]['issuedate'].substring(0 , 10);
						idobj[i-1]['issuedate']=formattoymd(idobj[i-1]['issuedate']);
					}
				}
				
				if(idobj[i-1]['expirydate']){
					if(idobj[i-1]['expirydate'].length>11){
						idobj[i-1]['expirydate']=idobj[i-1]['expirydate'].substring(0 , 10);
						idobj[i-1]['expirydate']=formattoymd(idobj[i-1]['expirydate']);
					}
				}
			}
			
			
			$(".idfieldset").append("<div class='idclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>National ID Card Type</label><div class='input-group'><input disabled type='text' class='idtype form-control' id='idtype"+numItems+"' value='"+ idobj[i-1]['card_type'] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-flag'></i></div><input class='form-control idcountry'  id='country"+numItems+"' disabled value='"+ countryarr[idobj[i-1]['country']] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>National ID</label><input disabled value='"+ idobj[i-1]['nationalid'] +"' class='form-control nationalid'  id='nationalid"+numItems+"'/></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group checkbox'><label><input type='checkbox' class='isprimary'  id='isprimary"+numItems+"' disabled value='"+ idobj[i-1]['is_primary'] +"'/>Is Primary</label></div></div><div class='col-sm-4'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='issuedate mptldp form-control' id='issuedate"+numItems+"' disabled value='"+ idobj[i-1]['issuedate'] +"'/></div></div><div class='col-sm-4'><label>Expiry Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+ idobj[i-1]['expirydate'] +"' disabled type='text' class='expirydate mptldp form-control' id='expirydate"+numItems+"'/></div></div></div></div></div>");
			$(".idfieldset").append("<div class='col-md-12'><hr/></div>");
			if(idobj[i-1]['is_primary']="true"){
				$("#isprimary"+i).prop('checked', true);
			}console.log(idobj);
		}
	
		
		//experience's
		var exparr='<?php echo $experiences; ?>';
		var expobj = JSON.parse(exparr);
				
		for (k = 1; k <= expobj.length; k++) {
			var numItems = $('.experienceclass').length+1;
			
			//change dateformat
			if(userdf==1){
				if(expobj[k-1]['fromdate']){
					if(expobj[k-1]['fromdate'].length>11){
						expobj[k-1]['fromdate']=expobj[k-1]['fromdate'].substring(0 , 10);
						expobj[k-1]['fromdate']=formattodmy(expobj[k-1]['fromdate']);
					}
				}
				
				if(expobj[k-1]['todate']){
					if(expobj[k-1]['todate'].length>11){
						expobj[k-1]['todate']=expobj[k-1]['todate'].substring(0 , 10);
						expobj[k-1]['todate']=formattodmy(expobj[k-1]['todate']);
					}
				}
				
			}else if(userdf==0){
				if(expobj[k-1]['fromdate']){
					if(expobj[k-1]['fromdate'].length>11){
						expobj[k-1]['fromdate']=expobj[k-1]['fromdate'].substring(0 , 10);
						expobj[k-1]['fromdate']=formattoymd(expobj[k-1]['fromdate']);
					}
				}
				
				if(expobj[k-1]['todate']){
					if(expobj[k-1]['todate'].length>11){
						expobj[k-1]['todate']=expobj[k-1]['todate'].substring(0 , 10);
						expobj[k-1]['todate']=formattoymd(expobj[k-1]['todate']);
					}
				}
			}
			
			
			$(".experiencefieldset").append("<div class='experienceclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Designation</label><input type='hidden' id='experienceid"+numItems+"' value='"+ expobj[k-1]['id'] +"'/><input disabled type='text' class='designation form-control' id='designation"+numItems+"' value='"+expobj[k-1]['designation']+"'/></div><div class='col-sm-4'><div class='form-group'><label>Industry</label><input class='form-control industry'  id='industry"+numItems+"' disabled value='"+expobj[k-1]['industry']+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Function</label><input disabled value='"+expobj[k-1]['function']+"' class='form-control function'  id='function"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Employer</label><input disabled value='"+expobj[k-1]['employer']+"' class='form-control employer'  id='employer"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input disabled value='"+expobj[k-1]['city']+"' class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><input disabled value='"+expobj[k-1]['country']+"' class='form-control country'  id='expcountry"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input disabled value='"+expobj[k-1]['fromdate']+"' type='text' class='fromdate mptldp form-control' id='expfromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input disabled value='"+expobj[k-1]['todate']+"' type='text' class='exptodate mptldp form-control' id='exptodate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Contract</label><input disabled value='"+expobj[k-1]['contract']+"' class='form-control contract'  id='contract"+numItems+"'/></div></div></div></div>");
			$(".experiencefieldset").append("<div class='col-md-12'><hr/></div>");
			
		}
		
		//qualification's
		var qualarr='<?php echo $qualifications; ?>';
		var qualobj = JSON.parse(qualarr);
				
		for (j = 1; j <= qualobj.length; j++) {
			var numItems = $('.qualificationclass').length+1;
			
			//change dateformat
			if(userdf==1){
				if(qualobj[j-1]['fromdate']){
					if(qualobj[j-1]['fromdate'].length>11){
						qualobj[j-1]['fromdate']=qualobj[j-1]['fromdate'].substring(0 , 10);
						qualobj[j-1]['fromdate']=formattodmy(qualobj[j-1]['fromdate']);
					}
				}
				
				if(qualobj[j-1]['passdate']){
					if(qualobj[j-1]['passdate'].length>11){
						qualobj[j-1]['passdate']=qualobj[j-1]['passdate'].substring(0 , 10);
						qualobj[j-1]['passdate']=formattodmy(qualobj[j-1]['passdate']);
					}
				}
				
			}else if(userdf==0){
				if(qualobj[j-1]['fromdate']){
					if(qualobj[j-1]['fromdate'].length>11){
						qualobj[j-1]['fromdate']=qualobj[j-1]['fromdate'].substring(0 , 10);
						qualobj[j-1]['fromdate']=formattoymd(qualobj[j-1]['fromdate']);
					}
				}
				
				if(qualobj[j-1]['passdate']){
					if(qualobj[j-1]['passdate'].length>11){
						qualobj[j-1]['passdate']=qualobj[j-1]['passdate'].substring(0 , 10);
						qualobj[j-1]['passdate']=formattoymd(qualobj[j-1]['passdate']);
					}
				}
			}
			
			
			$(".qualificationfieldset").append("<div class='qualificationclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Qualification</label><div class='input-group'><input type='hidden' id='qualificationid"+numItems+"'  value='"+ qualobj[j-1]['id'] +"'/><input type='text' class='qualification form-control' id='qualification"+numItems+"' disabled  value='"+qualobj[j-1]['qualification']+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Subject</label><input class='form-control subject'  id='subject"+numItems+"' disabled  value='"+qualobj[j-1]['subject']+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Subject2</label><input class='form-control secsubject' disabled  value='"+qualobj[j-1]['subject2']+"' id='secsubject"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>School/College</label><input class='form-control schoolcollege' disabled  value='"+qualobj[j-1]['schoolcollege']+"'  id='schoolcollege"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input disabled  value='"+qualobj[j-1]['city']+"' class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' disabled  value='"+qualobj[j-1]['fromdate']+"' class='fromdate mptldp form-control' id='fromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Pass Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' disabled  value='"+qualobj[j-1]['passdate']+"' class='passdate mptldp form-control' id='passdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Grade/Percentage</label><input class='form-control grade' disabled  value='"+qualobj[j-1]['grade']+"'  id='grade"+numItems+"'/></div></div></div></div>");
			$(".qualificationfieldset").append("<div class='col-md-12'><hr/></div>");
			
		}
		
		//skill's
		var skillarr='<?php echo $skills; ?>';
		var skillobj = JSON.parse(skillarr);
				
		for (k = 1; k <= skillobj.length; k++) {
			var numItems = $('.skillclass').length+1;
			
			//change dateformat
			if(userdf==1){
				if(skillobj[k-1]['fromdate']){
					if(skillobj[k-1]['fromdate'].length>11){
						skillobj[k-1]['fromdate']=skillobj[k-1]['fromdate'].substring(0 , 10);
						skillobj[k-1]['fromdate']=formattodmy(skillobj[k-1]['fromdate']);
					}
				}
				
				if(skillobj[k-1]['todate']){
					if(skillobj[k-1]['todate'].length>11){
						skillobj[k-1]['todate']=skillobj[k-1]['todate'].substring(0 , 10);
						skillobj[k-1]['todate']=formattodmy(skillobj[k-1]['todate']);
					}
				}
				
			}else if(userdf==0){
				if(skillobj[k-1]['fromdate']){
					if(skillobj[k-1]['fromdate'].length>11){
						skillobj[k-1]['fromdate']=skillobj[k-1]['fromdate'].substring(0 , 10);
						skillobj[k-1]['fromdate']=formattoymd(skillobj[k-1]['fromdate']);
					}
				}
				
				if(skillobj[k-1]['todate']){
					if(skillobj[k-1]['todate'].length>11){
						skillobj[k-1]['todate']=skillobj[k-1]['todate'].substring(0 , 10);
						skillobj[k-1]['todate']=formattoymd(skillobj[k-1]['todate']);
					}
				}
			}
			
			
			$(".skillfieldset").append("<div class='skillclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>Skill</label><div class='input-group'><input type='hidden' id='skillid"+numItems+"' value='"+ skillobj[k-1]['id'] +"'/><input disabled type='text' class='skill form-control' id='skill"+numItems+"' value='"+ skillobj[k-1]['skill'] +"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Skill Group</label><input disabled class='form-control skillgroup'  id='skillgroup"+numItems+"'  value='"+ skillobj[k-1]['skillgroup'] +"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Proficiency</label><input disabled class='form-control skillproficiency'  id='skillproficiency"+numItems+"'  value='"+ skillobj[k-1]['proficiency'] +"'  disabled/></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='skillfromdate mptldp form-control' id='skillfromdate"+numItems+"'  value='"+ skillobj[k-1]['fromdate'] +"' disabled/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='skilltodate mptldp form-control' id='skilltodate"+numItems+"'  value='"+ skillobj[k-1]['todate'] +"' disabled/></div></div></div></div></div></div>");
			$(".skillfieldset").append("<div class='col-md-12'><hr/></div>");
			
		}
		
		
		//office asset's
		var assetarr='<?php echo $assets; ?>';
		var assetobj = JSON.parse(assetarr);
				
		for (k = 1; k <= assetobj.length; k++) {
			var numItems = $('.assetclass').length+1;
			
			//change dateformat
			if(userdf==1){
				if(assetobj[k-1]['issuedate']){
					if(assetobj[k-1]['issuedate'].length>11){
						assetobj[k-1]['issuedate']=assetobj[k-1]['issuedate'].substring(0 , 10);
						assetobj[k-1]['issuedate']=formattodmy(assetobj[k-1]['issuedate']);
					}
				}
				
				if(assetobj[k-1]['todate']){
					if(assetobj[k-1]['todate'].length>11){
						assetobj[k-1]['todate']=assetobj[k-1]['todate'].substring(0 , 10);
						assetobj[k-1]['todate']=formattodmy(assetobj[k-1]['todate']);
					}
				}
				
			}else if(userdf==0){
				if(assetobj[k-1]['issuedate']){
					if(assetobj[k-1]['issuedate'].length>11){
						assetobj[k-1]['issuedate']=assetobj[k-1]['issuedate'].substring(0 , 10);
						assetobj[k-1]['issuedate']=formattoymd(assetobj[k-1]['issuedate']);
					}
				}
				
				if(assetobj[k-1]['todate']){
					if(assetobj[k-1]['todate'].length>11){
						assetobj[k-1]['todate']=assetobj[k-1]['todate'].substring(0 , 10);
						assetobj[k-1]['todate']=formattoymd(assetobj[k-1]['todate']);
					}
				}
			}
			
			
			$(".officeassetfieldset").append("<div class='assetclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>Asset Type</label><div class='input-group'><input type='hidden' id='assetid"+numItems+"' value='0'/><input value='"+assetobj[k-1]['assettype']+"' disabled class='form-control assettype'  id='assettype"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Asset Number</label><input class='form-control assetnumber'  id='assetnumber"+numItems+"' value='"+assetobj[k-1]['assetnumber']+"' disabled /></div></div><div class='col-sm-4'><div class='form-group'><label>Asset Description</label><input class='form-control description'  id='assetdescription"+numItems+"' value='"+assetobj[k-1]['assetdescription']+"' disabled /></div></div></div><div class='col-md-6'><div class='col-sm-4'><label>Location</label><div class='input-group'><input type='text' value='"+assetobj[k-1]['location']+"' disabled class='location form-control' id='assetlocation"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+assetobj[k-1]['issuedate']+"' disabled type='text' class='assetissuedate mptldp form-control' id='assetissuedate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+assetobj[k-1]['todate']+"' disabled type='text' class='assettodate mptldp form-control' id='assettodate"+numItems+"'/></div></div></div></div></div></div>");
			$(".officeassetfieldset").append("<div class='col-md-12'><hr/></div>");
			
		}
		
		
    });


</script>
 <?php $this->end(); ?>
