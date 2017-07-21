<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Holiday Calendar
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create($holidayCalendar) ?>
    <fieldset>
        <?php

        	echo $this->Form->input('holidaycalendarid', array('type' => 'hidden'));

            echo $this->Form->input('calendar',['label' => 'Calendar Code']);
            echo $this->Form->input('name',['label' => 'Calendar Name','required' => true,'label'=>['text'=>'Name of Calendar','class'=>'mandatory']]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('valid_from', ['value' => !empty($holidayCalendar->valid_from) ? $holidayCalendar->valid_from->format($mptldateformat) : '','label' => 'Valid From Date','required' => true,'class' => 'mptldphc','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('valid_to', ['value' => !empty($holidayCalendar->valid_to) ? $holidayCalendar->valid_to->format($mptldateformat) : '','label' => 'Valid To Date','required' => true,'class' => 'mptldpvt','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
        	
        ?>

        <!-- <div class="col-md-4 pull-right"><div class="form-group"><input type="button" value="Get Weekly Off Dates" class="btn btn-xs btn-default" id="getweeklyoffdates"/></div></div> -->

    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Update'),['id'=>'hc-update','title'=>'Update','class'=>'pull-right']) ?>
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

<div class="box box-primary"><div class="box-body">
	<?php
		echo $this->Form->input('weekoff._ids', ['label'=>'Weekly Off','options' => array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),'class'=>'select2']);
    ?>
</div></div>


 <div class="box box-primary">
 	<div class="box-header with-border"><h3 class="box-title">Holidays</h3></div>
      <div class="box-body">
      	<?php echo $this->Form->create($this->request->params['controller'],array('class'=>'mptlform','url' => array('controller' => $this->request->params['controller'], 'action' => 'deleteAllActions')));
		echo $this->Form->input('rowsselectedid', array('type' => 'hidden')); ?>
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
    </table><?= $this->Form->end() ?>
    </div></div>


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
  var table; var order; var rows_selected = [];
   function deleteRecord(btn){
		$("#rowsselectedid").val(rows_selected);
  	    if (btn == 'yes') {

            jQuery("form")[1].submit();
        }
  }
  $(document).ready(function(){  
  	  	 
  	//set weekly off selected days
  	var woffdata=[];
  	var days = { '0': 'Sunday',  '1': 'Monday', '2': 'Tuesday', '3': 'Wednesday', '4': 'Thursday', '5': 'Friday', '6': 'Saturday'};
  	var woffarr=<?php echo $holidayarr ?>;
  	for (i=0; i<woffarr.length; i++) {
		for(var k in days){
			if(woffarr[i] === days[k]){
				woffdata.push(k);
			}
		}
	}

 	$("#weekoff-ids").val(woffdata);

  var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
		if(userdf==1){
			$('.mptldphc').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					dateChanged();
           					weeklyOffProcess();
    					});
    		$('.mptldpvt').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					weeklyOffProcess();
    					});
		}else{
			$('.mptldphc').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					dateChanged();
           					weeklyOffProcess();
    					});
    		$('.mptldpvt').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					weeklyOffProcess();
    					});
		}
	//select 2
    $(".select2").select2({ width: '100%',allowClear: false,placeholder: "Select" });

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
          rowReorder: { update:false },
          stateSave:false,
          responsive: true,
          'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      },
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
        "ajax": "/Holidays/ajaxData?holidaycalendar="+<?php echo $calid ?>,
        'columnDefs': [{
        'targets': 0,
        'className': 'text-center',
        'render': function (data, type, full, meta){
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        },

     },

     ]
});

