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
        </ul>

        <div class=" tab-content">
          <div class="tab-pane" id="EmpDataBiography">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
            	echo $this->Form->input('empdatabiography.person_id_external',['disabled' => true]);
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
             		<?php
            echo $this->Form->input('empdatapersonal.salutation',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.initials',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name_alt1',['label' => 'First Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name_alt1',['label' => 'Middle Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name_alt1',['label' => 'Last Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name_alt2',['label' => 'First Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name_alt2',['label' => 'Middle Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name_alt2',['label' => 'Last Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name_alt1',['label' => 'Birth Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name_alt2',['label' => 'Birth Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.preferred_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name_alt1',['label' => 'Display Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name_alt2',['label' => 'Display Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name_alt1',['label' => 'Formal Name Alternative 1','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name_alt2',['label' => 'Formal Name Alternative 2','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.name_format',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.is_overridden',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.nationality',['class'=>'select2','label'=>['text'=>'Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.second_nationality',['class'=>'select2','label'=>['text'=>'Second Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.third_nationality',['class'=>'select2','label'=>['text'=>'Third Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.wps_code',['label' => 'WPS Code','disabled' => true]);
            echo $this->Form->input('empdatapersonal.uniqueid',['label' => 'Employer Unique ID','disabled' => true]);
            echo $this->Form->input('empdatapersonal.prof_legal',['label' => 'Profession for Legal Reporting','disabled' => true]);
            echo $this->Form->input('empdatapersonal.exclude_legal',['label' => 'Exclude from Legal Reporting','disabled' => true]);
			echo $this->Form->input('empdatapersonal.nationality_date',['label' => 'Nationality Acquisition Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.home_airport',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.religion',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.number_children',['label' => 'Number of Children','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disability_date', ['label' => 'Disability Date Learned','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_group',['label' => 'Disability Challenge Group','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_degree',['label' => 'Degree of Challenge','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_type',['label' => 'Type of Challenge','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_authority',['label' => 'Issuing Authority','disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_ref',['label' => 'Reference Number','disabled' => true]);
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
        ?></fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->

			<div class="tab-pane" id="jobinfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
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
             	<?php
            		echo $this->Form->input('address.address_no',['label' => 'Adress Number','disabled' => true]);
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
     		 </fieldset>
          </div>
          <!-- Tab Pane-->
          <div class="tab-pane" id="ids">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
             			echo $this->Form->input('identity.country',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            			echo $this->Form->input('identity.card_type',['label' => 'National ID Card Type','disabled' => true]);
            			echo $this->Form->input('identity.nationalid',['label' => 'National ID','disabled' => true]);
            			echo $this->Form->input('identity.is_primary',['disabled' => true]);
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
  	<!-- /.box-body -->
          <div class="box-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>

</section>
