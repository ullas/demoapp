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
            	echo $this->Form->input('emp_data_biography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('emp_data_biography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('emp_data_biography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>'],'disabled' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
				echo $this->Form->input('emp_data_biography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('emp_data_biography.person_id_external',['disabled' => true]);
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
            echo $this->Form->input('emp_data_personal.salutation',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.first_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.last_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.initials',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.middle_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.first_name_alt1',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.middle_name_alt1',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.last_name_alt1',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.first_name_alt2',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.middle_name_alt2',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.last_name_alt2',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.display_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.formal_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.birth_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.birth_name_alt1',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.birth_name_alt2',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.preferred_name',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.display_name_alt1',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.display_name_alt2',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.formal_name_alt1',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.formal_name_alt2',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.name_format',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.is_overridden',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.nationality',['class'=>'select2','label'=>['text'=>'Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('emp_data_personal.second_nationality',['class'=>'select2','label'=>['text'=>'Second Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('emp_data_personal.third_nationality',['class'=>'select2','label'=>['text'=>'Third Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('emp_data_personal.wps_code',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.uniqueid',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.prof_legal',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.exclude_legal',['disabled' => true]);
			echo $this->Form->input('emp_data_personal.nationality_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('emp_data_personal.home_airport',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.religion',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.number_children',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.disability_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('emp_data_personal.disable_group',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.disable_degree',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.disable_type',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.disable_authority',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.disable_ref',['disabled' => true]);
            echo $this->Form->input('emp_data_personal.person_id_external',['disabled' => true]);
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="EmploymentInfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
            echo $this->Form->input('employment_info.start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.first_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.original_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.company',['disabled' => true]);
            echo $this->Form->input('employment_info.is_primary',['disabled' => true]);
			echo $this->Form->input('employment_info.seniority_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.benefits_eligibility_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.prev_employeeid',['disabled' => true]);
            echo $this->Form->input('employment_info.eligible_for_stock',['disabled' => true]);
			echo $this->Form->input('employment_info.service_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.initial_stock_grant',['disabled' => true]);
            echo $this->Form->input('employment_info.initial_option_grant',['disabled' => true]);
            echo $this->Form->input('employment_info.job_credit',['disabled' => true]);
            echo $this->Form->input('employment_info.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.is_contingent_worker',['disabled' => true]);
            echo $this->Form->input('employment_info.end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.ok_to_rehire',['disabled' => true]);
			echo $this->Form->input('employment_info.pay_roll_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('employment_info.last_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.regret_termination',['disabled' => true]);
			echo $this->Form->input('employment_info.eligible_for_sal_continuation',['disabled' => true]);
            echo $this->Form->input('employment_info.bonus_pay_expiration_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.stock_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.salary_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employment_info.benefits_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
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
  	<!-- /.box-body -->
          <div class="box-footer">
            <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
            <?=$this->Html->link(__('Edit Employee'), ['action' => 'edit', $employee['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
          </div>
        <?= $this->Form->end() ?>
      </div>
  
</section>

