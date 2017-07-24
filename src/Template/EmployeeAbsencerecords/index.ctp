<style>
 .blurdiv {
        opacity: .65;
}
#togglebutton{
  padding: 0px 0px;
  margin-top: -13px;
  margin-right: -10px;
  margin-bottom:0px
}
.empimg{
	width: 50px;
    height: 50px;
    border: 2px solid transparent;
    border-radius: 50%;
}
.mptlreject,.mptlapprove{
	height:35px;
	margin-top:34px;
}
</style>
<?php if($notificationcontent!='' && $notificationcontent!=null && isset($notificationcontent)){  ?>
<section class="content-header">
	<h1>Leave Management</h1>
</section>

<section class="content">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#leaveapproval" data-toggle="tab" aria-expanded="true">Leave Approval</a></li>
   		<li class=""><a href="#myleaves" data-toggle="tab" aria-expanded="false">My Leaves</a></li>
	</ul>
    <div class="tab-content" >

    	<div class="tab-pane active" id="leaveapproval" style="border: 1px solid #ddd;">
    		<section class="content-header">
  				<h1>Leave Approval</h1>
			</section>
			<section class="content">                        	                 	
				
				<!-- <div class="jumbotron" style="overflow: auto;"><?php echo json_encode($notificationcontent); ?></div> -->
				
                        	<?php $cnt=0; for ($x = 0; $x < count($notificationcontent); $x++) {
                        		if(isset($notificationcontent[$x]) && $notificationcontent[$x]!=null){


								for ($y = 0; $y < count($notificationcontent[$x]); $y++) {
								if(isset($notificationcontent[$x][$y]) && $notificationcontent[$x][$y]!=null){

								for ($t = 0; $t < count($notificationcontent[$x][$y]['employee_absencerecords']); $t++) {
								if(isset($notificationcontent[$x][$y]['employee_absencerecords'][$t]) && $notificationcontent[$x][$y]['employee_absencerecords'][$t]!=null){

                        	?>
                        	<div style="border-bottom: 1px solid #f4f4f4;">

							<div class="col-md-12">
								
								<?php $picname = str_replace('"', '',$this->Country->get_employeepicture($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));
								 		if(isset($picname) && ($picname!='')){$picturename=$picname;}
                            				
											
											if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
												echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'img-circle empimg', 'alt' => 'User profile picture'));
											}else{
												echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'img-circle empimg', 'alt' => 'User profile picture'));
											}
									?>
								
								<a href="javascript:void(0)" class="product-title"><?php $empname = str_replace('"', '',$this->Country->get_employeename($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));
                            		echo $empname; ?></a>

                            		<span style="color:#333"> Applied <b><?php $timetype = str_replace('"', '', json_encode($notificationcontent[$x][$y]['employee_absencerecords'][$t]['time_type']['name'])); echo  $timetype; ?></b> for
                            			<?php  $startdate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date'];
                            						$enddate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date'];
													if(isset($userdateformat)  && $userdateformat===1){
                            							$startdate = str_replace('/', '-', $startdate);
														$startdate = date('Y/m/d', strtotime($startdate));

														$enddate = str_replace('/', '-', $enddate);
														$enddate = date('Y/m/d', strtotime($enddate));
													}


                            						if($startdate!="" && $startdate!=null && $enddate!="" && $enddate!=null){
                            					    	$date1 = new DateTime($startdate);
												    	$date2 = new DateTime($enddate);
												    	$diff = $date2->diff($date1)->format("%a");
												    	echo $diff+1;
													}
										?>
                            			 day(s) from
                            			<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date']; ?> to
										<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date']; ?>

                            		</span>
								
							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
							<div class="col-md-12">
								
								<div class="form-group textarea">
									<div class="col-md-12">
									<label class="control-label" for="description">Comment:</label>
									</div>
									<div class="col-md-6">
                            			<textarea class="form-control" name="comment" id="comment<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>" style="height:70px;width:100%;"></textarea>
                            		</div>
                            		<div class="col-md-6" style="height:70px;">
										<input type="button" value="Reject" class="mptlreject btn btn-danger" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>
                                		<input type="button" value="Approve" class="mptlapprove btn btn-success" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>							
									</div>
                            	</div>								
							</div>
							</div>
							</div>
                       <!-- 	<li class="item" style="padding:10px;border-bottom: 1px solid #ddd;">
                              <div class="col-sm-9">
                            	<div class="product-img">
                    				<i class="fa fa-3x fa-calendar-minus-o text-aqua"></i>
                  				</div>
                            	<div class="product-info">
                            		<a href="javascript:void(0)" class="product-title"><?php $empname = str_replace('"', '',$this->Country->get_employeename($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));
                            		echo $empname; ?>

                            		<span style="color:#333">Applied <b><?php $timetype = str_replace('"', '', json_encode($notificationcontent[$x][$y]['employee_absencerecords'][$t]['time_type']['name'])); echo  $timetype; ?></b> for
                            			<?php  $startdate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date'];
                            						$enddate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date'];
													if(isset($userdateformat)  && $userdateformat===1){
                            							$startdate = str_replace('/', '-', $startdate);
														$startdate = date('Y/m/d', strtotime($startdate));

														$enddate = str_replace('/', '-', $enddate);
														$enddate = date('Y/m/d', strtotime($enddate));
													}


                            						if($startdate!="" && $startdate!=null && $enddate!="" && $enddate!=null){
                            					    	$date1 = new DateTime($startdate);
												    	$date2 = new DateTime($enddate);
												    	$diff = $date2->diff($date1)->format("%a");
												    	echo $diff+1;
													}
										?>
                            			 day(s) from
                            			<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date']; ?> to
										<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date']; ?>

                            		</span>
                            		
                            		<div class="form-group textarea"><label class="control-label" for="description">Description</label>
                            			<textarea name="description" id="description" class="form-control" rows="3"></textarea></div>
                            	
                            	</div>
                            </div>
                            <div class="col-sm-3" style="margin-top:10px">
                              <input type="button" value="Reject" class="mptlreject btn btn-danger" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>
                              <input type="button" value="Approve" class="mptlapprove btn btn-success" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>
                            </div>
                            </li> -->
                            <?php } }  } }  } } ?>
        	</section>
  		</div>

    	<div class="tab-pane" id="myleaves" style="border: 1px solid #ddd;">
