<style>
	.row{margin:0px;}/*avoid scrollbar in datatable if not needed*/
</style>
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

            echo $this->Form->input('calendar',['label' => 'Calendar Code']);
            echo $this->Form->input('name',['label' => 'Calendar Name','required' => true,'label'=>['text'=>'Name of Calendar','class'=>'mandatory']]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true]);
            echo $this->Form->input('valid_from', ['label' => 'Valid From Date','required' => true,'class' => 'mptldphc','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);
            echo $this->Form->input('valid_to', ['label' => 'Valid To Date','required' => true,'class' => 'mptldpvt','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>']]);

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


<?php echo $this->Form->create($this->request->params['controller'],array('class'=>'mptlform','url' => array('controller' => $this->request->params['controller'], 'action' => 'deleteAllActions')));?>
 <div class="box box-primary">
 	<div class="box-header with-border"><h3 class="box-title">Holidays</h3></div>
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

            jQuery("form")[1].submit();
        }
  }
  $(function () {

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
			$('.mptldphc').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					dateChanged();
           					weeklyOffProcess();
    					});
    		$('.mptldpvt').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					weeklyOffProcess();
    					});
		}
		
  	
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
        },}]
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

    	if (name != "" && name!=null && validfrom != "" && validfrom!=null && validto != "" && validto!=null) {

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
    		if(name == "" || name==null){sweet_alert("Please enter name for the holiday calendar.");}
    		else if(validfrom == "" || validfrom==null){sweet_alert("Please select a Valid From date.");}
    		else if(validto == "" || validto==null){sweet_alert("Please select a Valid To date.");}
    		return false;
    	}

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
			sweet_confirmdelete("MayHaw","Do you want to delete the record?", function(){deleteRecord('yes');});
		}
		else if($(".mptl-lst-chkbox:checked").length>1){
			// bootbox_confirm("Do you want to delete " + $(".mptl-lst-chkbox:checked").length + " records?", function(){deleteRecord('yes');}).modal('show');
			sweet_confirmdelete("MayHaw","Do you want to delete " + $(".mptl-lst-chkbox:checked").length + " records?", function(){deleteRecord('yes');});
		}
  	});
//col reorder
 // order= new $.fn.dataTable.ColReorder( table );
$("#weekoff-ids").change(weeklyOffProcess);

// $("#valid-to").on("changeDate", function() {
          // weeklyOffProcess();
// });
 //get weekly off dates
 // $('#getweeklyoffdates').click(function(){
// $("#weekoff-ids").change(function(){
// 
 	// var validfrom = document.getElementById('valid-from').value;
 	// var validtill = document.getElementById('valid-to').value;
 	// var d1 = new Date(validfrom);
	// var d2 = new Date(validtill);
// 
	// if(document.getElementById('valid-from').value!="" && document.getElementById('valid-from').value!=undefined && document.getElementById('valid-to').value!="" && document.getElementById('valid-to').value!=undefined){
		// var weekoffdate = $("#weekoff-ids").val();
// 
		// var offdates = '';
		// if(weekoffdate!=null){offdates =weekoffdate.toString().split(',');}
 		// var result=calcWeekOffDays(d1,d2,offdates);
// 
// 
 	// //iniitially delete all
 	// var holidaycalendarid=$("#holidaycalendarid").val();
 	// $.get('/HolidayCalendars/deleteWeekOff?holidaycalendar='+holidaycalendarid, function(d) {
    	// // alert(d);
    // });
// 
// 
 	// var postdata=[];
 	// if(result!=null){
		// for(t = 0; t < result.length; t++){
			// var resArr = result[t].toString().split('^');
			// var holidaycode = resArr[0].replace(/-/g, "");
// 
		    // postdata.push(result[t]+"^"+holidaycalendarid+"^"+holidaycode);
			// // $.get('/HolidayCalendars/addWeekOff?name='+resArr[1]+"&date="+resArr[0]+"&holidaycode="+holidaycode+"&holidaycalendar="+"1"+"&holidayclass="+"2", function(d) {
    			// // alert(d);
    		// // });
