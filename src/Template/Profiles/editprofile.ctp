<?= $this->element('templateelmnt'); ?>
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
</style>
<section class="content-header">
      <h1>
        User Profile
                <small>Edit</small>
      </h1>
     <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content"><?= $this->Form->create($employee) ?>
	 <div class="row">
    <div class="col-md-3">


      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          
          		<?php $picturename='/img/uploadedpics/'.$employee->profilepicture;
          			echo $this->Html->image($picturename, array('class' => 'profile-user-img img-responsive img-circle', 'id'=>'profilepic', 'alt' => 'User profile picture')); ?>
            	<!-- <?php echo $this->Html->image('sree.png', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture','title'=>'text')); ?> -->
				<a href="#" class="open-Popup pull-right" data-toggle="modal" data-remote="false" data-target="#editpicpopover" style="margin-top:-50px;"><i class="fa fa-pencil"></i> Change Picture</a>
  
             <h3 class="profile-username text-center" ><?php echo $name ?></h3>
          
			 <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Notes</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Dependents</b> <a class="pull-right">0</a>
                </li>
             </ul>

          <button type="submit" class="btn btn-primary btn-block"> Save Changes</button>
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
            echo $this->Form->input('employmentinfo.notes',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-file-text-o"></i></div>']]);
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
            echo $this->Form->input('empdatabiography.country_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-flag"></i></div>'],'class'=>'select2','options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>']]);
            echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
            echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
            echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatabiography.person_id_external', ['disabled' => true]);
        ?>
        </fieldset>
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
        		alert("You can not upload any more files.");this.removeFile(file);
    		});
    	},
       
    });
  });
</script>
<?php $this->end(); ?>
<div class="modal fade" id="editpicpopover" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          	  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Profile Picture</h4>
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