<?php } ?>
        	<section class="content-header">
  				<h1>Leave Requests
    				<small>List  &nbsp;&nbsp;<a id="filterclear" style="cursor: pointer;text-decoration: underline;display:none;">Clear filter</a></small>
  				</h1>
  				<ol class="breadcrumb">
  					<a class="btn btn-sm btn-success btn-flat dtbtn"><i class="fa fa-list"></i> </a>
					<a class="btn btn-sm btn-success btn-flat calbtn"><i class="fa fa-calendar-plus-o"></i> </a>
  					<?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  				</ol>
			</section>
			
			
			<section class="content" id="calendarsection"  style="margin-top:20px; display: none;" aria-expanded="true">
				<div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Request a Leave</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Leave Request</div>
              </div>
               <p class="text-muted"><i class="fa fa-info-circle"></i> Drag & Drop to a particular day to request a leave. </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar" class="fc fc-ltr fc-unthemed"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    
			</section>
			
			
			
			<div id="normalsection"><section class="collapse in" id="infobar" style="margin-top:20px; ">
	<div class="clearfix">

		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow pendingdiv" style="cursor: pointer;">
          	<span class="info-box-icon"><i class="fa fa-list"></i></span>
            <div class=" infodiv info-box-content">
              <span class="info-box-text dd">Pending</span>
              <span class="info-box-number"><?php echo $reqcount; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  bg-green approveddiv" style="cursor: pointer;">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">Approved</span>
              <span class="info-box-number"><?php echo $approvedcount; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  bg-red denieddiv" style="cursor: pointer;">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">Rejected</span>
              <span class="info-box-number"><?php echo $rejcount; ?></span>
            </div>
          </div>
        </div>

				</div>
			</section>
			<?php echo $this->element('indexbasic', array('title' => 'Leave Requests')); ?>
			</div>
<?php if($notificationcontent!='' && $notificationcontent!=null){ ?>
  		</div>
              <!-- /.tab-pane -->

	</div>
   	<!-- /.tab-content -->
</div>

</section>
<?php } ?>

<!-- add popover -->
<?php echo $this->element('popoverelmnt'); ?>


<?php
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.min', ['block' => 'css']);
$this->Html->css('AdminLTE./plugins/fullcalendar/fullcalendar.print', ['block' => 'css', 'media' => 'print']);

