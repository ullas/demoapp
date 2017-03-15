<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Workflow Rule
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create("workflowrule") ?>
    <!-- <input type="hidden" value=""  id="holidaycalendarid"/> -->
    <fieldset>
        <?php
         	echo $this->Form->input('workflowruleid', array('type' => 'hidden'));

			echo $this->Form->input('name',['required' => true,'label'=>['text'=>'Name','class'=>'mandatory']]);
            echo $this->Form->input('description');
            // echo $this->Form->input('created_by');
            // echo $this->Form->input('modified_by');

        ?>


    </fieldset>
    <div class="box-footer">

    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save'),['title'=>'Save','class'=>'mptlwrsave pull-right disabled']) ?>
    <input type="button" value="Create" class="mptlwrcreate btn btn-success pull-right" id="createwr"/>

    </div>
    <?= $this->Form->end() ?>
</div></div>

<div class="fmactionbtn"></div>
	<div>
      <?php
      $title="Manage ". $this->request->params['controller'] ;
      echo $this->element('actions',[$actions,'title'=>$title]);
	  ?>
     </div>
     
 <?php echo $this->Form->create($this->request->params['controller'],array('class'=>'mptlform','url' => array('controller' => $this->request->params['controller'], 'action' => 'deleteAllActions')));?>
 <div class="box box-primary">
 	<div class="box-header with-border"><h3 class="box-title">Actions</h3></div>
      <div class="box-body">
    	<table id="mptlindextbl" class="table table-hover  table-bordered ">
        <thead>
            <tr>

                <th data-orderable="false"><input type="checkbox" name="select_all" value="1" id="select-all" ></th>
           		<?php
                  for($i=1;$i<count($configs);$i++){

                  	echo "<th>". $configs[$i]['title'] ."</th>";
                  }
                ?>
                <th data-orderable="false">Actions</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table></div></div>

<?= $this->Form->end() ?>
</section>

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
	.mptlwrsave{
		margin-left:10px;
	}

</style>
<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>

<?php
$this->Html->css([ 'AdminLTE./plugins/datatables/dataTables.bootstrap',
  'AdminLTE./plugins/iCheck/all',
   'AdminLTE./plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min',
 ], ['block' => 'css']);
$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/extensions/TableTools/js/dataTables.tableTools',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
  'AdminLTE./plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min',
  'AdminLTE./plugins/daterangepicker/moment.min',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/iCheck/iCheck.min',
], ['block' => 'script']); ?>