// Handle click on "Select all" control
   $('#select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      
       // $('input[type="checkbox"]', rows).prop('checked', this.checked);
	  
	  if(this.checked){
         $('#mptlindextbl tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#mptlindextbl tbody input[type="checkbox"]:checked').trigger('click');
      }
	  
	  setTurben();
	   
   });
   // Handle click on checkbox to set state of "Select all" control
   $('#mptlindextbl tbody').on('change', 'input[type="checkbox"]', function(){
   		// Get row ID
      var rowId = this.value;
      // Determine whether row ID is in the list of selected row IDs 
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }
      
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

	//uncheck checkbox if none in the page checked
	($(".mptl-lst-chkbox:checked").length==0) ? $("#select-all").prop('checked', false) : $("#select-all").prop('checked', true) ;

   });
   
   $("#delete").click(function(){

  	   if(rows_selected.length==0){
  	   		sweet_alert("No item selected. Please select at least one item!");
      		// bootbox_alert("No item selected. Please select at least one item!").modal('show');
      		return;
      }

		if(rows_selected.length==1){
			// bootbox_confirm("Do you want to delete the record?", function(){deleteRecord('yes');}).modal('show');
			sweet_confirmdelete("MayHaw","Do you want to delete the record?", function(){deleteRecord('yes');});
		}
		else if(rows_selected.length>1){
			// bootbox_confirm("Do you want to delete " + rows_selected.length + " records?", function(){deleteRecord('yes');}).modal('show');
			sweet_confirmdelete("MayHaw","Do you want to delete " + rows_selected.length + " records?", function(){deleteRecord('yes');});
		}
  	});


//col reorder
 order= new $.fn.dataTable.ColReorder( table );

 //get weekly off dates
$("#weekoff-ids").change(weeklyOffProcess);


$("#hc-update").click(function(){
	
  //get input value
  var name = document.getElementById("name").value;
  var validfrom = document.getElementById("valid-from").value;
  var validto = document.getElementById("valid-to").value;

  if (name != "" && name!=null && validfrom != "" && validfrom!=null && validto != "" && validto!=null) {
    		
    var validfrom = document.getElementById('valid-from').value;
    var validto = document.getElementById('valid-to').value;
    
 	var d1 = "";var d2 = "";
 	if(userdf==1){ 
 		d1= new Date(validfrom.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3"));
 		d2= new Date(validto.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3"));
	}else{
		d1= new Date(validfrom);
		d2= new Date(validto);
	} 
	
    if(d1>d2){
      sweet_alert("The Valid From date is higher than Valid To date.");
      return false;
    }
  }else{
     if(name == "" || name==null){sweet_alert("Please enter name for the holiday calendar.");}
    		else if(validfrom == "" || validfrom==null){sweet_alert("Please select a Valid From date.");}
    		else if(validto == "" || validto==null){sweet_alert("Please select a Valid To date.");}
    		return false;
  }
})

 //popover
 $("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load(link.attr("href"),function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){
				$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				sweet_alert(msg);
			}else{

				if(userdf==1){
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true ,todayHighlight: true});
				}else{
					$('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
				}
 //set mandatory * after required label	
    $( ':input[required]' ).each( function () {
        $("label[for='" + this.id + "']").addClass('mandatory');
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
  		table.ajax.reload(null,false);
    	// table.draw();
	})
	
	// fmactions are added through setTurben. btn-group div is added separately.
	$('div.fmactionbtn').appendTo('div.dataTables_length');
	$('div.btn-group').appendTo('div.fmactionbtn');
	$('<a href="/Holidays/add?hcid=<?php echo $calid ?>" class="open-Popup btn btn-sm btn-success" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
}
);
//validfrom datepicker changed
function dateChanged() {
	var validfrom = document.getElementById('valid-from').value;

	var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
	
    var d ="";
    (userdf==1) ? d= new Date(validfrom.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3")) : d= new Date(validfrom);
	var year = d.getFullYear();
	var month = d.getMonth();
	var day = d.getDate();
	// var c = new Date(year + 1, month, day);
	var c = new Date(year, "11", "31");
	var fdate = formatDate(c).replace(/-/g, "/");		
				
	console.log(fdate);
	if (document.getElementById('valid-to').value=="" || document.getElementById('valid-to').value==undefined)
    {
         $('#valid-to').val(fdate);
	 }
}
//find weekly off days
function calcWeekOffDays(dDate1, dDate2, dArr) {
    if (dDate1 > dDate2) return false;
    var date  = dDate1;
    var dates = [];

	var weekday = { '0': 'Sunday',  '1': 'Monday', '2': 'Tuesday', '3': 'Wednesday', '4': 'Thursday', '5': 'Friday', '6': 'Saturday'};

    while (date < dDate2) {
    	for (i = 0; i < dArr.length; i++) {
    		if (date.getDay().toString() === dArr[i].toString()){ 
         		dates.push(toYMD(new Date(date))+"^"+weekday[date.getDay()]);
        	}
    	}

        date.setDate( date.getDate() + 1 );
    }

    return dates;
}
//format utc date to yyyy/mm/dd
function formatDate(fdate) {
	var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
	
    var d ="";
    // (userdf==1) ? d= new Date(fdate.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3")) : d= new Date(fdate);
   d= new Date(fdate);
   
    var month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

	var res="";
	(userdf==1) ? res = [day, month, year].join('-') : res = [year, month, day].join('-'); 
	
    return res;
}
//format utc date to yyyy/mm/dd
function toYMD(fdate) {
	
    var d = new Date(fdate);
    var month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){
       $("#ajax_button").html("<a href='/Holidays/delete/"+ $(this).attr("data-id")+"' class='btn btn-outline'>Confirm</a>");
      $("#trigger").click();
    });
	//uncheck checkbox if none in the page checked
	($(".mptl-lst-chkbox:checked").length==0) ? $("#select-all").prop('checked', false) : $("#select-all").prop('checked', true) ;
	
	
    $("#mptlindextbl tbody").find('tr').each(function () {
    	$(this).find('td').each (function() {
        var innerHtml=$(this).find('div.mptldtbool').html();
        // true/false instead of 1/0
        (innerHtml=="1") ? $(this).find('div.mptldtbool').html("True") : $(this).find('div.mptldtbool').html("False");
        });
    });
}

