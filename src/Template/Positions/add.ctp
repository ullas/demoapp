<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Position
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
		<?= $this->Form->create($position) ?>
    <fieldset>
        <?php
            echo $this->Form->input('position_code');
            echo $this->Form->input('name',['label' => 'Title']);
            echo $this->Form->input('effective_status',['label' => 'Status']);
            echo $this->Form->input('effective_start_date',['label' => 'Start Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('effective_end_date',['label' => 'End Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('positiontype',['label' => 'Type']);
            echo $this->Form->input('position_criticality',['label' => 'Criticality']);
            echo $this->Form->input('position_controlled');
            echo $this->Form->input('multiple_incumbents_allowed');
            echo $this->Form->input('comment');
            echo $this->Form->input('incumbent');
            echo $this->Form->input('change_reason');
            echo $this->Form->input('description');
            echo $this->Form->input('job_title');
            echo $this->Form->input('job_code');
            echo $this->Form->input('job_level');
            echo $this->Form->input('employee_class');
            echo $this->Form->input('regular_temporary');
            echo $this->Form->input('target_fte',['label' => 'FTE']);
            echo $this->Form->input('vacant');
            echo $this->Form->input('standard_hours');
            // echo $this->Form->input('created_by');
            // echo $this->Form->input('created_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            // echo $this->Form->input('last_modified_by');
            // echo $this->Form->input('last_modified_date',['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('position_matrix_relationship');
            echo $this->Form->input('right_to_return');
            echo $this->Form->input('customer_id', ['options' => $customers, 'empty' => true]);
            echo $this->Form->input('legal_entity_id', ['options' => $legalEntities, 'empty' => true]);
            echo $this->Form->input('division_id', ['label' => 'Division','options' => $divisions, 'empty' => true]);
            echo $this->Form->input('department_id', ['label' => 'Department','options' => $departments, 'empty' => true]);
            echo $this->Form->input('location_id', ['label' => 'Location','options' => $locations, 'empty' => true]);
            echo $this->Form->input('cost_center_id', ['label' => 'Cost Center','options' => $costCentres, 'empty' => true]);
            echo $this->Form->input('pay_grade_id', ['label' => 'Pay Grade','options' => $payGrades, 'empty' => true]);
            echo $this->Form->input('pay_range_id', ['label' => 'Pay Range','options' => $payRanges, 'empty' => true]);
            echo $this->Form->input('parent_id', ['label' => 'Parent Position','options' => $parents, 'empty' => true]);
            // echo $this->Form->input('lft');
            // echo $this->Form->input('rght');
        ?>

    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save Position'),['title'=>'Save Position','class'=>'pull-right']) ?>
    </div>
    <?= $this->Form->end() ?>
</div></div>
</section>

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

    $("#actionspopover").on("show.bs.modal", function(e) {
		    var link = $(e.relatedTarget);
		    //alert(link.attr("href"));
		    $(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){

		    	  if ( status == "error" ) {
					    var msg = "Sorry but there was an error: ";
					    alert(msg);
				  }else{

				  	     table= $('#mptlindextblmaster').DataTable({
         					 "paging": true,
          					 "lengthChange": true,
          					 "ajax":  link.attr("href")+"/ajaxData",
          					 "processing": true,
         					 "serverSide": true,
         					 "drawCallback":function(settings){
         					 	tableLoaded(link);
         					 },
         					 "searching": true,
          					 "ordering": true,
         					 'columnDefs': [{
						        'targets': 0,
						        'className': 'dt-body-center',
						        'render': function (data, type, full, meta){
						            return '<input type="checkbox" class="mptl-lst-chkbox-master" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
						        }
						     }]
				  		});
				  		$(".mptlmaster-edit").click(function(){
  							alert($(this).attr("data-id"));
  						});


				  		$('<a href='+ link.attr("href") +'"/add/" id="masterdataadd" class="btn btn-sm btn-success" style="margin-left:5px;" title="Add New"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('#mptlindextblmaster_filter');


				  		$("div.dataTables_filter").delegate("#masterdataadd","click", function(e){
				  			 e.preventDefault();
						     $("#mptlmodal").load("/"+link.attr("href")+"/add",function( response, status, xhr ){

							//set mnadatory * after required label
     						$( ':input[required]' ).each( function () {
         						$("label[for='" + this.id + "']").addClass('mandatory');
     						});


						     	   $('#actionspopover').on("submit", "form#masterdataform", function(e){

									    e.preventDefault();

									    var postData = $(this).serializeArray();
									    var formURL = $(this).attr("action");
									    $.ajax(
									    {
									        url : formURL,
									        type: "POST",
									        data : postData,
									        success:function(data, textStatus, jqXHR)
									        {
									            $('#actionspopover').modal("hide");
									        },
									        error: function(jqXHR, textStatus, errorThrown)
									        {
									            $('#actionspopover').modal("hide");
									        }
									    });
									    $(this).unbind(e);

									});
						     });
				  		});


				 }
		    });
		});




  });
</script>
<?php $this->end(); ?>
<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>
