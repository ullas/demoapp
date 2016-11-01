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
        <ul class="nav nav-tabs">
          	<li  class="active"><a href="#EmpDataBiography" data-toggle="tab">Employee Data Biography</a></li>	
            <li><a href="#EmpDataPersonal" data-toggle="tab">Employee Data Personals</a></li>
           <li><a href="#EmploymentInfo" data-toggle="tab">Employment Infos</a></li>  
        </ul>
        
        <div class=" tab-content">
          <div class="active tab-pane" id="EmpDataBiography">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
                echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('emp_data_biography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
            	echo $this->Form->input('emp_data_biography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
				echo $this->Form->input('emp_data_biography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.person_id_external');
				echo "</div>";
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="EmpDataPersonal">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            echo $this->Form->input('emp_data_personal.salutation');
            echo $this->Form->input('emp_data_personal.first_name');
            echo $this->Form->input('emp_data_personal.last_name');
            echo $this->Form->input('emp_data_personal.initials');
            echo $this->Form->input('emp_data_personal.middle_name');
            echo $this->Form->input('emp_data_personal.first_name_alt1');
            echo $this->Form->input('emp_data_personal.middle_name_alt1');
            echo $this->Form->input('emp_data_personal.last_name_alt1');
            echo $this->Form->input('emp_data_personal.first_name_alt2');
            echo $this->Form->input('emp_data_personal.middle_name_alt2');
            echo $this->Form->input('emp_data_personal.last_name_alt2');
            echo $this->Form->input('emp_data_personal.display_name');
            echo $this->Form->input('emp_data_personal.formal_name');
            echo $this->Form->input('emp_data_personal.birth_name');
            echo $this->Form->input('emp_data_personal.birth_name_alt1');
            echo $this->Form->input('emp_data_personal.birth_name_alt2');
            echo $this->Form->input('emp_data_personal.preferred_name');
            echo $this->Form->input('emp_data_personal.display_name_alt1');
            echo $this->Form->input('emp_data_personal.display_name_alt2');
            echo $this->Form->input('emp_data_personal.formal_name_alt1');
            echo $this->Form->input('emp_data_personal.formal_name_alt2');
            echo $this->Form->input('emp_data_personal.name_format');
            echo $this->Form->input('emp_data_personal.is_overridden');
            echo $this->Form->input('emp_data_personal.nationality',['class'=>'select2','label'=>['text'=>'Nationality'],'options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('emp_data_personal.second_nationality',['class'=>'select2','label'=>['text'=>'Second Nationality'],'options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('emp_data_personal.third_nationality',['class'=>'select2','label'=>['text'=>'Third Nationality'],'options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('emp_data_personal.wps_code');
            echo $this->Form->input('emp_data_personal.uniqueid');
            echo $this->Form->input('emp_data_personal.prof_legal');
            echo $this->Form->input('emp_data_personal.exclude_legal');
			echo $this->Form->input('emp_data_personal.nationality_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('emp_data_personal.home_airport');
            echo $this->Form->input('emp_data_personal.religion');
            echo $this->Form->input('emp_data_personal.number_children');
            echo $this->Form->input('emp_data_personal.disability_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('emp_data_personal.disable_group');
            echo $this->Form->input('emp_data_personal.disable_degree');
            echo $this->Form->input('emp_data_personal.disable_type');
            echo $this->Form->input('emp_data_personal.disable_authority');
            echo $this->Form->input('emp_data_personal.disable_ref');
            echo $this->Form->input('emp_data_personal.person_id_external');
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="EmploymentInfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
            echo $this->Form->input('employment_info.start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.first_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.original_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.company');
            echo $this->Form->input('employment_info.is_primary');
			echo $this->Form->input('employment_info.seniority_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.benefits_eligibility_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.prev_employeeid');
            echo $this->Form->input('employment_info.eligible_for_stock');
			echo $this->Form->input('employment_info.service_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.initial_stock_grant');
            echo $this->Form->input('employment_info.initial_option_grant');
            echo $this->Form->input('employment_info.job_credit');
            echo $this->Form->input('employment_info.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>']]);
            echo $this->Form->input('employment_info.is_contingent_worker');
            echo $this->Form->input('employment_info.end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.ok_to_rehire');
			echo $this->Form->input('employment_info.pay_roll_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('employment_info.last_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.regret_termination');
			echo $this->Form->input('employment_info.eligible_for_sal_continuation');
            echo $this->Form->input('employment_info.bonus_pay_expiration_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.stock_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.salary_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employment_info.benefits_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
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
    <?= $this->Form->button(__('Update Employee'),['title'=>'Update Employee','class'=>'pull-right']) ?>
</div>
    
    </div>


  <?= $this->Form->end() ?></section>

