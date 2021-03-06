<style>
	.row{margin:0px;}/*avoid scrollbar in datatable if not needed*/
</style>
<?= $this->element('templateelmnt'); ?>
<section class="content-header">
      <h1>
        Holiday Calendar
        <small>View</small>
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
            echo $this->Form->input('calendar',['label' => 'Calendar Code','disabled'=>true]);
            echo $this->Form->input('name',['label' => 'Calendar Name','disabled'=>true]);
            echo $this->Form->input('country',['options' => $this->Country->get_countries(), 'empty' => true,'disabled'=>true]);
            echo $this->Form->input('valid_from', ['value' => !empty($holidayCalendar->valid_from) ? $holidayCalendar->valid_from->format($mptldateformat) : '','label' => 'Valid From Date','class' => 'mptldphc','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);
            echo $this->Form->input('valid_to', ['value' => !empty($holidayCalendar->valid_to) ? $holidayCalendar->valid_to->format($mptldateformat) : '','label' => 'Valid To Date','class' => 'mptldp','type' => 'text','templateVars' => ['icon' => '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>'],'disabled'=>true]);

        ?>

        <!-- <div class="col-md-4 pull-right"><div class="form-group"><input type="button" value="Get Weekly Off Dates" class="btn btn-xs btn-default" id="getweeklyoffdates"/></div></div> -->

    </fieldset>
    <div class="box-footer">
    <?=$this->Html->link(__('Cancel'), ['action' => 'index'], ['escape' => false])?>
    <?=$this->Html->link(__('Edit HolidayCalendar'), ['action' => 'edit', $holidayCalendar['id']],['class'=>'btn btn-primary label-info pull-right'], ['escape' => false])?>
    </div>
    <?= $this->Form->end() ?>
</div></div>



<div class="box box-primary"><div class="box-body">
	<?php
		echo $this->Form->input('weekoff._ids', ['label'=>'Weekly Off','options' => array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),'class'=>'select2','disabled'=>true]);
    ?>
</div></div>


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

	.disLink{
           pointer-events: none;
           cursor: default;
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

      var userdfp=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
		if(userdfp==1){
			$('.mptldphc').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					dateChanged();
           					weeklyOffProcess();
    					});
		}else{
			$('.mptldphc').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true }).on('changeDate', function (e) {
           					dateChanged();
           					weeklyOffProcess();
    					});
		}

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
            return '<input type="checkbox" class="disLink mptl-lst-chkbox" name="chk-' + data + '" value="' + $('<div/>').text(data).html() + '">';
        },

     },

     ]



});


//col reorder
 order= new $.fn.dataTable.ColReorder( table );

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


 	// var name=$("#name").val();
    // var name="test";
    // var date="2017-01-26";
    // $.get('/HolidayCalendars/addWeekOff?name='+name+"&date="+date, function(d) {
    	// // alert(d);
    	// table.ajax.reload(null,false);
    	// table.draw();
    // });


 	//iniitially delete all
 	$.get('/HolidayCalendars/deleteWeekOff?holidaycalendar=<?php echo $calid ?>', function(d) {
    	// alert(d);
    });

   var postdata=[];
 	if(result!=null){
		for(t = 0; t < result.length; t++){
			var resArr = result[t].toString().split('^');
			var holidaycode = resArr[0].replace(/-/g, "");

		    postdata.push(result[t]+"^"+<?php echo $calid ?>+"^"+holidaycode);
			// $.get('/HolidayCalendars/addWeekOff?name='+resArr[1]+"&date="+resArr[0]+"&holidaycode="+holidaycode+"&holidaycalendar="+"1"+"&holidayclass="+"2", function(d) {
    			// alert(d);
    		// });

  		}

  		$.get('/HolidayCalendars/addWeekOff?content='+JSON.stringify(postdata), function(d) {
    		// alert(d);
    	});
  	}

  	//reload table
  	table.ajax.reload(null,false);
    // table.draw();
    }else{
   		sweet_alert("failure","Please select the Valid From/Valid To date.");
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
  		table.ajax.reload(null,false);
    	// table.draw();
	})


	// $('<a href="/Holidays/add?hcid=<?php echo $calid ?>" disabled="disabled" class="open-Popup btn btn-sm btn-success" data-remote="false" data-toggle="modal" data-target="#actionspopover" style="margin-left:15px;" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>').appendTo('div.dataTables_filter');

});

//validfrom datepicker changed
function dateChanged() {
	var validfrom = document.getElementById('valid-from').value;

	var d = new Date(validfrom);
	var year = d.getFullYear();
	var month = d.getMonth();
	var day = d.getDate();
	var c = new Date(year, "11", "31");
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
