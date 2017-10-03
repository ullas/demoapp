<style>
@media (min-width: 768px) {
  .modal-dialog {
    width: 800px;
    margin: 30px auto;
  }
  .modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
  }
  .modal-sm {
    width: 300px;
  }
}
</style>

<section class="content-header">
  <h1>
    Absence Quota
    <small>List</small>
  </h1>
  <ol class="breadcrumb">


  	<div class="box-tools pull-right"style="margin-left:15px;" >
                <div class="has-feedback">
                  <input type="text" id="absentquotasearch"  onkeyup="searchabsentquota()"  class="form-control input-sm" placeholder="Search...">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>



<div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/AbsenceQuota/add" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover">Add Absence Quota</a>
					</li>
                    <li><a href="/AbsenceQuota/batchadd" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover">Add in batch</a>
					</li>
                    <li><a href="/AbsenceQuota/batchremove" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover">Remove in batch</a>
					</li>
                  </ul>
                </div>

  </ol>
</section>

<section class="content panel-group">
<div class="box box-primary">
      <div class="box-body" id="accordion" >


	<?php foreach ($content as $vals) { ?>
          <div class="panel box box-widget mptlpanel" id="<?php echo $vals['empid']; ?>">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $vals['empname']; ?></h3>

              <div class="box-tools pull-right">
              	<div class="btn-group">
                  <button type="button" class="btn btn-sm dropdown-toggle mptltoggle" data-toggle="dropdown" style="padding:0px;border:0px;">
                    <a data-toggle="collapse" data-parent="#accordion" href="#mainpanel<?php echo $vals['empid'];  ?>" style="background-color: #00a65a;border:1px solid #008d4c;border-radius: 3px;line-height: 1.5;padding: 5px 10px;">
                    	<i class="fa fa-bars"></i>
                    </a>
                  </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="/AbsenceQuota/addempdata/<?php echo $vals['empid']; ?>" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover">Add Absence quota</a>
					</li>
                    <li><a href="/AbsenceQuota/copyempdata/<?php echo $vals['empid']; ?>" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover">Duplicate</a>
					</li>
                    <li>

					<?php echo  '<a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete the Absence Quota for '.$vals['empname'].' ?&quot; ,
                    function(){ empdeletequota('.$vals['empid'].'); })
                    event.returnValue = false; return false;" class="deletelink">Delete</a>';   ?>

                    </li>
                  </ul>
                </div>

				<!-- <a data-toggle="collapse" data-parent="#contentsection" href="#mainpanel<?php echo $vals['empid'];  ?>" aria-expanded="false" class="collapsed">
              		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="more-less fa fa-plus text-gray"></i>
                	</button>
                </a> -->
                <a data-toggle="collapse" data-parent="#accordion" href="#mainpanel<?php echo $vals['empid'];  ?>"><i class="more-less fa fa-plus text-gray p3"></i>
                      </a>



              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div id="mainpanel<?php echo $vals['empid'];  ?>" class="emppanel panel-collapse collapse" aria-expanded="false"><!-- <div class="box-body"> -->

            <table class="table table-hover table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Time Type</th>
                <th>Frequency</th>
                <th>Quota</th>
                <th>Leave Balance</th>
                <th>Next Expiry</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php  foreach ($vals['absentchild'] as $childval) { ?>



            <tr>
                <td><?php echo  $childval['timetype']; ?></td>
                <td><?php echo  $childval['frequency']; ?></td>
                <td><?php echo  $childval['quota']; ?></td>
                <td><?php echo  $childval['balance']; ?></td>
                <td><?php echo  $childval['nxtexpiry']; ?></td>
                <td> <a href="/AbsenceQuota/edit/<?php echo $childval['id']; ?>" class="open-Popup" data-remote="false" data-toggle="modal" data-target="#actionspopover"><i class="editlink fa fa-pencil p3 text-aqua" aria-hidden="true"></i></a>


                	<?php echo  '<form name="formdelete" id="formdelete' .$childval['id']. '" method="post" action="/AbsenceQuota/delete/'.$childval['id'].'" style="display:none;" >
                    <input type="hidden" name="_method" value="POST"></form>
                    <a href="#" onclick="sweet_confirmdelete(&quot;MayHaw&quot;,&quot;Are you sure you want to delete '.$childval['timetype'].' from '.$vals['empname'].'?&quot; ,
                    function(){ var lastemppanel=$(&quot;.emppanel.panel-collapse.collapse.in&quot;).attr(&quot;id&quot;);localStorage.setItem(&quot;lastemppanel&quot;, lastemppanel);
					 document.getElementById(&quot;formdelete'.$childval['id'].'&quot;).submit(); })
                    event.returnValue = false; return false;" class="deletelink fa fa-trash text-red" style= "padding:3px"></a>';   ?>

                </td>
            </tr>


			<?php } ?>
			</tbody>
    	</table>



            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    <?php } ?>
