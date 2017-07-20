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
          	<li id="li1" class="active"><a href="#EmpDataPersonal" data-toggle="tab">Personal Information</a></li>
            <li id="li2"><a href="#EmploymentInfo" data-toggle="tab">Employment Information</a></li>
            <li id="li3"><a href="#EmpDataBiography" data-toggle="tab">Profile</a></li>
           	<li id="lijobinfo"><a href="#jobinfo" data-toggle="tab">Job Info</a></li>
           	<li id="li4"><a href="#social" data-toggle="tab">Social</a></li>
           	<li id="li5"><a href="#address" data-toggle="tab">Address</a></li>
           	<li id="li6"><a href="#ids" data-toggle="tab">ID's</a></li>
			<li id="li7"><a href="#qualification" data-toggle="tab">Educational Qualification</a></li>
           	<li id="li8"><a href="#experience" data-toggle="tab">Experience</a></li>
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
            			<a href="#" class="open-Popup" data-toggle="modal" data-remote="false" data-target="#editpicpopover" style="font-size:20px;">&nbsp;<i class="fa fa-camera"></i></a>
                        		
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
                echo $this->Form->input('empdatabiography.person_id_external',['disabled'=>true,'label' => 'Employee Number']);
				echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
				echo $this->Form->input('empdatabiography.date_of_birth', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('empdatabiography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true]);
				echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
            	echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
				echo $this->Form->input('empdatabiography.date_of_death', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
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
            echo $this->Form->input('empdatapersonal.nationality_date', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','label' => 'Nationality Acquisition Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
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
              echo $this->Form->input('employmentinfo.start_date', ['value' => !empty($employee->employmentinfo->start_date) ? $employee->employmentinfo->start_date->format($mptldateformat) : '','label' => 'Hire Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.first_date_worked', ['value' => !empty($employee->employmentinfo->first_date_worked) ? $employee->employmentinfo->first_date_worked->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.original_start_date', ['value' => !empty($employee->employmentinfo->original_start_date) ? $employee->employmentinfo->original_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.company',['label' => 'New Assignment Company']);
              echo $this->Form->input('employmentinfo.is_primary');
  			  echo $this->Form->input('employmentinfo.seniority_date', ['value' => !empty($employee->employmentinfo->seniority_date) ? $employee->employmentinfo->seniority_date->format($mptldateformat) : '','label' => 'Seniority Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.benefits_eligibility_start_date', ['value' => !empty($employee->employmentinfo->benefits_eligibility_start_date) ? $employee->employmentinfo->benefits_eligibility_start_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.prev_employeeid',['label' => 'Previous Employment ID']);
              echo $this->Form->input('employmentinfo.eligible_for_stock',['label' => 'Eligible for Stock']);
  		      echo $this->Form->input('employmentinfo.service_date', ['value' => !empty($employee->employmentinfo->service_date) ? $employee->employmentinfo->service_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.initial_stock_grant');
              echo $this->Form->input('employmentinfo.initial_option_grant');
              echo $this->Form->input('employmentinfo.job_credit');
              echo $this->Form->input('employmentinfo.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>']]);
              echo $this->Form->input('employmentinfo.is_contingent_worker');
			  ?>
			  
			  <div class="terminationcontent" style="display:none;">
			  <div class="col-md-12"><hr/><h3 class="box-title"><u>Termination</u></h3></div>
			  <?php
              echo $this->Form->input('employmentinfo.end_date', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','label' => 'Termination Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.ok_to_rehire',['label' => 'Ok to Rehire']);
  			  echo $this->Form->input('employmentinfo.pay_roll_end_date', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
  			  echo $this->Form->input('employmentinfo.last_date_worked', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.regret_termination');
  			  echo $this->Form->input('employmentinfo.eligible_for_sal_continuation',['label' => 'Eligible for Salary Continuation']);
              echo $this->Form->input('employmentinfo.bonus_pay_expiration_date', ['value' => !empty($employee->employmentinfo->bonus_pay_expiration_date) ? $employee->employmentinfo->bonus_pay_expiration_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.stock_end_date', ['value' => !empty($employee->employmentinfo->stock_end_date) ? $employee->employmentinfo->stock_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.salary_end_date', ['value' => !empty($employee->employmentinfo->salary_end_date) ? $employee->employmentinfo->salary_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
              echo $this->Form->input('employmentinfo.benefits_end_date', ['value' => !empty($employee->employmentinfo->benefits_end_date) ? $employee->employmentinfo->benefits_end_date->format($mptldateformat) : '','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
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
             	<div class="box box-solid">
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
        		<div class="box box-solid">
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
             		<div class="col-md-6">	
             			<?php
             			echo $this->Form->input('identity.card_type',['label' => 'National ID Card Type']);
            			echo $this->Form->input('identity.country',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            			echo $this->Form->input('identity.nationalid',['label' => 'National ID']);
            			?>        		
            	</div>	
            	<div class="col-md-6">	
            	<?php
            			echo $this->Form->input('identity.is_primary');
						echo $this->Form->input('identity.issuedate', ['value' => !empty($employee->identity->issuedate) ? $employee->identity->issuedate->format($mptldateformat) : '','label' => 'Issue Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            			echo $this->Form->input('identity.expirydate', ['value' => !empty($employee->identity->expirydate) ? $employee->identity->expirydate->format($mptldateformat) : '','label' => 'Expiry Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            
        			?>
        			</div>
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
                	echo $this->Form->input('educational_qualification.qualification');
            		echo $this->Form->input('educational_qualification.subject');
            		echo $this->Form->input('educational_qualification.subject2');
            		echo $this->Form->input('educational_qualification.schoolcollege', ['label' => 'School/College']);
            		echo $this->Form->input('educational_qualification.city');
            		echo $this->Form->input('educational_qualification.fromdate', ['value' => !empty($employee->educational_qualification->fromdate) ? $employee->educational_qualification->fromdate->format($mptldateformat) : '','label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('educational_qualification.passdate', ['value' => !empty($employee->educational_qualification->passdate) ? $employee->educational_qualification->passdate->format($mptldateformat) : '','label' => 'Pass Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('educational_qualification.grade', ['label' => 'Grade/Percentage']);
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
            		echo $this->Form->input('experience.fromdate', ['value' => !empty($employee->experience->fromdate) ? $employee->experience->fromdate->format($mptldateformat) : '','label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('experience.todate', ['value' => !empty($employee->experience->todate) ? $employee->experience->todate->format($mptldateformat) : '','label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
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
          
          
           <div class="tab-pane" id="officeassets">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
        		<div class="officeassetfieldset">
        			<div class="col-md-6">
                <?php
                	echo $this->Form->input('office_asset.assettype', ['label' => 'Asset Type']);
            		echo $this->Form->input('office_asset.assetnumber', ['label' => 'Asset Number']);
            		echo $this->Form->input('office_asset.assetdescription', ['label' => 'Asset Description']);
            	?>        		
            	</div>	
            	<div class="col-md-6">	
            	<?php
            		echo $this->Form->input('office_asset.location');
            		echo $this->Form->input('office_asset.issuedate', ['value' => !empty($employee->office_asset->issuedate) ? $employee->office_asset->issuedate->format($mptldateformat) : '','label' => 'Issue Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('office_asset.todate', ['value' => !empty($employee->office_asset->todate) ? $employee->office_asset->todate->format($mptldateformat) : '','label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			      ?>        		
            		</div>
            		
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
        			<div class="col-md-4 pull-left"><div class="form-group">
        				<div class="input-group" >        		
        					<input type="button" class="btn btn-flat btn-info pull-left" id="btnAddAssetCtrls" value="Add More" />
        				</div>
        			</div></div>
        			
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
                	echo $this->Form->input('skill.skill');
            		echo $this->Form->input('skill.skillgroup', ['label' => 'Skill Group']);
            		echo $this->Form->input('skill.proficiency');
            		?>        		
            	</div>	
            	<div class="col-md-6">	
            	<?php
            		echo $this->Form->input('skill.fromdate', ['label' => 'From Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            		echo $this->Form->input('skill.todate', ['label' => 'To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

			      ?>        		
            		</div>
            		<div class="col-md-12"><hr/></div>
        			</div>
        			
        			<div class="col-md-4 pull-left"><div class="form-group">
        				<div class="input-group" >        		
        					<input type="button" class="btn btn-flat btn-info pull-left" id="btnAddSkillCtrls" value="Add More" />
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
	var idcounter=0;
	var expcounter=0;
	var qualcounter=0;
	var skillcounter=0;
	var assetcounter=0;
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
			
			$(".idfieldset").append("<div class='idclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>National ID Card Type</label><div class='input-group'><div class='input-group-btn'><a id='"+ idobj[i-1]['id'] +"' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='identityid"+numItems+"' value='"+ idobj[i-1]['id'] +"'/><input type='text' class='idtype form-control' id='idtype"+numItems+"' value='"+ idobj[i-1]['card_type'] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-flag'></i></div><input class='form-control idcountry'  id='country"+numItems+"' value='"+ idobj[i-1]['country'] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>National ID</label><input value='"+ idobj[i-1]['nationalid'] +"' class='form-control nationalid'  id='nationalid"+numItems+"'/></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group checkbox'><label><input type='checkbox' class='isprimary'  id='isprimary"+numItems+"' value='"+ idobj[i-1]['is_primary'] +"'/>Is Primary</label></div></div><div class='col-sm-4'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='issuedate mptldp form-control' id='issuedate"+numItems+"' value='"+ idobj[i-1]['issuedate'] +"'/></div></div><div class='col-sm-4'><label>Expiry Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+ idobj[i-1]['expirydate'] +"'  type='text' class='expirydate mptldp form-control' id='expirydate"+numItems+"'/></div></div></div></div></div>");
			$(".idfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			if(idobj[i-1]['is_primary']="true"){
				$("#isprimary"+i).prop('checked', true);
			}
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
			
			
			$(".experiencefieldset").append("<div class='experienceclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><div class='form-group'><label>Designation</label><div class='input-group'><div class='input-group-btn'><a id='"+ expobj[k-1]['id'] +"' class='expdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='experienceid"+numItems+"' value='"+ expobj[k-1]['id'] +"'/><input  type='text' class='designation form-control' id='designation"+numItems+"' value='"+expobj[k-1]['designation']+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Industry</label><input class='form-control industry'  id='industry"+numItems+"'  value='"+expobj[k-1]['industry']+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Function</label><input  value='"+expobj[k-1]['function']+"' class='form-control function'  id='function"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Employer</label><input  value='"+expobj[k-1]['employer']+"' class='form-control employer'  id='employer"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input  value='"+expobj[k-1]['city']+"' class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><input  value='"+expobj[k-1]['country']+"' class='form-control country'  id='expcountry"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input  value='"+expobj[k-1]['fromdate']+"' type='text' class='fromdate mptldp form-control' id='expfromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input  value='"+expobj[k-1]['todate']+"' type='text' class='exptodate mptldp form-control' id='exptodate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Contract</label><input  value='"+expobj[k-1]['contract']+"' class='form-control contract'  id='contract"+numItems+"'/></div></div></div></div>");
			$(".experiencefieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
			
			
			$(".qualificationfieldset").append("<div class='qualificationclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Qualification</label><div class='input-group'><div class='input-group-btn'><a id='"+ qualobj[j-1]['id'] +"' class='qualdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='qualificationid"+numItems+"' value='"+ qualobj[j-1]['id'] +"'/><input type='text' class='qualification form-control' id='qualification"+numItems+"'   value='"+qualobj[j-1]['qualification']+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Subject</label><input class='form-control subject'  id='subject"+numItems+"'   value='"+qualobj[j-1]['subject']+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Subject2</label><input class='form-control secsubject'   value='"+qualobj[j-1]['subject2']+"' id='secsubject"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>School/College</label><input class='form-control schoolcollege'   value='"+qualobj[j-1]['schoolcollege']+"'  id='schoolcollege"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input   value='"+qualobj[j-1]['city']+"' class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text'   value='"+qualobj[j-1]['fromdate']+"' class='fromdate mptldp form-control' id='fromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Pass Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text'   value='"+qualobj[j-1]['passdate']+"' class='passdate mptldp form-control' id='passdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Grade/Percentage</label><input class='form-control grade'   value='"+qualobj[j-1]['grade']+"'  id='grade"+numItems+"'/></div></div></div></div>");
			$(".qualificationfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
			
			
			$(".skillfieldset").append("<div class='skillclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>Skill</label><div class='input-group'><div class='input-group-btn'><a id='"+ skillobj[k-1]['id'] +"' class='skilldelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='skillid"+numItems+"' value='"+ skillobj[k-1]['id'] +"'/><input type='text' class='skill form-control' id='skill"+numItems+"' value='"+ skillobj[k-1]['skill'] +"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Skill Group</label><input class='form-control skillgroup'  id='skillgroup"+numItems+"'  value='"+ skillobj[k-1]['skillgroup'] +"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Proficiency</label><input class='form-control skillproficiency'  id='skillproficiency"+numItems+"'  value='"+ skillobj[k-1]['proficiency'] +"' /></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='skillfromdate mptldp form-control' id='skillfromdate"+numItems+"'  value='"+ skillobj[k-1]['fromdate'] +"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='skilltodate mptldp form-control' id='skilltodate"+numItems+"'  value='"+ skillobj[k-1]['todate'] +"'/></div></div></div></div></div></div>");
			$(".skillfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
			
			
			$(".officeassetfieldset").append("<div class='assetclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>Asset Type</label><div class='input-group'><div class='input-group-btn'><a id='"+ assetobj[k-1]['id'] +"' class='assetdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='assetid"+numItems+"' value='"+ assetobj[k-1]['id'] +"'/><input value='"+assetobj[k-1]['assettype']+"' class='form-control assettype'  id='assettype"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Asset Number</label><input class='form-control assetnumber'  id='assetnumber"+numItems+"' value='"+assetobj[k-1]['assetnumber']+"' /></div></div><div class='col-sm-4'><div class='form-group'><label>Asset Description</label><input class='form-control description'  id='assetdescription"+numItems+"' value='"+assetobj[k-1]['assetdescription']+"' /></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>Location</label><input type='text' value='"+assetobj[k-1]['location']+"' class='location form-control' id='assetlocation"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+assetobj[k-1]['issuedate']+"' type='text' class='assetissuedate mptldp form-control' id='assetissuedate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input value='"+assetobj[k-1]['todate']+"' type='text' class='assettodate mptldp form-control' id='assettodate"+numItems+"'/></div></div></div></div></div></div>");
			$(".officeassetfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
    		$(".idfieldset").append("<div class='idclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>National ID Card Type</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='compdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='identityid"+numItems+"' value='0'/><input type='text' class='idtype form-control' id='idtype"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-flag'></i></div><input class='form-control idcountry'  id='country"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>National ID</label><input class='form-control nationalid'  id='nationalid"+numItems+"'/></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group checkbox'><label><input type='checkbox' class='isprimary'  id='isprimary"+numItems+"'/>Is Primary</label></div></div><div class='col-sm-4'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='issuedate mptldp form-control' id='issuedate"+numItems+"'/></div></div><div class='col-sm-4'><label>Expiry Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='expirydate mptldp form-control' id='expirydate"+numItems+"'/></div></div></div></div></div>");
			$(".idfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
			$(".qualificationfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
    		$(".experiencefieldset").append("<div class='experienceclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-sm-4'><label>Designation</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='expdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='experienceid"+numItems+"' value='0'/><input type='text' class='designation form-control' id='designation"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Industry</label><input class='form-control industry'  id='industry"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Function</label><input class='form-control function'  id='function"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Employer</label><input class='form-control employer'  id='employer"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>City</label><input class='form-control city'  id='city"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Country</label><input class='form-control country'  id='expcountry"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='fromdate mptldp form-control' id='expfromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='passdate mptldp form-control' id='exptodate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>Contract</label><input class='form-control contract'  id='contract"+numItems+"'/></div></div></div></div>");
			$(".experiencefieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
			//initialise datepicker
			var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}
			
    	});
    	
    	$("#btnAddSkillCtrls").click(function (event) {
    		
    		event.preventDefault();
			var numItems = $('.skillclass').length+1;
    		$(".skillfieldset").append("<div class='skillclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>Skill</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='skilldelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='skillid"+numItems+"' value='0'/><input type='text' class='skill form-control' id='skill"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Skill Group</label><input class='form-control skillgroup'  id='skillgroup"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Proficiency</label><input class='form-control skillproficiency'  id='skillproficiency"+numItems+"'/></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>From Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='skillfromdate mptldp form-control' id='skillfromdate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='skilltodate mptldp form-control' id='skilltodate"+numItems+"'/></div></div></div></div></div></div>");
			$(".skillfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
			//initialise datepicker
			var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
			if(userdf==1){
				$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
			}else{
				$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
			}
			
    	});
    	
    	$("#btnAddAssetCtrls").click(function (event) {
    		
    		event.preventDefault();
			var numItems = $('.assetclass').length+1;
    		$(".officeassetfieldset").append("<div class='assetclass' id='contentDiv"+numItems+"'><div class='clearfix'><div class='col-md-6'><div class='col-sm-4'><label>Asset Type</label><div class='input-group'><div class='input-group-btn'><a id='newid' class='assetdelete btn btn-danger btn-flat'><i class='fa fa-trash'></i></a></div><input type='hidden' id='assetid"+numItems+"' value='0'/><input class='form-control assettype'  id='assettype"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Asset Number</label><input class='form-control assetnumber'  id='assetnumber"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Asset Description</label><input class='form-control description'  id='assetdescription"+numItems+"'/></div></div></div><div class='col-md-6'><div class='col-sm-4'><div class='form-group'><label>Location</label><input type='text' class='location form-control' id='assetlocation"+numItems+"'/></div></div><div class='col-sm-4'><div class='form-group'><label>Issue Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='assetissuedate mptldp form-control' id='assetissuedate"+numItems+"'/></div></div></div><div class='col-sm-4'><div class='form-group'><label>To Date</label><div class='input-group'><div class='input-group-addon'><i class='fa fa-calendar'></i></div><input type='text' class='assettodate mptldp form-control' id='assettodate"+numItems+"'/></div></div></div></div></div></div>");
			$(".officeassetfieldset").append("<div class='col-md-12 hrclass'><hr/></div>");
			
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
    	
    	//id delete btn onclick
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
    						selectedctrl.parent().closest('div .idclass').next('div .hrclass').remove();
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
				$(this).parent().closest('div .idclass').next('div .hrclass').remove();
				$(this).parent().closest('div .idclass').hide();
    			return true;
    		}
  		} else {
    		return false;
  		}
   
	});
		
	//experience delete btn onclick
	$('.experiencefieldset').on('click', 'a.expdelete', function() {
		var selectedctrl=$(this);
		var id = $(this).attr('id');
		var empid='<?php echo $employee['id'] ?>';
		if (confirm("Are you sure you want to delete the particular Experience ?")) {
			if(id!="newid"){
				$.ajax({
        			type: "POST",
        			url: '/Employees/deleteExperiences',
        			data: 'empid='+empid+'&experienceid='+id,
        			success : function(data) {
        				if(data=="success"){
    						selectedctrl.parent().closest('div .experienceclass').next('div .hrclass').remove();
							selectedctrl.parent().closest('div .experienceclass').remove();
    						return true;
    					}else{
    						sweet_alert("Couldn't delete the particular Experience details.Please try again later.");
							return false;
    					}
        			},error: function(data) {
        	    		sweet_alert("Couldn't delete the particular Experience details.Please try again later.");
						return false;
        			}
      
        		});
			}else{			
				$(this).parent().closest('div .experienceclass').next('div .hrclass').remove();
				$(this).parent().closest('div .experienceclass').hide();
    			return true;
    		}
  		} else {
    		return false;
  		}
   
	});
	
	//educational qualifications delete btn onclick
	$('.qualificationfieldset').on('click', 'a.qualdelete', function() {
		var selectedctrl=$(this);
		var id = $(this).attr('id');
		var empid='<?php echo $employee['id'] ?>';
		if (confirm("Are you sure you want to delete the particular Qualification ?")) {
			if(id!="newid"){
				$.ajax({
        			type: "POST",
        			url: '/Employees/deleteQualifications',
        			data: 'empid='+empid+'&qualificationid='+id,
        			success : function(data) {
        				if(data=="success"){
    						selectedctrl.parent().closest('div .qualificationclass').next('div .hrclass').remove();
							selectedctrl.parent().closest('div .qualificationclass').remove();
    						return true;
    					}else{
    						sweet_alert("Couldn't delete the particular qualification details.Please try again later.");
							return false;
    					}
        			},error: function(data) {
        	    		sweet_alert("Couldn't delete the particular qualification details.Please try again later.");
						return false;
        			}
      
        		});
			}else{			
				$(this).parent().closest('div .qualificationclass').next('div .hrclass').remove();
				$(this).parent().closest('div .qualificationclass').hide();
    			return true;
    		}
  		} else {
    		return false;
  		}
   
	});
	
		//skill delete btn onclick
	$('.skillfieldset').on('click', 'a.skilldelete', function() {
		var selectedctrl=$(this);
		var id = $(this).attr('id');
		var empid='<?php echo $employee['id'] ?>';
		if (confirm("Are you sure you want to delete the particular Skill ?")) {
			if(id!="newid"){
				$.ajax({
        			type: "POST",
        			url: '/Employees/deleteSkills',
        			data: 'empid='+empid+'&skillid='+id,
        			success : function(data) {
        				if(data=="success"){
    						selectedctrl.parent().closest('div .skillclass').next('div .hrclass').remove();
							selectedctrl.parent().closest('div .skillclass').hide();
    						return true;
    					}else{
    						sweet_alert("Couldn't delete the particular skill details.Please try again later.");
							return false;
    					}
        			},error: function(data) {
        	    		sweet_alert("Couldn't delete the particular skill details.Please try again later.");
						return false;
        			}
      
        		});
			}else{			
				$(this).parent().closest('div .skillclass').next('div .hrclass').remove();
				$(this).parent().closest('div .skillclass').remove();
    			return true;
    		}
  		} else {
    		return false;
  		}
   
	});
	
	
	//office asset delete btn onclick
	$('.officeassetfieldset').on('click', 'a.assetdelete', function() {
		var selectedctrl=$(this);
		var id = $(this).attr('id');
		var empid='<?php echo $employee['id'] ?>';
		if (confirm("Are you sure you want to delete the particular Asset ?")) {
			if(id!="newid"){
				$.ajax({
        			type: "POST",
        			url: '/Employees/deleteAssets',
        			data: 'empid='+empid+'&assetid='+id,
        			success : function(data) {
        				if(data=="success"){
    						selectedctrl.parent().closest('div .assetclass').next('div .hrclass').remove();
							selectedctrl.parent().closest('div .assetclass').remove();
    						return true;
    					}else{
    						sweet_alert("Couldn't delete the particular asset details.Please try again later.");
							return false;
    					}
        			},error: function(data) {
        	    		sweet_alert("Couldn't delete the particular asset details.Please try again later.");
						return false;
        			}
      
        		});
			}else{			
				$(this).parent().closest('div .assetclass').next('div .hrclass').remove();
				$(this).parent().closest('div .assetclass').hide();
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
    	//get input value
		var externalid = document.getElementById("empdatabiography-person-id-external").value;

    	if (externalid != "" && externalid!=null && $("#jobinfo-pay-group-id").val()!="" && $("#jobinfo-pay-group-id").val()!=null) {
    		// return true;
    	}else if(externalid=="" || externalid==null){
    		
    		$("#EmpDataBiography").addClass("active");
    		$("#EmploymentInfo").removeClass("active");$("#EmpDataPersonal").removeClass("active");$("#social").removeClass("active");$("#address").removeClass("active");$("#jobinfo").removeClass("active");
    		$("#ids").removeClass("active");$("#experience").removeClass("active");$("#skills").removeClass("active");$("#officeassets").removeClass("active");$("#qualification").removeClass("active");


    		$("#li3").addClass("active");
    		$("#li1").removeClass("active");$("#li2").removeClass("active");$("#li4").removeClass("active");$("#li5").removeClass("active");$("#li6").removeClass("active");
    		$("#li7").removeClass("active");$("#li8").removeClass("active");$("#li9").removeClass("active");$("#li10").removeClass("active");$("#lijobinfo").removeClass("active");

    		sweet_alert("Please enter the Person Id External.");
    		return false;
    	}else{
    		$("#jobinfo").addClass("active");
    		$("#EmpDataBiography").removeClass("active");
    		$("#EmploymentInfo").removeClass("active");$("#EmpDataPersonal").removeClass("active");$("#social").removeClass("active");$("#address").removeClass("active");
    		$("#ids").removeClass("active");$("#experience").removeClass("active");$("#skills").removeClass("active");$("#officeassets").removeClass("active");$("#qualification").removeClass("active");


    		$("#lijobinfo").addClass("active");
    		$("#li1").removeClass("active");$("#li2").removeClass("active");$("#li4").removeClass("active");$("#li5").removeClass("active");$("#li6").removeClass("active");
    		$("#li7").removeClass("active");$("#li8").removeClass("active");$("#li9").removeClass("active");$("#li10").removeClass("active");$("#li3").removeClass("active");

    		sweet_alert("Please select the Pay group.");
    		return false;
    	}
    		
		var empid='<?php echo $employee['id'] ?>';
		
		var idclasscount = $('.idclass').length;
    	
		var qualclasscount = $('.qualificationclass').length;
		var expclasscount = $('.experienceclass').length;
		var assetclasscount = $('.assetclass').length;
		var skillclasscount = $('.skillclass').length;
		
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
    		
    		
    	if(empid!="" && empid!=null){
    			$.ajax({
        			type: "POST",
        			url: '/Employees/addAddress',
        			data: 'empid='+empid+'&address1='+address1+'&address2='+address2+'&address3='+address3+'&address4='+address4+'&address5='+address5+'&address6='+address6
        					+'&address7='+address7+'&address8='+address8+'&county='+county+'&state='+state+'&zipcode='+zipcode+'&city='+city,
        			success : function(data) {
    					if(idclasscount<1 &&  qualclasscount<1 && expclasscount<1 &&  assetclasscount<1 && skillclasscount<1){
    						document.getElementById("empform").submit();
    					}
        			},error: function(data) {        	    	 	
    					sweet_alert("Error while adding Addresses.");
						return false;   			
        			}     
        	});
		}else{
			sweet_alert("Employee Id missing.");
			return false;
		}
			
			var errcount=0;//console.log(idclasscount);return false;
    	
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
    		
    			if($("#identityid"+i).parent().closest('div .idclass').is(":visible")){
    			if(empid!="" && empid!=null && idtype!="" && idtype!=null && nationalid!="" && nationalid!=null){
    				$.ajax({
        				type: "POST",
        				url: '/Employees/addIds',
        				indexValue: i,
        				data: 'empid='+empid+'&identityid='+identityid+'&idtype='+idtype+'&country='+country+'&nationalid='+nationalid+'&isprimary='+'0'+'&issuedate='+issuedate
        						+'&expirydate='+expirydate,
        				success : function(data) {
        	 				if(this.indexValue==idclasscount || this.indexValue>idclasscount){
        	 					if(errcount<1){
    							if(qualclasscount<1 && expclasscount<1 && assetclasscount<1 && skillclasscount<1){
    								document.getElementById("empform").submit();
    							}else{
    								idcounter++;
    								saveQualifications(empid);
    							}
    							}else{
    								return false;
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
					sweet_alert("Please enter ID Card type/national Id.");break;
					return false;
				} 
				}else{
    				idcounter++;
    				if(i==idclasscount || i>idclasscount){
    					saveQualifications(empid);
    				}
    			}   		
    		}	
    	 
    		if(idclasscount<1){
    			saveQualifications(empid);
    		}
			// document.getElementById("empform").submit();
			return false;
		}			

function saveQualifications(empid){
		
		var qualclasscount = $('.qualificationclass').length;
		
		var expclasscount = $('.experienceclass').length;
		var assetclasscount = $('.assetclass').length;
		var skillclasscount = $('.skillclass').length;
		
		var qualerrcount=0;
    	//saving multi qualification's
    	for (t = 1; t <= qualclasscount; t++) 
    	{
    		var qualificationid=$("#qualificationid"+t).val();
    		var qualification=$("#qualification"+t).val();
    		var subject=$("#subject"+t).val();
    		var secsubject=$("#secsubject"+t).val();
    		var schoolcollege=$("#schoolcollege"+t).val();
    		var city=$("#city"+t).val();
    		var fromdate=$("#fromdate"+t).val();
    		var passdate=$("#passdate"+t).val();
    		var grade=$("#grade"+t).val();
    		
    		if($("#qualification"+i).parent().closest('div .qualificationclass').is(":visible")){
    			if(empid!="" && empid!=null && qualification!="" && qualification!=null && fromdate!="" && fromdate!=null && passdate!="" && passdate!=null){
    			
    				$.ajax({
        				type: "POST",
        				indexValue: t,
        				url: '/Employees/addQualifications',
        				data: 'empid='+empid+'&qualificationid='+qualificationid+'&qualification='+qualification+'&subject='+subject+'&secsubject='+secsubject+'&schoolcollege='+schoolcollege+'&city='+city
        						+'&fromdate='+fromdate+'&passdate='+passdate +'&grade='+grade,
        				success : function(data) {
    						if(this.indexValue==qualclasscount || this.indexValue>qualclasscount){
    							if(qualerrcount<1){
    								if(expclasscount<1 && assetclasscount<1 && skillclasscount<1){
    									document.getElementById("empform").submit();
    								}else{
    									qualcounter++;
    									saveExperiences(empid);
    								}
    							}else{
    								return false;
    							}
    						}
        				},error: function(data) {
        					qualerrcount++;
    						sweet_alert("Error while adding Qualification's.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding Qualification's.");
								return false;
        					}
      					}
      
        			});	
        		
				}else{
					sweet_alert("Please enter Qualification/From/Pass Date.");break;
					return false;
				}
			   }else{
    				qualcounter++;
    				if(t==qualclasscount || t>qualclasscount){
    					saveExperiences(empid);
    				}
    			}
    		}
    		
    		if(qualclasscount<1){
    			saveExperiences(empid);
    		}
    		return false;
	}
	function saveExperiences(empid){
		var expclasscount = $('.experienceclass').length;
		
		var assetclasscount = $('.assetclass').length;
		var skillclasscount = $('.skillclass').length;
		var experrcount=0;
    	//saving multi experience's
    	for (t = 1; t <= expclasscount; t++) 
    	{
    		var experienceid=$("#experienceid"+t).val();
    		var designation=$("#designation"+t).val();
    		var industry=$("#industry"+t).val();
    		var efunction=$("#function"+t).val();
    		var employer=$("#employer"+t).val();
    		var city=$("#city"+t).val();
    		var country=$("#expcountry"+t).val();
    		var fromdate=$("#expfromdate"+t).val();
    		var todate=$("#exptodate"+t).val();
    		var contract=$("#contract"+t).val();
    		if($("#designation"+i).parent().closest('div .experienceclass').is(":visible")){
    			if(empid!="" && empid!=null && designation!="" && designation!=null && industry!="" && industry!=null && fromdate!="" && fromdate!=null && todate!="" && todate!=""){
    				$.ajax({
        				type: "POST",
        				url: '/Employees/addExperiences',
        				indexValue: t,
        				data: 'empid='+empid+'&experienceid='+experienceid+'&designation='+designation+'&industry='+industry+'&efunction='+efunction+'&employer='+employer+'&city='+city
        						+'&country='+country+'&fromdate='+fromdate+'&todate='+todate +'&contract='+contract,
        				success : function(data) {
    						if(this.indexValue==expclasscount || this.indexValue>expclasscount){
    							if(experrcount<1){
    							if(assetclasscount<1 && skillclasscount<1){
    								document.getElementById("empform").submit();
    							}else{
    								expcounter++;   
    								saveofficeAssets(empid);
    							}
    							}else{
    								return false;
    							}					
    						}
        				},error: function(data) {
        					experrcount++
    						sweet_alert("Error while adding Experience.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding Experience.");
								return false;
        					}
      					}
      
        			});	
				}else{
					sweet_alert("Please enter Designation/Industry/From/To Date.");break;
					return false;
				}
			    }else{
    				expcounter++;
    				if(t==expclasscount || t>expclasscount){
    					saveofficeAssets(empid);
    				}
    			}
    		}
    		
    		if(expclasscount<1){
    			saveofficeAssets(empid);		
    		}
    		return false;
	}
	
	
	function saveofficeAssets(empid){
		var assetclasscount = $('.assetclass').length;
		var skillclasscount = $('.skillclass').length;
		
		var asseterrcount=0;
    	//saving multi asset's
    	for (t = 1; t <= assetclasscount; t++) 
    	{
    		var assetlocation=$("#assetlocation"+t).val();
    		var assettype=$("#assettype"+t).val();
    		var assetnumber=$("#assetnumber"+t).val();
    		var assetdescription=$("#assetdescription"+t).val();
    		var assetissuedate=$("#assetissuedate"+t).val();
    		var assettodate=$("#assettodate"+t).val();
    		
    		if($("#assettype"+i).parent().closest('div .assetclass').is(":visible")){
    			if(empid!="" && empid!=null && assetnumber!="" && assetnumber!=null && assetissuedate!="" && assetissuedate!=null && assettodate!="" && assettodate!=""){
    				$.ajax({
        				type: "POST",
        				url: '/Employees/addOfficeAssets',
        				indexValue: t,
        				data: 'empid='+empid+'&assetid='+'0'+'&assetlocation='+assetlocation+'&assettype='+assettype+'&assetnumber='+assetnumber+'&assetdescription='+assetdescription
        						+'&assetissuedate='+assetissuedate+'&assettodate='+assettodate,
        				success : function(data) {
    						if(this.indexValue==assetclasscount || this.indexValue>assetclasscount){
    							if(asseterrcount<1){
    								if(skillclasscount<1){
    								document.getElementById("empform").submit();
    							}else{
    								assetcounter++;
    								saveSkills(empid);
    							}	
    							}else{
    								return false;
    							}				
    						}
        				},error: function(data) {
        					asseterrcount++;
    						sweet_alert("Error while adding Office Assets.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding Office Assets.");
								return false;
        					}
      					}
      
        			});	
				}else{
					sweet_alert("Please enter Asset Number/Issue/To Date.");break;
					return false;
				}
			   }else{
    				assetcounter++;
    				if(t==assetclasscount || t>assetclasscount){
    					saveSkills(empid);
    				}
    			}
    		}
    		
    		if(assetclasscount<1){
    			assetcounter++;    							
    			saveSkills(empid);   		
    		}
	}
	function saveSkills(empid){
		var skillclasscount = $('.skillclass').length;
		
		var skillerrcount=0;
    	//saving multi skill's
    	for (t = 1; t <= skillclasscount; t++) 
    	{
    		var skill=$("#skill"+t).val();
    		var skillgroup=$("#skillgroup"+t).val();
    		var skillproficiency=$("#skillproficiency"+t).val();
    		var skillfromdate=$("#skillfromdate"+t).val();
    		var skilltodate=$("#skilltodate"+t).val();
    		
    		if($("#skill"+i).parent().closest('div .skillclass').is(":visible")){
    			if(empid!="" && empid!=null && skill!="" && skill!=null && skillfromdate!="" && skillfromdate!=null && skilltodate!="" && skilltodate!=""){
    				$.ajax({
        				type: "POST",
        				url: '/Employees/addSkills',
        				indexValue: t,
        				data: 'empid='+empid+'&skillid='+'0'+'&skill='+skill+'&skillgroup='+skillgroup+'&skillproficiency='+skillproficiency+'&skillfromdate='+skillfromdate+'&skilltodate='+skilltodate,
        				success : function(data) {
    						if(this.indexValue==skillclasscount || this.indexValue>skillclasscount){
    							if(skillerrcount<1){
    								skillcounter++;    							
    								document.getElementById("empform").submit();
    							}else{
    								return false;
    							}   						
    						}
        				},error: function(data) {
        					skillerrcount++;
    						sweet_alert("Error while adding Skill.");
							return false;   			

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding Skill.");
								return false;
        					}
      					}
      
        			});	
				}else{
					sweet_alert("Please enter Skill/From/To Date.");break;
					return false;
				}
				}else{
    				skillcounter++;
    				if(t==skillclasscount || t>skillclasscount){
    					document.getElementById("empform").submit();    	
    				}
    			}
    		}
    		
    		if(skillclasscount<1){
    			skillcounter++;    							
    			document.getElementById("empform").submit();    		
    		}
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