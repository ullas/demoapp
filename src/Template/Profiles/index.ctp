<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        User Profile
                <small>View</small>
      </h1>
     
    </section>
<section class="content">
	<?= $this->Form->create($profiles) ?>
	 <div class="row">
    <div class="col-md-3">


      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('/webroot/uploadedpics/back1.jpg', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture')); ?>
          
          <h3 class="profile-username text-center"><?php echo $name ?></h3>
          
			 <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Notes</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Dependents</b> <a class="pull-right">0</a>
                </li>
             </ul>

          <a href="/Profiles/editprofile"><button type="button" class="btn btn-primary btn-block"> Edit Profile</button></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


      <!-- Notes Box -->
      <div class="box box-primary" style="border-color:transparent;">
        <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
     
			  <strong><i class="fa fa-briefcase margin-r-5"></i> Position</strong>

              <p class="text-muted">
                Manager
              </p>
              <hr>
              <strong><i class="fa fa-bank margin-r-5"></i> Legal Entity</strong>

              <p class="text-muted">
                Maptell 
              </p>

              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

            </div>
            <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
      
    </div>
    
    <div class="col-md-9">
	<div class="box box-primary" style="border-color:transparent;"><div class="box-body">
    
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
           <li  class="active"><a href="#personal" data-toggle="tab">Personal Information</a></li>	
           <li><a href="#empinfo" data-toggle="tab">Employment Information</a></li>
           <li><a href="#profile" data-toggle="tab">Profile</a></li>  
           <li><a href="#social" data-toggle="tab">Social</a></li>
           <li><a href="#others" data-toggle="tab">Others</a></li>
        </ul>
        
        <div class=" tab-content">
          <div class="active tab-pane" id="personal">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
            echo $this->Form->input('empdatapersonal.salutation');
            echo $this->Form->input('empdatapersonal.first_name');
            echo $this->Form->input('empdatapersonal.last_name');
            echo $this->Form->input('empdatapersonal.initials');
            echo $this->Form->input('empdatapersonal.middle_name');
            echo $this->Form->input('empdatapersonal.first_name_alt1');
            echo $this->Form->input('empdatapersonal.middle_name_alt1');
            echo $this->Form->input('empdatapersonal.last_name_alt1');
            echo $this->Form->input('empdatapersonal.first_name_alt2');
            echo $this->Form->input('empdatapersonal.middle_name_alt2');
            echo $this->Form->input('empdatapersonal.last_name_alt2');
            echo $this->Form->input('empdatapersonal.display_name');
            echo $this->Form->input('empdatapersonal.formal_name');
            echo $this->Form->input('empdatapersonal.birth_name');
            echo $this->Form->input('empdatapersonal.birth_name_alt1');
            echo $this->Form->input('empdatapersonal.birth_name_alt2');
            echo $this->Form->input('empdatapersonal.preferred_name');
            echo $this->Form->input('empdatapersonal.display_name_alt1');
            echo $this->Form->input('empdatapersonal.display_name_alt2');
            echo $this->Form->input('empdatapersonal.formal_name_alt1');
            echo $this->Form->input('empdatapersonal.formal_name_alt2');
            echo $this->Form->input('empdatapersonal.name_format');
            echo $this->Form->input('empdatapersonal.is_overridden');
            echo $this->Form->input('empdatapersonal.nationality');
            echo $this->Form->input('empdatapersonal.second_nationality');
            echo $this->Form->input('empdatapersonal.third_nationality');
            echo $this->Form->input('empdatapersonal.wps_code');
            echo $this->Form->input('empdatapersonal.uniqueid');
            echo $this->Form->input('empdatapersonal.prof_legal');
            echo $this->Form->input('empdatapersonal.exclude_legal');
            echo $this->Form->input('empdatapersonal.nationality_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.home_airport');
            echo $this->Form->input('empdatapersonal.religion');
            echo $this->Form->input('empdatapersonal.number_children');
            echo $this->Form->input('empdatapersonal.disability_date', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.disable_group');
            echo $this->Form->input('empdatapersonal.disable_degree');
            echo $this->Form->input('empdatapersonal.disable_type');
            echo $this->Form->input('empdatapersonal.disable_authority');
            echo $this->Form->input('empdatapersonal.disable_ref');
            echo $this->Form->input('empdatapersonal.person_id_external');
        ?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="empinfo">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
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
            echo $this->Form->input('employmentinfo.notes');
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
        ?>
            <!-- </div> -->
     </fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="profile">
             <!-- <div class="form-horizontal"> --><fieldset>
              <?php
            echo $this->Form->input('empdatabiography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatabiography.country_of_birth');
            echo $this->Form->input('empdatabiography.region_of_birth');
            echo $this->Form->input('empdatabiography.place_of_birth');
            echo $this->Form->input('empdatabiography.birth_name');
            echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatabiography.person_id_external');
        ?>
        </fieldset>
            <!-- </div> -->
           </div>
          <!-- Tab Pane-->
         
          
          <div class="tab-pane" id="social">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
             		<?php
            		echo $this->Form->input('contact_info.phone');
            		echo $this->Form->input('contact_info.mobile');
            		echo $this->Form->input('contact_info.email_address1');
            		echo $this->Form->input('contact_info.email_address2');
            		echo $this->Form->input('contact_info.facebook');
            		echo $this->Form->input('contact_info.linkedin');
        			?>
            <!-- </div> -->
     		</fieldset>
          </div>
          <!-- Tab Pane-->
          
          <div class="tab-pane" id="others">
             <!-- <div class="form-horizontal"> -->
             <fieldset>
             		
            <!-- </div> -->
     		</fieldset>
          </div>
          <!-- Tab Pane-->
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    
  </div>
  
   <!-- /.row -->
</div>

<!-- <div class="box-footer">
    <a href="/employees">Cancel</a>    
    <button class="pull-right btn btn-primary" type="submit">Save</button>  
</div> -->
    
    </div></div>

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
    $("input").prop('disabled', true);
    $("select").prop('disabled', true);
  });
</script>
<?php $this->end(); ?>

