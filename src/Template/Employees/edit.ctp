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
<section class="content"><?= $this->Form->create($employee,['id'=>'empform']) ?>
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
           	<li><a href="#qualification" data-toggle="tab">Educational Qualification</a></li>
           	<li><a href="#experience" data-toggle="tab">Experience</a></li>
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
          						if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
									echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'User profile picture'));
								}else{
									echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'emp-profilepic img-responsive', 'id'=>'profilepic', 'alt' => 'User profile picture'));
								}
						 ?>
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
             echo $this->Form->input('jobinfo.pay_group_id', ['label' => 'Pay Group','options'=>$payGroups, 'class'=>'select2', 'empty' => true]);
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
             	<div class="box box-solid box-default">
             	<div class="box-header with-border">
          			<h3 class="box-title"><i class="fa fa-map-marker"></i> Current Address</h3>
        		</div>
        		<div class="box-body">
             	<?php
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
        		</div>
     		 	</div>
     		 	
        		<!-- permanent address -->
        		<div class="box box-solid box-default">
             	<div class="box-header with-border">
          			<h3 class="box-title"><i class="fa fa-home"></i> Permanent Address</h3>
          			<div class="box-tools pull-right">
                  			<label class="checkbox no-padding"><input type="checkbox" value="1" id="copyaddress" class="control-form">Same as current address</label>
              		</div>
        		</div>
        		<div class="box-body">
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Care Of</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress1" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">Street</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress2" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label">House Number</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress3" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-address4">Apartment</label>
             		<div class="input-group"><input type="text"  maxlength="256" id="paaddress4" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-address5">Second Address Line</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress5" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-address6">POBOX</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress6" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-address7">Camp</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress7" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-address8">Bed Number</label>
             		<div class="input-group"><input type="text" maxlength="256" id="paaddress8" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-zip-code">Postal Code</label>
             		<div class="input-group"><input type="text" maxlength="256" id="pazipcode" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-city">City</label>
             		<div class="input-group"><input type="text" maxlength="256" id="pacity" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-county">District</label>
             		<div class="input-group"><input type="text" maxlength="256" id="pacounty" class="form-control" value=""></div></div></div>
             	<div class="col-md-4"><div class="form-group text"><label class="control-label" for="address-state">Region</label>
             		<div class="input-group"><input type="text" maxlength="256" id="pastate" class="form-control" value=""></div></div></div>        		
     		 	</div>
     		 	</div>
     		 
     		 </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="ids">
             <!-- <div class="form-horizontal"> -->
             	<fieldset >
             		<div class="idfieldset">
             		<?php
             			echo $this->Form->input('identity.card_type',['label' => 'National ID Card Type']);
            			echo $this->Form->input('identity.country',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            			echo $this->Form->input('identity.nationalid',['label' => 'National ID']);
            			echo $this->Form->input('identity.is_primary');
						echo $this->Form->input('identity.issuedate', ['label' => 'Issue Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            			echo $this->Form->input('identity.expirydate', ['label' => 'Expiry Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            
        			?>
        			<div class="col-md-12"><hr/></div>
        			</div>
        			
        			<div class="col-md-4 pull-left"><div class="form-group">
        				<div class="input-group" >        		
        					<input type="button" class="btn btn-flat btn-info pull-left" id="btnAddIDCtrls" value="Add More" />
        				</div>
        			</div></div>
        
            <!-- </div> -->
     		</fieldset>
          </div>
          <!-- Tab Pane-->

		<div class="tab-pane" id="qualification">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="qualificationfieldset">
                <?php
                	echo $this->Form->input('educationalqualification.qualification');
            		echo $this->Form->input('educationalqualification.subject');
            		echo $this->Form->input('educationalqualification.subject2');
            		echo $this->Form->input('educationalqualification.schoolcollege', ['label' => 'School/College']);
            		echo $this->Form->input('educationalqualification.city');
            		echo $this->Form->input('educationalqualification.fromdate', ['label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('educationalqualification.passdate', ['label' => 'Pass Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('educationalqualification.grade', ['label' => 'Grade/Percentage']);
			      ?>        		
            		
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
        			<div class="col-md-4 pull-left"><div class="form-group">
        				<div class="input-group" >        		
        					<input type="button" class="btn btn-flat btn-info pull-left" id="btnAddQualificationCtrls" value="Add More" />
        				</div>
        			</div></div>
        			
             	 </fieldset>
            <!-- </div> -->

          </div>
          <!-- /.tab-pane -->
          
          <div class="tab-pane" id="experience">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="experiencefieldset">
                <?php
                	echo $this->Form->input('experience.designation');
            		echo $this->Form->input('experience.industry');
            		echo $this->Form->input('experience.function');
            		echo $this->Form->input('experience.employer');
            		echo $this->Form->input('experience.city');
            		echo $this->Form->input('experience.country');
            		echo $this->Form->input('experience.fromdate', ['label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('experience.todate', ['label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('experience.contract');
			      ?>        		
            		
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
        			<div class="col-md-4 pull-left"><div class="form-group">
        				<div class="input-group" >        		
        					<input type="button" class="btn btn-flat btn-info pull-left" id="btnAddExperienceCtrls" value="Add More" />
        				</div>
        			</div></div>
        			
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

<div class="box-footer">
    <a href="/employees">Cancel</a>
    <input type="submit" id="updateform"  value="Update Employee" class="pull-right btn btn-primary"  onclick="return updateEmployee()" />
    <!-- <?= $this->Form->button(__('Update Employee'),['title'=>'Update Employee','id'=>'updateform','class'=>'pull-right']) ?> --></div>
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
	var countrydata=[];
	var countryarr=<?php echo $countryarr ?>;
	$.each(countryarr, function(key, value) {
    	countrydata.push({'id':key, "text":value});
	});
	window.onload = function () { 
		//load country dropdown
			$('.idcountry').select2({
    			width: '100%',allowClear: true,placeholder: "Select",data: countrydata
			});
	}
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
			$("#pacity").val(addressobj[i-1]['city']);
			$("#pastate").val(addressobj[i-1]['state']);
			$("#pacounty").val(addressobj[i-1]['county']);
			$("#pazipcode").val(addressobj[i-1]['zip_code']);

		}
		
    var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
    var idsarr='<?php echo $ids ?>';
		var idobj = JSON.parse(idsarr);
		
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
			
			$(".idfieldset").append("<div class='idclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><div class='form-group'><label>National ID Card Type</label><div class='input-group'><div class='input-group-btn'><a id='"+ idobj[i-1]['id'] +"' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='identityid"+numItems+"' value='"+ idobj[i-1]['id'] +"'/><input type='text' class='idtype form-control' id='idtype"+numItems+"' value='"+ idobj[i-1]['card_type'] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-flag'></i></div><input class='form-control idcountry'  id='country"+numItems+"' value='"+ idobj[i-1]['country'] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>National ID</label><input value='"+ idobj[i-1]['nationalid'] +"' class='form-control nationalid'  id='nationalid"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group checkbox'><label><input type='checkbox' class='isprimary'  id='isprimary"+numItems+"' value='"+ idobj[i-1]['is_primary'] +"'/>Is Primary</label></div></div><div class='col-sm-4'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='issuedate mptldp form-control' id='issuedate"+numItems+"' value='"+ idobj[i-1]['issuedate'] +"'/></div></div><div class='col-sm-4'><label>Expiry Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+ idobj[i-1]['expirydate'] +"'  type='text' class='expirydate mptldp form-control' id='expirydate"+numItems+"'/></div></div></div></div>");
			$(".idfieldset").append("<div class='col-md-12'><hr/></div>");
			if(idobj[i-1]['is_primary']="true"){
				$("#isprimary"+i).prop('checked', true);
			}
		}
		
			
		
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
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}else{
					$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
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
    	
    	$("#btnAddIDCtrls").click(function (event) {
    		
    		event.preventDefault();
			var numItems = $('.idclass').length+1;
    		$(".idfieldset").append("<div class='idclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>National ID Card Type</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='identityid"+numItems+"' value='0'/><input type='text' class='idtype form-control' id='idtype"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-flag'></i></div><input class='form-control idcountry'  id='country"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>National ID</label><input class='form-control nationalid'  id='nationalid"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group checkbox'><label><input type='checkbox' class='isprimary'  id='isprimary"+numItems+"'/>Is Primary</label></div></div><div class='col-sm-4'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='issuedate mptldp form-control' id='issuedate"+numItems+"'/></div></div><div class='col-sm-4'><label>Expiry Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='expirydate mptldp form-control' id='expirydate"+numItems+"'/></div></div></div></div>");
			$(".idfieldset").append("<div class='col-md-12'><hr/></div>");
			
			//load country dropdown
			$('.idcountry').select2({
    			width: '100%',allowClear: true,placeholder: "Select",data: countrydata
			});
			
			//initialise datepicker
			//date picker
			var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}
			
    	});
    	
    	$("#btnAddQualificationCtrls").click(function (event) {
    		
    		event.preventDefault();
			var numItems = $('.qualificationclass').length+1;
    		$(".qualificationfieldset").append("<div class='qualificationclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Qualification</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='qualdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='qualificationid"+numItems+"' value='0'/><input type='text' class='qualification form-control' id='qualification"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Subject</label><input class='form-control subject'  id='subject"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Subject2</label><input class='form-control secsubject'  id='secsubject"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>School/College</label><input class='form-control schoolcollege'  id='schoolcollege"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='fromdate mptldp form-control' id='fromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Pass Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='passdate mptldp form-control' id='passdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Grade/Percentage</label><input class='form-control grade'  id='grade"+numItems+"'/></div></div></div></div>");
			$(".qualificationfieldset").append("<div class='col-md-12'><hr/></div>");
			
			//initialise datepicker
			var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}
			
    	});
    	
    	$("#btnAddExperienceCtrls").click(function (event) {
    		
    		event.preventDefault();
			var numItems = $('.experienceclass').length+1;
    		$(".experiencefieldset").append("<div class='experienceclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Designation</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='expdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='experienceid"+numItems+"' value='0'/><input type='text' class='designation form-control' id='designation"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Industry</label><input class='form-control industry'  id='industry"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Function</label><input class='form-control function'  id='function"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Employer</label><input class='form-control employer'  id='employer"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Employer</label><input class='form-control employer'  id='employer"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><input class='form-control country'  id='country"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='fromdate mptldp form-control' id='fromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Pass Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='passdate mptldp form-control' id='passdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Contract</label><input class='form-control contract'  id='contract"+numItems+"'/></div></div></div></div>");
			$(".experiencefieldset").append("<div class='col-md-12'><hr/></div>");
			
			//initialise datepicker
			var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}
			
    	});
    	
    	//copyaddress checkbox clicked
    	$('#copyaddress').change(function() {
        	if($(this).is(":checked")) {
	            $("#paaddress1").val($("#address-address1").val());
				$("#paaddress2").val($("#address-address2").val());
				$("#paaddress3").val($("#address-address3").val());
				$("#paaddress4").val($("#address-address4").val());
				$("#paaddress5").val($("#address-address5").val());
				$("#paaddress6").val($("#address-address6").val());
				$("#paaddress7").val($("#address-address7").val());
				$("#paaddress8").val($("#address-address8").val());
				$("#pacity").val($("#address-city").val());
				$("#pastate").val($("#address-state").val());
				$("#pacounty").val($("#address-county").val());
				$("#pazipcode").val($("#address-zip-code").val());
        	}
    	});
    	
    	//delete btn onclick
	$('.idfieldset').on('click', 'a.compdelete', function() {
		var selectedctrl=$(this);
		var id = $(this).attr('id');
		var empid='<?php echo $employee['id'] ?>';
		if (confirm("Are you sure you want to delete the particular ID ?")) {
			if(id!="newid"){
				$.ajax({
        			type: "POST",
        			url: '/Employees/deleteIds',
        			data: 'empid='+empid+'&identityid='+id,
        			success : function(data) {
        				if(data=="success"){
    						selectedctrl.parent().closest('div .idclass').remove();
    						return true;
    					}else{
    						sweet_alert("Couldn't delete the particular id details.Please try again later.");
							return false;
    					}
        			},error: function(data) {
        	    		sweet_alert("Couldn't delete the particular id details.Please try again later.");
						return false;
        			}
      
        		});
			}else{			
				$(this).parent().closest('div .idclass').remove();
    			return true;
    		}
  		} else {
    		return false;
  		}
   
	});
		
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
    function updateEmployee()
    {		
		var empid='<?php echo $employee['id'] ?>';
		
		//add permanent address
    	var address1=$("#paaddress1").val();
    	var address2=$("#paaddress2").val();
    	var address3=$("#paaddress3").val();
    	var address4=$("#paaddress4").val();
    	var address5=$("#paaddress5").val();
    	var address6=$("#paaddress6").val();
    	var address7=$("#paaddress7").val();
    	var address8=$("#paaddress8").val();
    	var city=$("#pacity").val();
    	var state=$("#pastate").val();
    	var county=$("#pacounty").val();
    	var zipcode=$("#pazipcode").val();
    		
    		
    	if(empid!="" && empid!=null && address1!="" && address1!=null && address2!="" && address2!=null){
    			$.ajax({
        			type: "POST",
        			url: '/Employees/addAddress',
        			data: 'empid='+empid+'&address1='+address1+'&address2='+address2+'&address3='+address3+'&address4='+address4+'&address5='+address5+'&address6='+address6
        					+'&address7='+address7+'&address8='+address8+'&county='+county+'&state='+state+'&zipcode='+zipcode+'&city='+city,
        			success : function(data) {
    		
        			},error: function(data) {        	    	 	
    					sweet_alert("Error while adding Addresses.");
						return false;   			
        			}     
        	});
		}else{
			sweet_alert("Please enter Address1/Address2.");
			return false;
		}
			
   		var idclasscount = $('.idclass').length;
   		if(idclasscount>0){
			var errcount=0;
    	
    		for (i = 1; i <= idclasscount; i++) 
    		{
    			var identityid=$("#identityid"+i).val();
    			var idtype=$("#idtype"+i).val();
    			var country=$("#country"+i).val();
    			var nationalid=$("#nationalid"+i).val();
    			var isprimary=0;
    			if($("#isprimary"+i).is(":checked")){isprimary=1;}
    			var issuedate=$("#issuedate"+i).val();
    			var expirydate=$("#expirydate"+i).val();
    		
    			if(empid!="" && empid!=null && idtype!="" && idtype!=null && nationalid!="" && nationalid!=null){
    				$.ajax({
        				type: "POST",
        				url: '/Employees/addIds',
        				data: 'empid='+empid+'&identityid='+identityid+'&idtype='+idtype+'&country='+country+'&nationalid='+nationalid+'&isprimary='+'0'+'&issuedate='+issuedate
        						+'&expirydate='+expirydate,
        				success : function(data) {
							if(i==idclasscount){
        	 					if(errcount>0){
    								sweet_alert("Error while adding Id's.");
									return false;
    							}else{
    								document.getElementById("empform").submit();
    							}
    						}    		
        				},
        				error: function(data) {
        					errcount++;
    						sweet_alert("Error while adding Id's.");
							return false;   			    						
    					},statusCode: {
        					500: function() {
          						errcount++;
        					}
      					}
      
        			});	
    			
				}else{
					sweet_alert("Please enter ID Card type/national Id.");
					return false;
				}    		
    		}	
    	 }else{
    		return true;
    	}
    	
			document.getElementById("empform").submit();
			return false;
		}			


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