// 
  		// }
// 
  		// $.get('/HolidayCalendars/addWeekOff?content='+JSON.stringify(postdata), function(d) {
    		// // alert(d);
    	// });
  	// }
// 
  	// //reload table
  	// // table.ajax.reload(null,false);
  	// table.ajax.url('/Holidays/ajaxData?holidaycalendar='+holidaycalendarid).load();
    // // table.draw();
    // }else{
   		// showflash("failure","Please select the Valid From/Valid To date.");
   		// return false;
   // }
 // });


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

		if(userdf==1){
			$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
		}else{
			$('.mptldp').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
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
	  	var holidaycalendarid=$("#holidaycalendarid").val();
  		table.ajax.url('/Holidays/ajaxData?holidaycalendar='+holidaycalendarid).load();
    	// table.draw();
	});

	// fmactions are added through setTurben. btn-group div is added separately.
	$('div.fmactionbtn').appendTo('div.dataTables_length');
	$('div.btn-group').appendTo('div.fmactionbtn');
	
	var holidaycalendarid=$("#holidaycalendarid").val();
	$('<a href="/Holidays/add" id="adddt" class="open-Popup btn btn-sm btn-success disabled" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

});

//validfrom datepicker changed
function dateChanged() {
	var validfrom = document.getElementById('valid-from').value;

	var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
	
    var d ="";
    (userdf==1) ? d= new Date(validfrom.replace( /(\d{2})[-/](\d{2})[-/](\d{4})/, "$2/$1/$3")) : d= new Date(validfrom);
	var year = d.getFullYear();
	var month = d.getMonth();
	var day = d.getDate();
	var c = new Date(year, "11", "31");
	var fdate = formatDate(c).replace(/-/g, "/");
	console.log(validfrom+"--"+fdate);
	if (document.getElementById('valid-to').value=="" || document.getElementById('valid-to').value==undefined)
    {
         $('#valid-to').val(fdate);
	 }
}
function calcWeekOffDays(dDate1, dDate2, dArr) {
    if (dDate1 > dDate2) return false;
    var date  = dDate1;
    var dates = [];

	var weekday = { '0': 'Sunday',  '1': 'Monday', '2': 'Tuesday', '3': 'Wednesday', '4': 'Thursday', '5': 'Friday', '6': 'Saturday'};

    while (date < dDate2) {
    	for (i = 0; i < dArr.length; i++) {
    		if (date.getDay().toString() === dArr[i].toString()){//console.log(formatDate(new Date(date)));
         		dates.push(formatDate(new Date(date)).replace(/-/g, "/")+"^"+weekday[date.getDay()]);
        	}
    	}

        date.setDate( date.getDate() + 1 );
    }
	date=formatDate(date);
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
  
  var holidaycalendarid=$("#holidaycalendarid").val();
  //retuurn if holidaycalendarid is null to stop loading datatable
  if(holidaycalendarid == 'undefined' || holidaycalendarid == null || holidaycalendarid == ""){
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
 			$.get('/HolidayCalendars/deleteWeekOff?holidaycalendar='+holidaycalendarid, function(d) {
    			// alert(d);
    		});
    	
			for(t = 0; t < result.length; t++){
				var resArr = result[t].toString().split('^');
				var holidaycode = resArr[0].replace(/\//g, "");
		    	postdata.push(result[t]+"^"+holidaycalendarid+"^"+holidaycode);
  			}

  			$.get('/HolidayCalendars/addWeekOff?content='+JSON.stringify(postdata), function(d) {
    		//alert(d);
    		});
  		}
  		//reload table
  		table.ajax.url('/Holidays/ajaxData?holidaycalendar='+holidaycalendarid).load();
    	// table.draw();
   }else{
   		sweet_alert("Please select a Valid From/Valid To date.");
   		return false;
   }
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