</div>
</div>
</section>
<!-- add actions popover -->
<?php echo $this->element('popoverelmnt'); ?>






<?php $this->start('scriptIndexBottom'); ?>
<script>

var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';


$(function () {
  
  	$(document.body).on("change","#employee-id",function(){
 		$.ajax({
        	type: "POST",
        	url: '/AbsenceQuota/getEmpTimeTypes',
        	data: 'empid='+this.value,
        	success : function(ttdata) {
        		var servicetaskarr=JSON.parse(ttdata);
        		var servicetaskdata=[];
				$.each(servicetaskarr, function(key, value) {
    				servicetaskdata.push({'id':key, "text":value});
				});
				$("#time-type-id").empty();
        		$("#time-type-id").select2({width: '100%',allowClear: true,placeholder: "Select",data:servicetaskdata});
    			console.log(servicetaskdata);
    			return true;
        	},error: function(data) {
        	    sweet_alert("Couldn't load the particular employees time types.Please try again later.");
				return false;
        	}    
        });
	});

	//check if last expanded emp panel exists,if so expand it
	var lastemployeepanel = localStorage.getItem('lastemppanel');//console.log(lastemployeepanel);
	$("#"+lastemployeepanel).addClass("in");$("#"+lastemployeepanel).attr("aria-expanded","true");
	$("#"+lastemployeepanel).prev('.box-header')
        .find(".more-less")
        .toggleClass(' fa-plus fa-minus ');

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

				$('.mptlcopy').click(function(e){

					var lastemppanel=$('.emppanel.panel-collapse.collapse.in').attr('id');localStorage.setItem('lastemppanel', lastemppanel);

    				//get input value
    				var oldemp = $("#oldempid").val();
					var newemp = $("#employee-id").val();

					if (oldemp=="" || oldemp==null){
						sweet_alert("Error while loading.Please try again later.");
						return false;
					}else if (newemp=="" || newemp==null){
						sweet_alert("Please select a employee.");
						return false;
					}else{

						$.ajax({
        				type: "POST",
      					url: '/AbsenceQuota/copyEmployeesQuota',
        				data: 'oldemp='+oldemp+'&newemp=' + newemp,
        				success : function(data) {
        					if(data=="success"){
        						window.location.reload();
    							return true;
    						}else{
    							sweet_alert(data);
								return false;
    						}

        				},error: function(data) {
       						sweet_alert("Error while copying Absence quota.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while copying Absence quota.");
								return false;
        					}
      					}

        			});
        			return false;
					}
					// return false;
				});



				//save btn onclick
	$('#mptlbatchadd').click(function(){

		var lastemppanel=$('.emppanel.panel-collapse.collapse.in').attr('id');localStorage.setItem('lastemppanel', lastemppanel);

    	//get input value
		var emp = $("#empdatabiographies-id").val();

		if ($('.paygroup_filter:checkbox:checked').length <1){
			sweet_alert("Please select a Paygroup.");
			return false;
		}
		var checkedarr=[];
    	$('.paygroup_filter').each(function () {

		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var colid=id.split("_")[1];
		    if(sThisVal){
				checkedarr.push(colid);
		    }
	   	});

					var timetype = $('#time-type-id').val();
					var frequency = $('#frequency-id').val();
					var quota=$("#quota").val();
    				var balance=$("#balance").val();
    				var nxtexpiry = $("#nxtexpiry").val();
					var expirylot = $("#expirylot").val();


					if (timetype=="" || timetype==null){
						sweet_alert("Please select a timetype.");
						return false;
					}
					if (frequency=="" || frequency==null){
						sweet_alert("Please select a frequency.");
						return false;
					}
					if (quota=="" || quota==null){
						sweet_alert("Please enter the quota.");
						return false;
					}
					if (nxtexpiry=="" || nxtexpiry==null){
						sweet_alert("Please enter the next expiry date.");
						return false;
					}

					$.ajax({
        				type: "POST",
      					url: '/AbsenceQuota/addBatchData',
        				data: 'checkedarr='+JSON.stringify(checkedarr)+'&time_type_id='+timetype+'&frequency_id='+frequency+'&quota='+quota+'&balance='+balance+'&nxtexpiry='+nxtexpiry+'&expirylot='+expirylot,
        				success : function(data) {
        					if(data=="success"){
    							window.location.reload();
    						}else{
    							sweet_alert(data);
								return false;
    						}

        				},error: function(data) {
       						sweet_alert("Error while adding Absence quota.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding Absence quota.");
								return false;
        					}
      					}

        			});


  	});
			/*
				$('.mptlupdate').click(function(e){

					var lastemppanel=$('.emppanel.panel-collapse.collapse.in').attr('id');localStorage.setItem('lastemppanel', lastemppanel);

					//<!--alert if pay component value is null  --->
					// if($("#pay-component-value").is(":disabled")){
//
					// }else{
						// if(($("#pay-component-value").val().trim()=="") || ($("#pay-component-value").val().trim()==null)){
							// sweet_alert("Please enter pay component value.");
							// return false;
						// }
					// }

    				//get input value
    				var id = $("#id").val();

					var emp = $("#empdatabiographies-id").val();
					var paycomp=$("#paycomponent").val();
    				var startdate = $("#start-date").val();
					var enddate = $("#end-date").val();

					if (emp=="" || emp==null){
						sweet_alert("Please select a Employee.");
						return false;
					}else if (paycomp=="" || paycomp==null){
						sweet_alert("Please select a paycomponent.");
						return false;
					}else if (startdate=="" || startdate==null || enddate=="" || enddate==null){
						sweet_alert("Please select Start/End Date.");
						return false;
					}else{


						if(!(compareStartEndDate(startdate,enddate))){
    						sweet_alert("Please ensure that the End Date is greater than or equal to the Start Date.");
							return false;
    					}

    					if(!(checkPayComponentDate(paycomp,startdate,enddate))){
    						sweet_alert("Start/End Date is earlier/older than than the start/end date of the selected pay component.");
							return false;
    					}

						$.ajax({
        				type: "POST",
      					url: '/PayrollData/checkPayComponentExistence',
        				data: 'employee='+emp+'&id='+id+'&paycomponent='+paycomp+'&startdate='+startdate+'&enddate='+enddate,
        				success : function(data) {
        					if(data=="success"){
        						document.getElementById("editprdataform").submit();
    							return true;
    						}else{
    							sweet_alert(data);
								return false;
    						}

        				},error: function(data) {
       						sweet_alert("Error while editing PayComponents.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while editing PayComponent's.");
								return false;
        					}
      					}

        			});
        			return false;
					}
					// return false;
				});*/


				//save btn onclick
				$('#mptlsave').click(function(){

					var lastemppanel=$('.emppanel.panel-collapse.collapse.in').attr('id');localStorage.setItem('lastemppanel', lastemppanel);

    				//get input value
					var emp = $("#employee-id").val();
					var timetype = $('#time-type-id').val();
					var frequency = $('#frequency-id').val();
					var quota=$("#quota").val();
    				var balance=$("#balance").val();
    				var nxtexpiry = $("#nxtexpiry").val();
					var expirylot = $("#expirylot").val();

					if (emp=="" || emp==null){
						sweet_alert("Please select a Employee.");
						return false;
					}
					if (timetype=="" || timetype==null){
						sweet_alert("Please select a timetype.");
						return false;
					}
					if (frequency=="" || frequency==null){
						sweet_alert("Please select a frequency.");
						return false;
					}
					if (quota=="" || quota==null){
						sweet_alert("Please enter the quota.");
						return false;
					}
					if (nxtexpiry=="" || nxtexpiry==null){
						sweet_alert("Please enter the next expiry date.");
						return false;
					}

					$.ajax({
        				type: "POST",
      					url: '/AbsenceQuota/addData',
        				data: 'employee='+emp+'&time_type_id='+timetype+'&frequency_id='+frequency+'&quota='+quota+'&balance='+balance+'&nxtexpiry='+nxtexpiry+'&expirylot='+expirylot,
        				success : function(data) {
        					if(data=="success"){
    							window.location.reload();
    						}else{
    							sweet_alert(data);
								return false;
    						}

        				},error: function(data) {
       						sweet_alert("Error while adding Absence quota.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while adding Absence quota.");
								return false;
        					}
      					}

        			});


  				});


				//select all add batch
				$(".selectallbtn").click(function (event) {
					$(".paygroup_filter").prop('checked', true);
				});

				//group delete btn onclick
				$('.maindiv').on('click', 'a.groupdelete', function() {

					$(".pcaddbtn").show();$(".pcgroupaddbtn").show();
					var selectedcontrol=$(this);
					sweet_confirmdelete("MayHaw","Are you sure you want to delete the particular Pay Component Group ?", function(){selectedcontrol.parent().closest('div .groupclass').remove(); return true;});
				});
				//pay component delete btn onclick
				$('.maindiv').on('click', 'a.compdelete', function() {
					$(".pcaddbtn").show();$(".pcgroupaddbtn").show();

					var selectedcontrol=$(this);
					sweet_confirmdelete("MayHaw","Are you sure you want to delete the particular Pay Component ?", function(){selectedcontrol.parent().closest('div .componentclass').remove(); return true;});
				});
				//initialise datepicker
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
	});




