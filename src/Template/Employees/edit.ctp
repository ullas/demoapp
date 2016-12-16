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
          	<li  class="active"><a href="#EmpDataBiography" data-toggle="tab">Biography</a></li>	
            <li><a href="#EmpDataPersonal" data-toggle="tab">Personal Data</a></li>
           <li><a href="#EmploymentInfo" data-toggle="tab">Infos</a></li>  
        </ul>
        
        
        	
        	
          <div class=" tab-content">    
          <div class="active tab-pane" id="EmpDataBiography">
             <!-- <div class="form-horizontal"> -->
             	<fieldset>
                <?php
                echo $this->Form->input('empdatabiography.date_of_birth', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('empdatabiography.country_of_birth',['class'=>'select2','label'=>['text'=>'Country of birth'],'options' => $this->Country->get_countries(), 'empty' => true]);
				echo $this->Form->input('empdatabiography.region_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
            	echo $this->Form->input('empdatabiography.place_of_birth',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-location-arrow"></i></div>']]);
				echo $this->Form->input('empdatabiography.birth_name',['templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-user"></i></div>']]);
				echo $this->Form->input('empdatabiography.date_of_death', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            	echo $this->Form->input('empdatabiography.person_id_external',['disabled'=>true]);
				echo $this->Form->input('empdatabiography.position_id',['class'=>'select2','label'=>['text'=>'Position'], 'empty' => true]);
        		?>
             	 </fieldset>
            <!-- </div> -->
 
          </div>
          <!-- /.tab-pane -->
          
          
          <div class="tab-pane" id="EmpDataPersonal">
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
            echo $this->Form->input('empdatapersonal.nationality',['class'=>'select2','label'=>['text'=>'Nationality'],'options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.second_nationality',['class'=>'select2','label'=>['text'=>'Second Nationality'],'options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.third_nationality',['class'=>'select2','label'=>['text'=>'Third Nationality'],'options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('empdatapersonal.wps_code');
            echo $this->Form->input('empdatapersonal.uniqueid');
            echo $this->Form->input('empdatapersonal.prof_legal');
            echo $this->Form->input('empdatapersonal.exclude_legal');
			echo $this->Form->input('empdatapersonal.nationality_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('empdatapersonal.home_airport');
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
$(document).ready(function(){
	
	$("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				alert(msg);
			}else{
				
				//datepicker
	    		$('.mptldp').datepicker({
	    			format:"dd/mm/yy",
	      			autoclose: true,clearBtn: true
	    		});
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
				  	
});
</script>
<?php $this->end(); ?>