function weeklyOffProcess(){
	
	var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
 	var validfrom = document.getElementById('valid-from').value;
 	var validtill = document.getElementById('valid-to').value;
 	var d1 = "";var d2 = "";
 	if(userdf==1){ 
 		d1= new Date(validfrom.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3"));
 		d2= new Date(validtill.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3"));
	}else{
		d1= new Date(validfrom);
		d2= new Date(validtill);
	} 
	
  if (d1 > d2){
    // alert("The Valid From date is higher than Valid To date.");
    sweet_alert("The Valid From date is higher than Valid To date.");
    return false;
  }
	if(document.getElementById('valid-from').value!="" && document.getElementById('valid-from').value!=undefined && document.getElementById('valid-to').value!="" && document.getElementById('valid-to').value!=undefined){
    var weekoffdate = $("#weekoff-ids").val();
		var offdates = '';
		if(weekoffdate!=null){offdates =weekoffdate.toString().split(',');}
 		var result=calcWeekOffDays(d1,d2,offdates);
 		
   		var postdata=[];
 		 if(result!=null){
 		 	
 		 	//iniitially delete all
 			$.get('/HolidayCalendars/deleteWeekOff?holidaycalendar=<?php echo $calid ?>', function(d) {
    			// alert(d);
    		});
    	
			for(t = 0; t < result.length; t++){
				var resArr = result[t].toString().split('^');
				var holidaycode = resArr[0].replace(/-/g, "");
		    	postdata.push(result[t]+"^"+<?php echo $calid ?>+"^"+holidaycode);
  			}
  			
  			$.get('/HolidayCalendars/addWeekOff?content='+JSON.stringify(postdata), function(d) {
    		//alert(d);
    		});
  		}
  		//reload table
  		table.ajax.reload(null,false);
    	// table.draw();
   }else{
   		sweet_alert("Please select a Valid From/Valid To date.");
   		return false;
   }
 }
function setTurben()
{
	  var c=$(".mptl-lst-chkbox:checked").length;
      $(".mptl-itemsel").html(rows_selected.length);
      if(rows_selected.length==0){
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

</script>
<?php $this->end(); ?>

<!-- confirm delete -->
<a data-target="#ConfirmDelete" role="button" data-toggle="modal" id="trigger"></a>
<div class="modal fade" id="ConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-danger">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title mptlboldtxt" id="myModalLabel"> MayHaw</h4>
              </div>
              <div class="modal-body mptlboldtxt">
                  Are you sure, you really want to delete the element(s)?
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                  <div id="ajax_button" class="pull-right"></div>
              </div>
          </div>
      </div>
  </div>




<!-- remove clear button for weekly selection dates  -->
<style>
.select2-selection--multiple .select2-selection__rendered .select2-selection__clear{
	display:none;
}
</style>
