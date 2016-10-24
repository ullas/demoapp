<?= $this->element('templateelmnt'); ?>
<!-- <div class="employees form large-9 medium-8 columns content">
    <?= $this->Form->create($employee) ?>
    <fieldset>
        <legend><?= __('Add Employee') ?></legend>
        <?php
            echo $this->Form->input('emp_data_biography_id', ['options' => $empDataBiographies, 'empty' => true]);
            echo $this->Form->input('emp_data_personal_id', ['options' => $empDataPersonals, 'empty' => true]);
            echo $this->Form->input('employment_info_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div> -->
<section class="content-header">
      <h1>
        Employee
                <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
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
            echo "<div class='form-group'><label class='col-sm-3 control-label'>Date of birth</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='date_of_birth'></div></div></div>";
            echo $this->Form->input('country_of_birth');
            echo $this->Form->input('region_of_birth');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('birth_name');
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Date of death</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='date_of_death'></div></div></div>";
            echo $this->Form->input('person_id_external');
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
            echo "<div class='form-group'><label class='col-sm-3 control-label'>Nationality Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='nationality_date'></div></div></div>";
            echo $this->Form->input('home_airport');
            echo $this->Form->input('religion');
            echo $this->Form->input('number_children');
            echo "<div class='form-group'><label class='col-sm-3 control-label'>Disability Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='disability_date'></div></div></div>";
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
            echo "<div class='form-group'><label class='col-sm-3 control-label'>Start Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='start_date'></div></div></div>";
			echo "<div class='form-group'><label class='col-sm-3 control-label'>First Date Worked:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='first_date_worked'></div></div></div>";
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Original Start Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='original_start_date'></div></div></div>";
            echo $this->Form->input('company');
            echo $this->Form->input('is_primary');
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Seniority Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='seniority_date'></div></div></div>";
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Benefits Eligibility Start Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='benefits_eligibility_start_date'></div></div></div>";
            echo $this->Form->input('prev_employeeid');
            echo $this->Form->input('eligible_for_stock');
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Service Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='service_date'></div></div></div>";
            echo $this->Form->input('initial_stock_grant');
            echo $this->Form->input('initial_option_grant');
            echo $this->Form->input('job_credit');
            echo $this->Form->input('notes');
            echo $this->Form->input('is_contingent_worker');
            echo "<div class='form-group'><label class='col-sm-3 control-label'>End Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='end_date'></div></div></div>";
            echo $this->Form->input('ok_to_rehire');
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Pay Roll End Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='pay_roll_end_date'></div></div></div>";
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Last Date Worked:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='last_date_worked'></div></div></div>";
            echo $this->Form->input('regret_termination');
            echo $this->Form->input('eligible_for_sal_continuation');
            echo "<div class='form-group'><label class='col-sm-3 control-label'>Bonus Pay Expiration Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='bonus_pay_expiration_date'></div></div></div>";
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Stock End Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='stock_end_date'></div></div></div>";
			echo "<div class='form-group'><label class='col-sm-3 control-label'>Salary End Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='salary_end_date'></div></div></div>";
            echo "<div class='form-group'><label class='col-sm-3 control-label'>Benefits End Date:</label><div class='col-sm-6'><div class='input-group'>";
            echo "<div class='input-group-addon''><i class='fa fa-calendar'></i></div><input type='text' class='form-control dp' id='benefits_end_date'></div></div></div>";
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
</div></div></section>

<div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                  <button type="submit" class="btn btn-success">Save</button>
                </div>
   </div>
   </div>