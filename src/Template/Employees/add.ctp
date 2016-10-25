<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Employee
                <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content"><?= $this->Form->create($employee) ?>
	<div class="box box-default"><div class="box-body">
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
             <div class="form-horizontal">
             	
                <?php
            echo $this->Form->input('emp_data_biography.date_of_birth', ['empty' => true]);
            echo $this->Form->input('emp_data_biography.country_of_birth',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('emp_data_biography.region_of_birth');
            echo $this->Form->input('emp_data_biography.place_of_birth');
            echo $this->Form->input('emp_data_biography.birth_name');
			echo $this->Form->input('emp_data_biography.date_of_death', ['empty' => true]);
            echo $this->Form->input('emp_data_biography.person_id_external');
        ?>
             	 
            </div>
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="EmpDataPersonal">
             <div class="form-horizontal">
             	
             		<?php
            echo $this->Form->input('salutation');
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('initials');
            echo $this->Form->input('middle_name');
            echo $this->Form->input('first_name_alt1');
            echo $this->Form->input('middle_name_alt1');
            echo $this->Form->input('last_name_alt1');
            echo $this->Form->input('first_name_alt2');
            echo $this->Form->input('middle_name_alt2');
            echo $this->Form->input('last_name_alt2');
            echo $this->Form->input('display_name');
            echo $this->Form->input('formal_name');
            echo $this->Form->input('birth_name');
            echo $this->Form->input('birth_name_alt1');
            echo $this->Form->input('birth_name_alt2');
            echo $this->Form->input('preferred_name');
            echo $this->Form->input('display_name_alt1');
            echo $this->Form->input('display_name_alt2');
            echo $this->Form->input('formal_name_alt1');
            echo $this->Form->input('formal_name_alt2');
            echo $this->Form->input('name_format');
            echo $this->Form->input('is_overridden');
            echo $this->Form->input('nationality',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('second_nationality',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('third_nationality',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('wps_code');
            echo $this->Form->input('uniqueid');
            echo $this->Form->input('prof_legal');
            echo $this->Form->input('exclude_legal');
			echo $this->Form->input('nationality_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('home_airport');
            echo $this->Form->input('religion');
            echo $this->Form->input('number_children');
            echo $this->Form->input('disability_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('disable_group');
            echo $this->Form->input('disable_degree');
            echo $this->Form->input('disable_type');
            echo $this->Form->input('disable_authority');
            echo $this->Form->input('disable_ref');
            echo $this->Form->input('person_id_external');
        ?>
            </div>
     
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="EmploymentInfo">
             <div class="form-horizontal">
              <?php
            echo $this->Form->input('start_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('first_date_worked', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('original_start_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('company');
            echo $this->Form->input('is_primary');
			echo $this->Form->input('seniority_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('benefits_eligibility_start_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('prev_employeeid');
            echo $this->Form->input('eligible_for_stock');
			echo $this->Form->input('service_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('initial_stock_grant');
            echo $this->Form->input('initial_option_grant');
            echo $this->Form->input('job_credit');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_contingent_worker');
            echo $this->Form->input('end_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('ok_to_rehire');
			echo $this->Form->input('pay_roll_end_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('last_date_worked', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('regret_termination');
            echo $this->Form->input('eligible_for_sal_continuation');
            echo $this->Form->input('bonus_pay_expiration_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('stock_end_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('salary_end_date', ['class' => 'mptldp','empty' => true]);
            echo $this->Form->input('benefits_end_date', ['class' => 'mptldp','empty' => true]);
        ?>
            </div>
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
</div></div>

<div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>
  <?= $this->Form->end() ?></section>
