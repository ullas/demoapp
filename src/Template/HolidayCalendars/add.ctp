<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Holiday Calendar
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><?= $this->Html->link('<i class="fa fa-mail-reply"></i> '.__('Back'), ['action' => 'index'], ['escape' => false]) ?></li>
      </ol>
    </section>
<section class="content">
	<div class="box box-primary"><div class="box-body">
    <?= $this->Form->create("holidayCalendar") ?>
    <!-- <input type="hidden" value=""  id="holidaycalendarid"/> -->
    <fieldset>
        <?php
         	echo $this->Form->input('holidaycalendarid', array('type' => 'hidden'));
		
            echo $this->Form->input('calendar');
            echo $this->Form->input('name',['required' => true,'label'=>['text'=>'Name of Calendar','class'=>'mandatory']]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('valid_from', ['class' => 'mptldphc','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('valid_to', ['class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
			
			
			echo $this->Form->input('weekoff._ids', ['label'=>'Weekly Off','options' => array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),'class'=>'select2']);
			
        ?>
        
        <!-- <div class="col-md-4 pull-right"><div class="form-group"><input type="button" value="Get Weekly Off Dates" class="btn btn-xs btn-default" id="getweeklyoffdates"/></div></div> -->
        
    </fieldset>
    <div class="box-footer">
    	
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?= $this->Form->button(__('Save'),['title'=>'Save','class'=>'mptlhcsave pull-right disabled']) ?>
    <input type="button" value="Create" class="mptlhccreate btn btn-success pull-right" id="createhc"/>
    
    </div>
    <?= $this->Form->end() ?>
</div></div>



<!-- <div class="box box-primary"><div class="box-body">
	<table id="weeklyofftable" border="1">
        <thead><tr>
            <th>Date</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div></div> -->

              
 <div class="box box-primary">
 	<div class="box-header"><h3 class="box-title">Holidays</h3></div>
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
	.mptlhcsave{
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
  	
  	$('.mptldphc').datepicker({
	    			format:"yyyy/mm/dd",autoclose: true,clearBtn: true
	    		}).on('changeDate', function (e) {
           					dateChanged();
    					});
  	//disable weeklyoff select initially
  	$('#weekoff-ids').attr("disabled", true);
    
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
          rowReorder: { update:false },
          stateSave:false,
          responsive: true,
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
        'className': 'text-center',
        'render': function (data, type, full, meta){
            return '<input type="checkbox" class="mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        },},]
    });


//create btn onclick
$('#createhc').click(function(){
    	//get input value
		var calendar = document.getElementById("calendar").value;
		var name = document.getElementById("name").value;
		var countryelm = document.getElementById("country");
		var country = countryelm.options[countryelm.selectedIndex].value;
		var validfrom = document.getElementById("valid-from").value;
		var validto = document.getElementById("valid-to").value;
    	
    	if (name != "" && name!=null) {
        
    		$.get('/HolidayCalendars/createajax_data?calendar='+calendar+'&name='+name+'&country='+country+'&validfrom='+validfrom+'&validto='+validto, function(d) {
   		 		if(d!="error"){
   		 			$( "#holidaycalendarid" ).val(d);

   		 			//enable weeklyoff select initially
  					$('#weekoff-ids').attr("disabled", false);
  					$(".mptlhcsave").removeClass("disabled");
  					$("#adddt").removeClass("disabled");
  				
  					$("#adddt").attr("href", "/Holidays/add?hcid="+d);

  					$('.mptlhccreate').attr("disabled", true);
   		 		}
    		});
    	}else{
    		alert("Please enter name for the holiday calendar.");
    		return false;
    	}
   		
});



//col reorder
 // order= new $.fn.dataTable.ColReorder( table );
 
 //get weekly off dates
 // $('#getweeklyoffdates').click(function(){
$("#weekoff-ids").change(function(){
 	 	
 	var validfrom = document.getElementById('valid-from').value;
 	var validtill = document.getElementById('valid-to').value;
 	var d1 = new Date(validfrom);
	var d2 = new Date(validtill);
	
	if(document.getElementById('valid-from').value!="" && document.getElementById('valid-from').value!=undefined && document.getElementById('valid-to').value!="" && document.getElementById('valid-to').value!=undefined){
		var weekoffdate = $("#weekoff-ids").val();
	
		var offdates = '';
		if(weekoffdate!=null){offdates =weekoffdate.toString().split(',');}
 		var result=calcWeekOffDays(d1,d2,offdates);
 	
 	
 	//iniitially delete all 
 	var holidaycalendarid=$("#holidaycalendarid").val(); 
 	$.get('/HolidayCalendars/deleteWeekOff?holidaycalendar='+holidaycalendarid, function(d) {
    	// alert(d);
    });
    		
    		
 	var postdata=[]; 		
 	if(result!=null){
		for(t = 0; t < result.length; t++){
			var resArr = result[t].toString().split('^');
			var holidaycode = resArr[0].replace(/-/g, "");
			
		    postdata.push(result[t]+"^"+holidaycalendarid+"^"+holidaycode);
			// $.get('/HolidayCalendars/addWeekOff?name='+resArr[1]+"&date="+resArr[0]+"&holidaycode="+holidaycode+"&holidaycalendar="+"1"+"&holidayclass="+"2", function(d) {
    			// alert(d);
    		// });
    		
  		}
  		
  		$.get('/HolidayCalendars/addWeekOff?content='+JSON.stringify(postdata), function(d) {
    		// alert(d);
    	});
  	}
  	
  	//reload table
  	// table.ajax.reload(null,false);
  	table.ajax.url('/Holidays/ajaxData?holidaycalendar='+holidaycalendarid).load();
    // table.draw();
    }else{
   		alert("Please select the Valid From/Valid To date.");
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
				alert(msg);
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
  		table.ajax.reload(null,false);
    	// table.draw();
	})
	
	var holidaycalendarid=$("#holidaycalendarid").val(); 
	$('<a href="/Holidays/add" id="adddt" class="open-Popup btn btn-sm btn-success disabled" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');
     
});

//validfrom datepicker changed
function dateChanged() {
	var validfrom = document.getElementById('valid-from').value;
 	
	var d = new Date(validfrom);
	var year = d.getFullYear();
	var month = d.getMonth();
	var day = d.getDate();
	var c = new Date(year + 1, month, day);
	var fdate = formatDate(c).replace(/-/g, "/");
	console.log(fdate);
	if (document.getElementById('valid-to').value=="" || document.getElementById('valid-to').value==undefined)
    {
         $('#valid-to').val(fdate);
	 }
}
function calcWeekOffDays(dDate1, dDate2, dArr) {
    if (dDate1 > dDate2) return false;
    var date  = dDate1;
    var dates = [];

	var weekday = new Array(7);
	weekday[0] =  "Sunday";
	weekday[1] = "Monday";
	weekday[2] = "Tuesday";
	weekday[3] = "Wednesday";
	weekday[4] = "Thursday";
	weekday[5] = "Friday";
	weekday[6] = "Saturday";
	
    while (date < dDate2) {
    	for (i = 0; i < dArr.length; i++) {
    		if (date.getDay().toString() === dArr[i].toString()){//console.log(formatDate(new Date(date)));
         		dates.push(formatDate(new Date(date))+"^"+weekday[date.getDay()]);
        	}
    	}
        
        date.setDate( date.getDate() + 1 );
    }
    
    return dates;
}
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
} 
function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){
       $("#ajax_button").html("<a href='/<?php echo $this->request->params['controller'] ?>/delete/"+ $(this).attr("data-id")+"' class='btn btn-outline'>Confirm</a>");
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
                  <h4 class="modal-title" id="myModalLabel"> PeopleHR</h4>
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