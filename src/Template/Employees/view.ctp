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
            	echo $this->Form->input('empdatabiography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('empdatabiography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>'],'disabled' => true]);
            	echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>'],'disabled' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>'],'disabled' => true]);
				echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
				echo "</div>";
            	echo "<div class='row'>";
            	echo $this->Form->input('empdatabiography.person_id_external',['disabled' => true]);
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
            echo $this->Form->input('empdatapersonal.salutation',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.initials',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name_alt1',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name_alt1',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name_alt1',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.first_name_alt2',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.middle_name_alt2',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.last_name_alt2',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name_alt1',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.birth_name_alt2',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.preferred_name',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name_alt1',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.display_name_alt2',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name_alt1',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.formal_name_alt2',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.name_format',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.is_overridden',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.nationality',['class'=>'select2','label'=>['text'=>'Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.second_nationality',['class'=>'select2','label'=>['text'=>'Second Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.third_nationality',['class'=>'select2','label'=>['text'=>'Third Nationality'],'options' => $this->Country->get_countries(), 'empty' => true,'disabled' => true]);
            echo $this->Form->input('empdatapersonal.wps_code',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.uniqueid',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.prof_legal',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.exclude_legal',['disabled' => true]);
			echo $this->Form->input('empdatapersonal.nationality_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.home_airport',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.religion',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.number_children',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.disability_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_group',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_degree',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_type',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_authority',['disabled' => true]);
            echo $this->Form->input('empdatapersonal.disable_ref',['disabled' => true]);
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="EmploymentInfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
            echo $this->Form->input('employmentinfo.start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.first_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.original_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.company',['disabled' => true]);
            echo $this->Form->input('employmentinfo.is_primary',['disabled' => true]);
			echo $this->Form->input('employmentinfo.seniority_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.benefits_eligibility_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.prev_employeeid',['disabled' => true]);
            echo $this->Form->input('employmentinfo.eligible_for_stock',['disabled' => true]);
			echo $this->Form->input('employmentinfo.service_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.initial_stock_grant',['disabled' => true]);
            echo $this->Form->input('employmentinfo.initial_option_grant',['disabled' => true]);
            echo $this->Form->input('employmentinfo.job_credit',['disabled' => true]);
            echo $this->Form->input('employmentinfo.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.is_contingent_worker',['disabled' => true]);
            echo $this->Form->input('employmentinfo.end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.ok_to_rehire',['disabled' => true]);
			echo $this->Form->input('employmentinfo.pay_roll_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
			echo $this->Form->input('employmentinfo.last_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.regret_termination',['disabled' => true]);
			echo $this->Form->input('employmentinfo.eligible_for_sal_continuation',['disabled' => true]);
            echo $this->Form->input('employmentinfo.bonus_pay_expiration_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.stock_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.salary_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
            echo $this->Form->input('employmentinfo.benefits_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled' => true]);
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