$this->Html->script([
  'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
  'AdminLTE./plugins/fullcalendar/fullcalendar.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptIndexBottom'); ?>
<script>
var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;

var absentsarr=<?php echo $absentsarr ?>;
var getEvent = []; 
$.each(absentsarr, function(key, value) {

    // inserting data from database to getEvent array
    var insertEvents = {};
        insertEvents =
        {
        	id:value['id'],
            title: "Leave Request",
            start: new Date(value['startdate']),
            end: new Date(value['enddate']),
        }
    getEvent.push(insertEvents);

});
// console.log(getEvent);	
var startdate="";
var enddate="";

$(function () {
	$('#togglebutton').show();
	
	/* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear();
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        // day: 'day'
      },allDay: true,
      //Random default events
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar !!!
      drop: function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);


        
        if(userdf==1){
			startdate=date.format("DD/MM/YYYY");
        	enddate=date.format("DD/MM/YYYY");
		}else{
			startdate=date.format("YYYY/MM/DD");
        	enddate=date.format("YYYY/MM/DD");
		}
        
		$("#actionspopover .modal-body #popoverid").val("alert");
		$('#actionspopover').modal();
		// console.log(date.format()+"--"+allDay);
		
      },
      eventDrop: function(event, delta, revertFunc) {console.log(event);

 		if(userdf==1){
			startdate=event.start.format("DD/MM/YYYY");
			if(event.end!=null){
				var tempdate=new Date(event.end.format());
				tempdate.setDate(tempdate.getDate()-1);
        		enddate=formattodmy(tempdate);
        	}else{
        		enddate=startdate;
        	}
		}else{
			startdate=event.start.format("YYYY/MM/DD");
			if(event.end!=null && event.end!=""){
				enddate=event.end.format("YYYY/MM/DD");
			}else{
				enddate=event.start.format("YYYY/MM/DD");
			}
        	
		}
		
        $(this).attr("data-id", "1");
		// $('#actionspopover').modal();
		$("#editpopover .modal-body #editid").val(event.id);
		$('#editpopover').modal();

      },
      events:getEvent,
      eventColor: '#f39c12',
      eventRender: function(event, element) {
            element.append( "<div style='position:absolute;bottom:0px;right:0px;'><i class='closeon fa fa-1x fa-times'></i></div>" );
            element.find(".closeon").click(function() {
            	sweet_confirm("MayHaw","Are you sure you want to delete the leave request ?", function(){
            		
            		$.ajax({
        				type: "POST",
        				url: '/EmployeeAbsencerecords/deleteLeaveRequest',
        				data: 'id='+event._id,
        				success : function(data) {
        					if(data=="success"){
        						$('#calendar').fullCalendar('removeEvents',event._id);
        					}else if(data=="payrolllocked"){
    							sweet_alert("Payroll under processing.Please try again.");
								return false;
    						}else{
    							sweet_alert("Couldn't delete the particular leave request.Please try again.");
								return false;
    						}
    					},
        				error : function(data) {
            				sweet_alert("Couldn't delete the particular leave request.Please try again later.");
            				return false;
        				}
    				});
    		
               
               });
               
            });
      },
      eventResize: function(event,dayDelta, delta, revertFunc) {
		
		var tempdate=new Date(event.end.format());
		tempdate.setDate(tempdate.getDate()-1);
		// console.log(formattodmy(tempdate));
		
		if(userdf==1){
			enddate=formattodmy(tempdate);
		}else{
			enddate=date.format("YYYY/MM/DD");
		}
		
		$("#editpopover .modal-body #editid").val(event.id);
		$('#editpopover').modal();
		
		
        // alert(event.title + " end is now " + event.end.format());
        // if (!confirm("is this okay?")) {
            // revertFunc();
        // }
		
    } 

    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function (e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
    });
    $("#add-new-event").click(function (e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
    
    //loading leave requests from db
    // var event=[];
    // $.each( absents, function( key, value ) {
  		// event.push({id:key+1 , title: 'Leave Request', start:  new Date(value)});
	// });

    // {id:1 , title: 'Leave Request', start:  new Date()};
	// $('#calendar').fullCalendar( 'renderEvent', event, true);
	

	
	$('.calbtn').click(function(){
		$('#calendarsection').show();
		$('#normalsection').hide();
		
		$('#calendar').fullCalendar('render');
		
	});
	$('.dtbtn').click(function(){
		$('#calendarsection').hide();
    	$('#normalsection').show();
	});

	$('div.pendingdiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData?filter=pending').load();
    	$('a#filterclear').show();
	});
	$('div.approveddiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData?filter=approved').load();
    	$('a#filterclear').show();
	});
	$('div.denieddiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData?filter=denied').load();
    	$('a#filterclear').show();
	});

	$('a#filterclear').click(function(){
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData').load();
    	$('a#filterclear').hide();
    	$(".info-box").removeClass("blurdiv");
	});


	//reject btn onclick
	$('.mptlreject').click(function(){
    	//get input value
		var btnid = this.id;
		var comnt = $('#comment'+btnid).val();

    	$.get('/EmployeeAbsencerecords/denyLeaveRequest?id='+btnid + '&description='+comnt, function(d) {
   		 	if(d=="success"){
   		 		window.location.reload();
   		 	}
    	});
	});

	//reject btn onclick
	$('.mptlapprove').click(function(){
    	//get input value
		var btnid = this.id;
		var comnt = $('#comment'+btnid).val();

    	$.get('/EmployeeAbsencerecords/approveLeaveRequest?id='+btnid + '&description='+comnt, function(d) {
   		 	if(d=="success"){
   		 		window.location.reload();
   		 	}
    	});
	});


	$("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}console.log($("#actionspopover .modal-body #popoverid").val());
		var link = $(e.relatedTarget);
		$(this).find(".modal-body").load("/EmployeeAbsencerecords/add",function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				// bootbox_alert(msg).modal('show');
				sweet_alert(msg);
			}else{
				$("#start-date").val(startdate);
    			$("#end-date").val(enddate);
    			
				// if(userdf==1){
					// $('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				// }else{
					// $('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
				// }
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
	
	
	
	$("#editpopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}console.log($("#editpopover .modal-body #editid").val());
		var link = $(e.relatedTarget);
		var editid=$("#editpopover .modal-body #editid").val();
		$(this).find(".modal-body").load("/EmployeeAbsencerecords/edit/"+editid,function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				// bootbox_alert(msg).modal('show');
				sweet_alert(msg);
			}else{
				$("#start-date").val(startdate);
    			$("#end-date").val(enddate);
    			
				// if(userdf==1){
					// $('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				// }else{
					// $('.mptldp').datepicker({ format:"yyyy/mm/dd",autoclose: true,clearBtn: true,todayHighlight: true });
				// }
	    		//select 2
    			$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
    			
    			
    			
				//hide popover on button click
				$( ".popoverDelete" ).click(function() {
					$('#editpopover').modal('hide');
				});
			}
		});
	});


	$('#editpopover').on('hidden.bs.modal', function (e) {
	  $('.modal-body', this).empty();
	})
	
	
});
function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){var dataid=$(this).attr('data-id');
       $("#ajax_button").html("<form name='formdelete' id='formdelete"+dataid+"' method='post'  action='/<?php echo $this->request->params['controller'] ?>/delete/"+dataid+"' style='display:none;'><input type='hidden' name='_method' value='POST'></form><a href='#' onclick='document.getElementById(&quot;formdelete"+dataid+"&quot;).submit();' class='btn btn-outline'>Confirm</a>");
      $("#trigger").click();
    });

    $("#mptlindextbl tbody").find('tr').each(function () {

    	if($(this).find('td:eq(1)').html()=="0"){
    		$(this).find('td:eq(1)').html('<span class="label label-warning">Pending</span>');
    	}else if($(this).find('td:eq(1)').html()=="1"){
    		$(this).find('td:eq(1)').html('<span class="label label-success">Approved</span>');
    	}else if($(this).find('td:eq(1)').html()=="2"){
    		$(this).find('td:eq(1)').html('<span class="label label-danger">Rejected</span>');
    	}

    	$(this).find('td').each (function() {
        var innerHtml=$(this).find('div.mptldtbool').html();
        // true/false instead of 1/0
        (innerHtml=="1") ? $(this).find('div.mptldtbool').html("True") : $(this).find('div.mptldtbool').html("False");
        });
    });
}

function formattodmy(inputDate) {
    	var date = new Date(inputDate);
    	if (!isNaN(date.getTime())) {
        var day = date.getDate().toString();
        var month = (date.getMonth() + 1).toString();
        // Months use 0 index.

        return (day[1] ? day : '0' + day[0]) + '/' + 
        	(month[1] ? month : '0' + month[0]) + '/' +           
           date.getFullYear();
    	}
	}
</script>
<?php $this->end(); ?>



<div class="modal fade" id="editpopover" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          	
              <div class="modal-body" style="padding:0px;">
            	<input type="hidden" name="editid" id="editid" value=""/>
			  </div>
			  
			  

          </div>
      </div>
</div>

