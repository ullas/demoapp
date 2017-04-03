<style>
div#myDropZone {
    width: 100%;
    min-height: 500px;
    border : 1.9px dashed #008FE2;display: table;
}
.dz-message {
	color:#333;
	font-size:26px;
    font-weight: 400;
  	display: table-cell;
   vertical-align: middle;
}
.dz-clickable {
    cursor: pointer;
}
.dz-max-files-reached {
          /*pointer-events: none;*/          cursor: default;
}
.upload-btn{
	font-size:16px;font-weight: 400;padding:8px;
}
.emp-profilepic{
    width: 100px;
    height:100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}
</style>
<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Employee
                <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content"><?= $this->Form->create($employee) ?>
	<div class="box box-primary" style="border-color:transparent;"><div class="box-body">
		<div class="row">

    <div class="col-md-12">
      <div class="nav-tabs-custom">

      	<div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="../add" >Hiring</a></li>
                    <li><a href="/Actions/transfer/<?php echo $id; ?>" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Transfer</a></li>
                    <li><a href="/Actions/promotion/<?php echo $id; ?>" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Promotion</a></li>
                    <li class="divider"></li>
                    <li><a href="/Actions/addresschange/<?php echo $id; ?>" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Address Change</a></li>
                    <li><a href="#" class="open-Popup" data-toggle="modal" data-remote="false" data-target="#actionspopover">Global Assignment</a></li>
                    <li><a href="/Actions/addnote/<?php echo $id; ?>" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Add Note</a></li>
                    <li><a href="/Actions/terminate/<?php echo $id; ?>" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Termination</a></li>
                    <li><a href="/Actions/retirement/<?php echo $id; ?>" data-remote="false" class="open-Popup" data-toggle="modal" data-target="#actionspopover">Retirement</a></li>
                  </ul>
                </div>
       </div>


        <ul class="nav nav-tabs">
          	<li class="active"><a href="#EmpDataPersonal" data-toggle="tab">Personal Information</a></li>
            <li><a href="#EmploymentInfo" data-toggle="tab">Employment Information</a></li>
            <li><a href="#EmpDataBiography" data-toggle="tab">Profile</a></li>
            <li><a href="#jobinfo" data-toggle="tab">Job Info</a></li>
           	<li><a href="#social" data-toggle="tab">Social</a></li>
           	<li><a href="#address" data-toggle="tab">Address</a></li>
           	<li><a href="#ids" data-toggle="tab">ID's</a></li>
        </ul>




          <div class=" tab-content">
          <div class="tab-pane" id="EmpDataBiography">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<div class="col-md-4">
        			<div class="form-group">
            			<label class="control-label" for="employee-profilepicture" style="margin-bottom: 5px;">Profile Picture</label> 
            			<a href="#" class="open-Popup" data-toggle="modal" data-remote="false" data-target="#editpicpopover" style="font-size:20px;">&nbsp;<i class="fa fa-camera"></i></a>
                        		
        				<?php $picturename='/img/uploadedpics/'.$employee['profilepicture'];
          				echo $this->Html->image($picturename, array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'User profile picture')); ?>
          			</div>	
          		</div>	
                <?php
                echo $this->Form->input('empdatabiography.person_id_external',['disabled'=>true,'label' => 'Employee Number']);
				echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
				echo $this->Form->input('empdatabiography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('empdatabiography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true]);
				echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
            	echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
				echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        		?>
        		
        		<?php echo $this->Form->input('employee.profilepicture', array('type' => 'hidden')); ?>
        		
            	
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->


          <div class="active tab-pane" id="EmpDataPersonal">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<div class="row" style="margin:0px;">
             		<?php
            			echo $this->Form->input('empdatapersonal.salutation',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            			echo $this->Form->input('empdatapersonal.initials',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            		?>
            		</div>
            <?php
            echo $this->Form->input('empdatapersonal.first_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.last_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.middle_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            /*echo $this->Form->input('empdatapersonal.first_name_alt1',['label' => 'First Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.middle_name_alt1',['label' => 'Middle Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.last_name_alt1',['label' => 'Last Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.first_name_alt2',['label' => 'First Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.middle_name_alt2',['label' => 'Middle Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.last_name_alt2',['label' => 'Last Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);*/
            echo $this->Form->input('empdatapersonal.display_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.formal_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            /*echo $this->Form->input('empdatapersonal.birth_name_alt1',['label' => 'Birth Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.birth_name_alt2',['label' => 'Birth Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);*/
            echo $this->Form->input('empdatapersonal.preferred_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            /*echo $this->Form->input('empdatapersonal.display_name_alt1',['label' => 'Display Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.display_name_alt2',['label' => 'Display Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.formal_name_alt1',['label' => 'Formal Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.formal_name_alt2',['label' => 'Formal Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);*/
            echo $this->Form->input('empdatapersonal.name_format');
            echo $this->Form->input('empdatapersonal.is_overridden');
            echo $this->Form->input('empdatapersonal.nationality',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            /*echo $this->Form->input('empdatapersonal.second_nationality',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.third_nationality',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);*/
            echo $this->Form->input('empdatapersonal.wps_code',['label' => 'WPS Code']);
            //echo $this->Form->input('empdatapersonal.uniqueid',['label' => 'Employer Unique ID']);
            echo $this->Form->input('empdatapersonal.prof_legal',['label' => 'Profession for Legal Reporting']);
            echo $this->Form->input('empdatapersonal.exclude_legal',['label' => 'Exclude from Legal Reporting']);
            echo $this->Form->input('empdatapersonal.nationality_date', ['label' => 'Nationality Acquisition Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.home_airport',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-plane"></i></div>']]);
            echo $this->Form->input('empdatapersonal.religion');
            echo $this->Form->input('empdatapersonal.number_children',['label' => 'Number of Children']);
            /*echo $this->Form->input('empdatapersonal.disability_date', ['label' => 'Disability Date Learned','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.disable_group',['label' => 'Disability Challenge Group']);
            echo $this->Form->input('empdatapersonal.disable_degree',['label' => 'Degree of Challenge']);
            echo $this->Form->input('empdatapersonal.disable_type',['label' => 'Type of Challenge']);
            echo $this->Form->input('empdatapersonal.disable_authority',['label' => 'Issuing Authority']);
            echo $this->Form->input('empdatapersonal.disable_ref',['label' => 'Reference Number']);*/
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->

          <div class="tab-pane" id="EmploymentInfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
              echo $this->Form->input('employmentinfo.start_date', ['label' => 'Hire Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.first_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.original_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.company',['label' => 'New Assignment Company']);
              echo $this->Form->input('employmentinfo.is_primary');
  			  echo $this->Form->input('employmentinfo.seniority_date', ['label' => 'Seniority Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.benefits_eligibility_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.prev_employeeid',['label' => 'Previous Employment ID']);
              echo $this->Form->input('employmentinfo.eligible_for_stock',['label' => 'Eligible for Stock']);
  		      echo $this->Form->input('employmentinfo.service_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.initial_stock_grant');
              echo $this->Form->input('employmentinfo.initial_option_grant');
              echo $this->Form->input('employmentinfo.job_credit');
              echo $this->Form->input('employmentinfo.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>']]);
              echo $this->Form->input('employmentinfo.is_contingent_worker');
			  ?>
			  
			  <div class="terminationcontent" style="display:none;">
			  <div class="col-md-12"><hr/><h3 class="box-title"><u>Termination</u></h3></div>
			  <?php
              echo $this->Form->input('employmentinfo.end_date', ['label' => 'Termination Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.ok_to_rehire',['label' => 'Ok to Rehire']);
  			  echo $this->Form->input('employmentinfo.pay_roll_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
  			  echo $this->Form->input('employmentinfo.last_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.regret_termination');
  			  echo $this->Form->input('employmentinfo.eligible_for_sal_continuation',['label' => 'Eligible for Salary Continuation']);
              echo $this->Form->input('employmentinfo.bonus_pay_expiration_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.stock_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.salary_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.benefits_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        	  ?>
        	 </div>
        	  </fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->

		  <div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
             echo $this->Form->input('jobinfo.position_id', ['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-briefcase"></i></div>'],'class'=>'select2','options' => $positions, 'empty' => true]);
            echo $this->Form->input('jobinfo.position_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.time_in_position');
            echo $this->Form->input('jobinfo.legal_entity_id',['class'=>'select2', 'empty' => true]);
			      echo $this->Form->input('jobinfo.business_unit_id',['class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.division_id',['class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.department_id',['class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.cost_centre_id',['label' => 'Cost Center','class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.location_id',['class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.country_of_company',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('jobinfo.timezone');
            echo $this->Form->input('jobinfo.job_code',['label' => 'Job Classification']);
            echo $this->Form->input('jobinfo.job_title');
            echo $this->Form->input('jobinfo.local_job_title');
            echo $this->Form->input('jobinfo.employee_class');
            echo $this->Form->input('jobinfo.pay_grade_id',['class'=>'select2']);
            echo $this->Form->input('jobinfo.regular_temp',['label'=>'Regular/Temporary','class'=>'select2','options' => array('Regular', 'Temporary'), 'empty' => true]);
            echo $this->Form->input('jobinfo.standard_hours',['label' => 'Standard Weekly Hours']);
            echo $this->Form->input('jobinfo.working_days_per_week');
            echo $this->Form->input('jobinfo.work_period');
            echo $this->Form->input('jobinfo.fte',['label' => 'FTE']);
            echo $this->Form->input('jobinfo.is_full_time_employee');
            echo $this->Form->input('jobinfo.is_shift_employee');
            echo $this->Form->input('jobinfo.shift_code');
            echo $this->Form->input('jobinfo.shift_rate');
            echo $this->Form->input('jobinfo.shift_factor',['label'=>'Shift Percent']);
            echo $this->Form->input('jobinfo.employee_type');
            echo $this->Form->input('jobinfo.manager_id1',['label'=>'Manager 1']);
			      echo $this->Form->input('jobinfo.manager_id2',['label'=>'Manager 2']);
			      echo $this->Form->input('jobinfo.manager_id3',['label'=>'Manager 3']);
			      echo $this->Form->input('jobinfo.manager_id4',['label'=>'Manager 4']);
			      echo $this->Form->input('jobinfo.manager_id5',['label'=>'Manager 5']);
            echo $this->Form->input('jobinfo.is_cross_border_worker');
            echo $this->Form->input('jobinfo.is_competition_clause_active');
            echo $this->Form->input('jobinfo.probation_period_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.attachmentid',['label'=>'Attachment']);
            echo $this->Form->input('jobinfo.custom_string1',['label'=>'Custom String 1']);
            echo $this->Form->input('jobinfo.eeo_class',['label'=>'EEO Class']);
            echo $this->Form->input('jobinfo.change_reason_external',['label'=>'Event Reason External']);
            echo $this->Form->input('jobinfo.radford_jobcode');
            echo $this->Form->input('jobinfo.is_primary');
            echo $this->Form->input('jobinfo.trackid',['label'=>'Track Id']);
            echo $this->Form->input('jobinfo.employment_type');
            echo $this->Form->input('jobinfo.is_eligible_for_car');
            echo $this->Form->input('jobinfo.is_eligible_for_benefit');
            echo $this->Form->input('jobinfo.international_org_code');
            echo $this->Form->input('jobinfo.is_eligible_for_financial_plan');
            echo $this->Form->input('jobinfo.amount_of_financial_plan');
            echo $this->Form->input('jobinfo.supervisor_level');
            echo $this->Form->input('jobinfo.ern_number',['label'=>'Employee Record Number']);
            echo $this->Form->input('jobinfo.sick_pay_supplement');
            echo $this->Form->input('jobinfo.company_leaving_for');
            echo $this->Form->input('jobinfo.is_side_line_job_allowed',['label'=>'Sideline Job Allowed']);
            echo $this->Form->input('jobinfo.holiday_calendar_id',['class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.work_schedule_id',['class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.time_type_profile_id',['label'=>'Time Profile','class'=>'select2', 'empty' => true]);
            echo $this->Form->input('jobinfo.time_recording_profile_code',['label'=>'Time Recording Profile']);
            echo $this->Form->input('jobinfo.time_recording_admissibility_code',['label'=>'Time Recording Admissibility']);
            echo $this->Form->input('jobinfo.time_recording_variant');
            echo $this->Form->input('jobinfo.default_overtime_compensation_variant');
            echo $this->Form->input('jobinfo.event');
            echo $this->Form->input('jobinfo.event_reason');
            echo $this->Form->input('jobinfo.notice_period');
            echo $this->Form->input('jobinfo.expected_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.pay_scale_area');
            echo $this->Form->input('jobinfo.pay_scale_type');
            echo $this->Form->input('jobinfo.pay_scale_group');
            echo $this->Form->input('jobinfo.pay_scale_level');
            echo $this->Form->input('jobinfo.job_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.time_in_job');
            echo $this->Form->input('jobinfo.company_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.time_in_company');
            echo $this->Form->input('jobinfo.location_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.time_in_location');
            echo $this->Form->input('jobinfo.department_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.time_in_department');
            echo $this->Form->input('jobinfo.pay_scale_level_entry_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.time_in_pay_scale_level');
            echo $this->Form->input('jobinfo.hire_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.termination_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.leave_of_absence_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('jobinfo.leave_of_absence_return_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

			echo $this->Form->input('jobinfo.notes',['type'=>'textArea']);
			 ?></fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->

          <div class="tab-pane" id="social">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            		echo $this->Form->input('contact_info.phone',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-mobile"></i></div>']]);
            		echo $this->Form->input('contact_info.mobile',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-phone"></i></div>']]);
            		echo $this->Form->input('contact_info.email_address1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa  fa-envelope"></i></div>']]);
            		echo $this->Form->input('contact_info.email_address2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa  fa-envelope"></i></div>']]);
            		echo $this->Form->input('contact_info.facebook',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-facebook"></i></div>']]);
            		echo $this->Form->input('contact_info.linkedin',['label' =>'LinkedIn','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-linkedin"></i></div>']]);
        			?>

        			<?php echo $this->Form->input('profilepicture', array('type' => 'hidden')); ?>
            <!-- </div> -->
     		</fieldset>
          </div>
          <!-- Tab Pane-->

          <div class="tab-pane" id="address">
             <!-- <div class="form-horizontal"> -->
             <fieldset>
             	<?php
            		echo $this->Form->input('address.address_no',['label' => 'Adress Number']);
            		echo $this->Form->input('address.address1',['label' => 'Care Of']);
            		echo $this->Form->input('address.address2',['label' => 'Street']);
            		echo $this->Form->input('address.address3',['label' => 'House Number']);
            		echo $this->Form->input('address.address4',['label' => 'Apartment']);
           	 		echo $this->Form->input('address.address5',['label' => 'Second Address Line']);
            		echo $this->Form->input('address.address6',['label' => 'POBOX']);
            		echo $this->Form->input('address.address7',['label' => 'Camp']);
            		echo $this->Form->input('address.address8',['label' => 'Bed Number']);
            		echo $this->Form->input('address.zip_code',['label' => 'Postal Code']);
            		echo $this->Form->input('address.city',['label' => 'City']);
            		echo $this->Form->input('address.county',['label' => 'District']);
            		echo $this->Form->input('address.state',['label' => 'Region']);
        		?>
     		 </fieldset>
          </div>
          <!-- Tab Pane-->
          <div class="tab-pane" id="ids">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
             			echo $this->Form->input('identity.country',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            			echo $this->Form->input('identity.card_type',['label' => 'National ID Card Type']);
            			echo $this->Form->input('identity.nationalid',['label' => 'National ID']);
            			echo $this->Form->input('identity.is_primary');
        			?>
            <!-- </div> -->
     		</fieldset>
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
    <?= $this->Form->button(__('Update Employee'),['title'=>'Update Employee','class'=>'pull-right']) ?>
</div>
</div>
<?= $this->Form->end() ?></section>


<div id='loadingmessage' style='display:none;'>
	<i class="fa fa-refresh fa-spin loading-icon"></i>
</div>
<style>
	#loadingmessage{
		position: fixed;
    	bottom: calc(100% - 50%);
    	right:50%;
    	/*background: #363637;*/
    	padding: 5px 0px 4px;
    	z-index: 1900;
	}
	.loading-icon{
    	color: #21A57E;
    	padding: 3px 9px 0 10px;
    	font-size: 45px;
	}
</style>


<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>


<?php $this->start('scriptBotton'); ?>
<script>
$(document).ready(function(){
	
	 //dropzone
	Dropzone.autoDiscover = false;
	var myDropzone = $("div#myDropZone").dropzone({
         url : "/Uploads/upload",
         maxFiles: 1,
         addRemoveLinks: true, 
         dictRemoveFileConfirmation : 'Are you sure you want to remove the particular file ?' ,
         init: function() {
     		this.on("complete", function (file) {
      			if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					//alert(file);      
				}
    		});
    		this.on("removedfile", function (file) {
          		$("#profilepicture").val("");
      		});
    		this.on("queuecomplete", function (file) {
          // alert("All files have uploaded ");
      		});
      
      		this.on("success", function (file) {
          		$("#profilepicture").val(file['name']);console.log(file['name']); //alert("Success ");
          		$('#profilepic').attr("src", "/img/uploadedpics/"+file['name']);
      		});
      
      		this.on("error", function (file) {
          		// alert("Error in uploading ");
      		});
      
      		this.on("maxfilesexceeded", function(file){
        		// bootbox_alert("You can not upload any more files.!").modal('show');
        		sweet_alert("You can not upload any more files.!");
        		this.removeFile(file);
    		});
    	},
       
    });
    
	$("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				// bootbox_alert(msg).modal('show');
				sweet_alert(msg);
			}else{

				var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
				if(userdf==1){
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true });
				}else{
					$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true });
				}
	    		//select 2
    			$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
				//hide popover on button click
				$( ".popoverDelete" ).click(function() {
					$('#actionspopover').modal('hide');
				});
			}
		});
	});


	$('#actionspopover').on('hidden.bs.modal', function (e) {
	  $('.modal-body', this).empty();
	})

	$('#employmentinfo-start-date').on('changeDate', function (e) {
		
         if($('#employmentinfo-start-date').val()!="" && $('#employmentinfo-start-date').val()!=null){ 
         	
         	if($('#employmentinfo-first-date-worked').val()=="" || $('#employmentinfo-first-date-worked').val()==null){ $('#employmentinfo-first-date-worked').val($('#employmentinfo-start-date').val()); }
         	if($('#employmentinfo-original-start-date').val()=="" || $('#employmentinfo-original-start-date').val()==null){ $('#employmentinfo-original-start-date').val($('#employmentinfo-start-date').val()); }
         	if($('#employmentinfo-seniority-date').val()=="" || $('#employmentinfo-seniority-date').val()==null){ $('#employmentinfo-seniority-date').val($('#employmentinfo-start-date').val()); }
         	if($('#employmentinfo-benefits-eligibility-start-date').val()=="" || $('#employmentinfo-benefits-eligibility-start-date').val()==null){ $('#employmentinfo-benefits-eligibility-start-date').val($('#employmentinfo-start-date').val()); }
         	if($('#employmentinfo-service-date').val()=="" || $('#employmentinfo-service-date').val()==null){ $('#employmentinfo-service-date').val($('#employmentinfo-start-date').val()); }
         	
         } 					
    });
    					
});
</script>
<?php $this->end(); ?>



<div class="modal fade" id="editpicpopover" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Employee's Profile Picture</h4>
      </div>
              <div class="modal-body" >
            <div class="form-horizontal">
            	
            	
            	
            	
			    <!-- upload component -->
            	<div class="form-group" style="margin:20px;"><div id="myDropZone" class="dropzone"><div class="dz-message text-center"><i class="fa fa-cloud-upload text-light-blue fa-5x"></i>
            		<br/><span>Drag and Drop the picture Here to upload.</span>
            		<br/><span class="upload-btn bg-info">or select the picture to Upload</span></div></div>
            	</div>
            	
            	
            	
            </div>
			  </div>
			  
			  

          </div>
      </div>
</div>