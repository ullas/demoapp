<!-- <section class="content-header">
  <h1>
    <?php 
    if(isset($title)){
    	
		echo $title;
    }else{

    	echo $this->request->params['controller'] ;
    }
?>
    <small>List</small>
  </h1>
  <ol class="breadcrumb">
    <?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  </ol>
</section> -->
<section class="content">
	<button id="togglebutton" type="button" class="btn btn-primary bg-gray btn-sm pull-right" data-toggle="collapse" data-target="#infobar">
      <span class="fa fa-chevron-up fs20"></span>
</button>

   <?php echo $this->Form->create($this->request->params['controller'],array('url' => array('controller' => $this->request->params['controller'], 'action' => 'deleteAll')));?>
   	<input type="hidden" value="1"  id="basicfilter"/>
	<div class="fmactionbtn"></div>
	<div>
      <?php
      $title="Manage ". $this->request->params['controller'] ;
      echo $this->element('actions',[$actions,'title'=>$title]);
	  ?>
     </div>
  <div class="row">
        <div class="col-md-12">
  <div class="box box-primary">
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
    </div></div>
    <?= $this->Form->end() ?>
</section>
<div class="modal fade" id="assign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
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
  
  function bootbox_confirm(msg, callback_success, callback_cancel) {
    var d = bootbox.confirm({title:"MayHaw",message:msg, show:false, buttons: { 'cancel': { label: 'Cancel', className: 'btn btn-outline pull-left' }, 
    									'confirm': { label: 'Delete', className: 'btn btn-outline pull-right' } },callback:function(result) {
        if (result)
            callback_success();
        else if(typeof(callback_cancel) == 'function')
            callback_cancel();
    }});
    return d;
  }

  $(function () {
  	
  	  //throw javascript console error,instead of throwing alert
  	  $.fn.dataTable.ext.errMode='throw';

  	  updateFilterActiveFlag();

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

    $('#settings').on('shown.bs.modal', function() {
       setOrder();
    })

    //Flat blue color scheme for iCheck
    $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

	

     table= $('#mptlindextbl').DataTable({
          "paging": true,
          //disable 0th column checkbox default sort order
          "order": [[ 1, 'asc' ]],
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "scrollX":true,
          colReorder: true,
          // rowReorder: { update:false },
          stateSave:false,
          responsive: true,
          // "initComplete": function(settings, json) {
          // },
          "drawCallback": function( settings ) {
        		tableLoaded();
   		  },
          oLanguage        : {
        		sSearch: '<div class="input-group"><span class="input-group-addon"><span class="fa fa-search"></span></span>',
            	sSearchPlaceholder: 'Search here...',
		},
        //server side processing
          "processing": true,
          "serverSide": true,
          "ajax": "/<?php echo $this->request->params['controller'] ?>/ajaxData",
          'columnDefs': [{
        'targets': 0,
        'className': 'dt-body-center',
        'render': function (data, type, full, meta){
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        },

     },

     ]
    });


	// fmactions are added through setTurben. btn-group div is added separately.
	$('div.fmactionbtn').appendTo('div.dataTables_length');
	$('div.btn-group').appendTo('div.fmactionbtn');
	
     // $('<a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#settings" style="margin-left:15px;" title="Table Settings"><i class="fa fa-gear" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

      $('.dataTables_filter input').unbind().on('keyup', function() {

	var searchTerm = this.value.toLowerCase();
	$.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
       //search only the following columns

       return true;
   })
   console.log(searchTerm);
   table.search(searchTerm).draw();
   $.fn.dataTable.ext.search.pop();
})

//col reorder
 order= new $.fn.dataTable.ColReorder( table );


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
   // Handle click on " Settings Select all" control
   $('#mptl_settings_chk_all').on('click', function(){
      // Check/uncheck checkboxes for all rows in the table


      if( $(this).is(':checked') ){
         $('.mptl_settings_chk').prop('checked', true);
      }else{
      	$('.mptl_settings_chk').prop('checked', false);
      }
   });
   // Handle click on checkbox to set state of "Settings Select all" control

   $('mptl-tbl-settings tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked

      if(!this.checked){
         var el = $('#mptl_settings_chk_all').get(0);


         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }

      }

   });
   $(".mptl-settings-save").click(function(){
       var hiddencols="";
       var c=<?php echo count($configs) ?> ;

       $('.mptl_settings_chk').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];

		    if(col !=0 && c!=col){
			    if(sThisVal){

			    	table.column(col).visible(true);

			    }else{
			    	hiddencols.length>0? hiddencols+="," :hiddencols;
			    	hiddencols+=col;
			    	table.column(col).visible(false);
			    }
		    }
	   });



	   $.post("/<?php echo $this->request->params['controller'] ?>/updateSettings",
   		 {
       		 columns: hiddencols

   		 },
	    function(data, status){
	        $('#settings').modal('hide');
	    });

	     $('#settings').modal('hide');

   });
    $('.mptl-daterange').change(function(){
    	// var ordr=table.colReorder.order();
    	 table.ajax.reload(null,false);
    	// table.colReorder.order(ordr);
    	 table.draw();

    });

        //jQuery UI sortable for the settings modal
    $(".column-list").sortable({
        placeholder: "sort-highlight",
        handle: ".handle",
        forcePlaceholderSize: true,
        zIndex: 999999
    });

     $(".mptl-daterange").change(function(){
          updateFilterActiveFlag();
     });

     setTurben();
  });

function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){var dataid=$(this).attr('data-id');
       $("#ajax_button").html("<form name='formdelete' id='formdelete"+dataid+"' method='post'  action='/<?php echo $this->request->params['controller'] ?>/delete/"+dataid+"' style='display:none;'><input type='hidden' name='_method' value='POST'></form><a href='#' onclick='document.getElementById(&quot;formdelete"+dataid+"&quot;).submit();' class='btn btn-outline'>Confirm</a>");
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

function updateFilterActiveFlag()
{

	    var flagActive=false;

	    $('.mptl-daterange').each(function () {
		    var l= $(this).val().length;
		    if(l>3){
		    	flagActive=true;

		    }
	   });
	 	$('.mptl-filter-base').each(function (){



    		if(this.checked  && !($(this).is(':disabled'))){
    			flagActive=true;

    		}
    	});


    	  flagActive  ? $("#filterstatus").show() : 	$("#filterstatus").hide();



}
$('.mptl-filter-base').on('ifChecked', function(event){

	setBasicFilter();
});
$('.mptl-filter-base').on('ifUnchecked', function(event){

	setBasicFilter();
});

 function setBasicFilter()
  {
  	  var filter="";

       $('.mptl-filter-base').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];
		    if(sThisVal){

		    	filter.length>0? filter+="," :filter;
		    	filter+=col;

		    }
	   });
  	  $("#basicfilter").val(filter);

  	  updateFilterActiveFlag();



    	 table.ajax.reload(null,true);


    	 table.draw();
  }


  function setOrder()
  {

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
                  Are you sure, you  really want to delete the element(s)?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <div id="ajax_button" class="pull-right"></div>
              </div>
          </div>
      </div>
  </div>
