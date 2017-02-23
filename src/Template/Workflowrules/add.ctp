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


 <div class="box box-primary">
 	<div class="box-header"><h3 class="box-title">Actions</h3></div>
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

            jQuery("form")[0].submit();
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
        }},{ targets:6, 'className': 'reorderable' },
         { targets: '_all', 'className': 'move-event' }]
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
    		showflash("failure","Please enter the name.");
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
				showflash("failure",msg);
			}else{

				//datepicker
	    		$('.mptldp').datepicker({
	    			format:"yyyy/mm/dd",autoclose: true,clearBtn: true
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
	  	//reload table
	  	var workflowruleid=$("#workflowruleid").val();
  		table.ajax.url('/Workflowactions/ajaxData?workflowrule='+workflowruleid).load();
    	// table.draw();
	})

	var holidaycalendarid=$("#holidaycalendarid").val();
	$('<a href="/Workflowactions/add" id="adddt" class="open-Popup btn btn-sm btn-success disabled" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

});


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
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="myModalLabel"> MayHaw</h4>
              </div>
              <div class="modal-body">
                  Do you  really want  to delete the element(s)?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <div id="ajax_button" class="pull-right"></div>
              </div>
          </div>
      </div>
  </div>