$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
});

function toggleChevron(e) {

    $(e.target)
        .prev('.box-header')
        .find(".more-less")
        .toggleClass('fa-plus fa-minus');
}

function searchabsentquota(){
	// $(".mptlpanel").hide();
	var input = document.getElementById('absentquotasearch');
    var filter = input.value.toUpperCase();


	$('.mptlpanel').each(function(){

		var selectedcontrol=$(this);
		var a = $(this).find(".box-title").text();
        if (a.toUpperCase().indexOf(filter) > -1) {
            selectedcontrol.show();
        } else {
            selectedcontrol.hide();
        }
	});

}

function formattoymd(inputDate) {
    	var date = new Date(inputDate);
    	if (!isNaN(date.getTime())) {
        	var day = date.getDate().toString();
        	var month = (date.getMonth() + 1).toString();
        	// Months use 0 index.

        	return date.getFullYear()  + '/' +
        	(month[1] ? month : '0' + month[0]) + '/' +
        	(day[1] ? day : '0' + day[0]) ;
    	}
	}
	function batchdeletequota(timetypeid){

		if ($('.paygroup_filter:checkbox:checked').length <1){
			// alert("Please select a Paygroup.");
			sweet_alert("Please select a Paygroup.");
			return false;
		}
		var checkedarr=[];
    	$('.paygroup_filter').each(function () {

		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var colid=id.split("_")[1];
		    if(sThisVal){
					checkedarr.push(colid);
		    }
	   	});
	   	sweet_confirmdelete("MayHaw","Are you sure you want to delete the particular Timetype quota in batch ?", function(){

	   	$.ajax({
        	type: "POST",
      		url: '/AbsenceQuota/batchdeleteQuota',
        	data: 'checkedarr='+JSON.stringify(checkedarr)+'&timetypeid='+timetypeid,
        	success : function(data) {
        		if(data=="success"){
    				window.location.reload();
    			}else if(data=="payrolllocked"){
    				sweet_alert("Payroll under processing.Please try again.");
					return false;
    			}else{
    				sweet_alert("Error while removing Timetype in batch.");
					return false;
    			}
        	},error: function(data) {
       			sweet_alert("Error while removing Timetype in batch.");
				return false;
        	},statusCode: {
        		500: function() {
          			sweet_alert("Error while removing Timetype in batch.");
					return false;
        		}
      		}

        });
       });

	}
	function empdeletequota(empid){

	   	$.ajax({
        	type: "POST",
      		url: '/AbsenceQuota/empdeleteQuota',
        	data: 'empid='+empid,
        	success : function(data) {
        		if(data=="success"){
    				window.location.reload();
    			}else if(data=="payrolllocked"){
    				sweet_alert("Payroll under processing.Please try again.");
					return false;
    			}else{
    				sweet_alert("Error while deleting the particular employee's Absence Quota.Please try again.");
					return false;
    			}
        	},error: function(data) {
       			sweet_alert("Error while deleting the particular employee's Absence Quota.Please try again.");
					return false;
        	},statusCode: {
        		500: function() {
          			sweet_alert("Error while deleting the particular employee's Absence Quota.Please try again.");
					return false;
        		}
      		}

        });

	}
</script>
<?php $this->end(); ?>
