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
	<div class="box box-primary" style="border-color:transparent;"><div class="box-body">
		<div class="row">
    
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
        	<li class="active"><a href="#EmpDataPersonal" data-toggle="tab">Personal Information</a></li>
            <li><a href="#EmploymentInfo" data-toggle="tab">Employment Information</a></li>
            <li><a href="#EmpDataBiography" data-toggle="tab">Profile</a></li>	  
           	<li><a href="#social" data-toggle="tab">Social</a></li>
           	<li><a href="#address" data-toggle="tab">Address</a></li>
           	<li><a href="#ids" data-toggle="tab">ID's</a></li>
             
        </ul>
        
        <div class=" tab-content">
          <div class="tab-pane" id="EmpDataBiography">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
            	echo $this->Form->input('empdatabiography.person_id_external');
				echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
				echo $this->Form->input('empdatabiography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('empdatabiography.country_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true]);
            	echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>']]);
            	echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
            	echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('empdatabiography.position_id',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-briefcase"></i></div>'],'class'=>'select2','label'=>['text'=>'Position'], 'empty' => true]);
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="active tab-pane" id="EmpDataPersonal">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            echo $this->Form->input('empdatapersonal.salutation',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.first_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.last_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.initials',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.middle_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.first_name_alt1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.middle_name_alt1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.last_name_alt1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.first_name_alt2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.middle_name_alt2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.last_name_alt2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.display_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.formal_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.birth_name_alt1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.birth_name_alt2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.preferred_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.display_name_alt1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.display_name_alt2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.formal_name_alt1',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.formal_name_alt2',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatapersonal.name_format');
            echo $this->Form->input('empdatapersonal.is_overridden');
            echo $this->Form->input('empdatapersonal.nationality',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.second_nationality',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.third_nationality',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.wps_code');
            echo $this->Form->input('empdatapersonal.uniqueid');
            echo $this->Form->input('empdatapersonal.prof_legal');
            echo $this->Form->input('empdatapersonal.exclude_legal');
            echo $this->Form->input('empdatapersonal.nationality_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.home_airport',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-plane"></i></div>']]);
            echo $this->Form->input('empdatapersonal.religion');
            echo $this->Form->input('empdatapersonal.number_children');
            echo $this->Form->input('empdatapersonal.disability_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.disable_group');
            echo $this->Form->input('empdatapersonal.disable_degree');
            echo $this->Form->input('empdatapersonal.disable_type');
            echo $this->Form->input('empdatapersonal.disable_authority');
            echo $this->Form->input('empdatapersonal.disable_ref');
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="EmploymentInfo">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
            echo $this->Form->input('employmentinfo.start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.first_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.original_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.company');
            echo $this->Form->input('employmentinfo.is_primary');
			echo $this->Form->input('employmentinfo.seniority_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.benefits_eligibility_start_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.prev_employeeid');
            echo $this->Form->input('employmentinfo.eligible_for_stock');
			echo $this->Form->input('employmentinfo.service_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.initial_stock_grant');
            echo $this->Form->input('employmentinfo.initial_option_grant');
            echo $this->Form->input('employmentinfo.job_credit');
            echo $this->Form->input('employmentinfo.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>']]);
            echo $this->Form->input('employmentinfo.is_contingent_worker');
            echo $this->Form->input('employmentinfo.end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.ok_to_rehire');
			echo $this->Form->input('employmentinfo.pay_roll_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			echo $this->Form->input('employmentinfo.last_date_worked', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.regret_termination');
			echo $this->Form->input('employmentinfo.eligible_for_sal_continuation');
            echo $this->Form->input('employmentinfo.bonus_pay_expiration_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.stock_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.salary_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('employmentinfo.benefits_end_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
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
            		echo $this->Form->input('contact_info.linkedin',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-linkedin"></i></div>']]);
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
    <button id="butn" class="pull-right btn btn-primary" type="submit">Save</button>  
</div>
    
    </div>

<!-- <div class="row">
   <div class="form-group">
                <div class="col-sm-offset-6 col-sm-12">
                  <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
   </div>
   </div> -->
  <?= $this->Form->end() ?></section>
  
   <?php $this->start('scriptBotton'); ?>
 <script>
$(function () {
	 // $( "#butn" ).click(function( ) {
 		 // $("#EmpDataBiography").addClass("active");$("#EmploymentInfo").removeClass("active");
//  
	 // });
 });
</script>
 <?php $this->end(); ?>