<?php $this->start('scriptBotton'); ?>
<script>
  var table; var order;
   function deleteRecord(btn){

  	    if (btn == 'yes') {

            jQuery("form")[1].submit();
        }
  }
  $(function () {


     //initialise datatable
     table= $('#mptlindextbl').DataTable({
          "paging": true,
          //disable 0th column checkbox default sort order
          // "order": [[ 1, 'asc' ]],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
          colReorder: false,
          rowReorder: { selector: 'tr td.move-event',update:false },
          stateSave:false,
          responsive: true,
          "drawCallback": function( settings ) {
        		tableLoaded();
   		  },
          "deferLoading": 0, // here
          oLanguage        : {
        		sSearch: '<div class="input-group"><span class="input-group-addon"><span class="fa fa-search"></span></span>',
            	sSearchPlaceholder: 'Search here...',
		   },
        //server side processing
         "processing": true,
         "serverSide": true,
         "ajax": {url:""},
         'columnDefs': [{
        'targets': 0,
        'className': 'text-center move-event',
        'render': function (data, type, full, meta){
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        },'className': 'reorderable'},{ targets:6, 'className': 'reorderable' },
         { targets: '_all', 'className': 'move-event' }]
    });

 // Handle click on "Select all" control
   $('#select-all').on('click', function(){
      // Get all rows with search applied

      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
	  setTurben();
   });
   // Handle click on checkbox to set state of "Select all" control
   $('#mptlindextbl tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
      setTurben();



   });
   
   $("#delete").click(function(){

  	   if($(".mptl-lst-chkbox:checked").length==0){
  	   		sweet_alert("No item selected. Please select at least one item!");
      		// bootbox_alert("No item selected. Please select at least one item!").modal('show');
      		return;
      }

		if($(".mptl-lst-chkbox:checked").length==1){
			// bootbox_confirm("Do you want to delete the record?", function(){deleteRecord('yes');}).modal('show');
			sweet_confirm("MayHaw","Do you want to delete the record?", function(){deleteRecord('yes');});
		}
		else if($(".mptl-lst-chkbox:checked").length>1){
			// bootbox_confirm("Do you want to delete " + $(".mptl-lst-chkbox:checked").length + " records?", function(){deleteRecord('yes');}).modal('show');
			sweet_confirm("MayHaw","Do you want to delete " + $(".mptl-lst-chkbox:checked").length + " records?", function(){deleteRecord('yes');});
		}
  	});

//create btn onclick
$('#createwr').click(function(){
    	//get input value
		var name = document.getElementById("name").value;
		var description = document.getElementById("description").value;

    	if (name != "" && name!=null) {

    		$.get('/Workflowrules/createajax_data?name='+name+'&description='+description, function(d) {
   		 		if(d!="error"){
   		 			$( "#workflowruleid" ).val(d);

   		 			//enable weeklyoff select initially
  					$(".mptlwrsave").removeClass("disabled");
  					$("#adddt").removeClass("disabled");

  					$("#adddt").attr("href", "/Workflowactions/add?wrid="+d);

  					$('.mptlwrcreate').attr("disabled", true);
   		 		}
    		});
    	}else{
    		sweet_alert("Please enter the name.");
    		return false;
    	}

});

 $("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				sweet_alert(msg);
			}else{

				var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
		if(userdf==1){
			$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true });
		}else{
			$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true });
		}
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
	  	//reload table
	  	var workflowruleid=$("#workflowruleid").val();
  		table.ajax.url('/Workflowactions/ajaxData?workflowrule='+workflowruleid).load();
    	// table.draw();
	})

// fmactions are added through setTurben. btn-group div is added separately.
	$('div.fmactionbtn').appendTo('div.dataTables_length');
	$('div.btn-group').appendTo('div.fmactionbtn');
	
	var holidaycalendarid=$("#holidaycalendarid").val();
	$('<a href="/Workflowactions/add" id="adddt" class="open-Popup btn btn-sm btn-success disabled" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

});

function setTurben()
{
	var c=$(".mptl-lst-chkbox:checked").length;
      $(".mptl-itemsel").html(c);
      if(c==0){
				   $('div.fmactions').hide();
      	   $( ".mptl-itemsel" ).fadeTo( "slow" , 0, function() {
		    // Animation complete.
		  });
      }else{
				 $('div.fmactions').appendTo('div.fmactionbtn');
				 $('div.fmactions').show()
      	  $( ".mptl-itemsel" ).fadeTo( "slow" , 1, function() {
		    // Animation complete.
		  });
      }
}
function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){
       $("#ajax_button").html("<a href='/Workflowactions/delete/"+ $(this).attr("data-id")+"' class='btn btn-outline'>Confirm</a>");
      $("#trigger").click();
    });

    $("#mptlindextbl tbody").find('tr').each(function () {
    	$(this).find('td').each (function() {
        var innerHtml=$(this).find('div.mptldtbool').html();
        // true/false instead of 1/0
        (innerHtml=="1") ? $(this).find('div.mptldtbool').html("True") : $(this).find('div.mptldtbool').html("False");
        });
    });
}





</script>
<?php $this->end(); ?>

<!-- confirm delete -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal fade mptlboldtxt" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title mptlboldtxt" id="myModalLabel"> MayHaw</h4>
              </div>
              <div class="modal-body">
                  Are you sure, you really want to delete the element(s)?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <div id="ajax_button" class="pull-right"></div>
              </div>
          </div>
      </div>
  </div>
