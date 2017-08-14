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

/*differentiate months in calendar*/
	.fc-months-view .fc-day-number{font-size:15px;font-weight:400;}
	.fc-months-view .blurredmonth{color: #d2b4de;}
	.fc-months-view .firstmonth{color: #2eb6c1;}
	.fc-months-view .secmonth{color: #884ea0;}
	.fc-months-view .thirdmonth{color: #2eb6c1;}
/*differentiate months in calendar*/
</style>
<?php if($notificationcontent!='' && $notificationcontent!=null && isset($notificationcontent)){  ?>
<section class="content-header">
	<h1>Leave Management</h1>
</section>

<section class="content">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li id="leaveapprovalli" class="active"><a href="#leaveapproval" data-toggle="tab" aria-expanded="true">Leave Approval</a></li>
   		<li id="myleavesli" class=""><a href="#myleaves" data-toggle="tab" aria-expanded="false">My Leaves</a></li>
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


								// for ($y = 0; $y < count($notificationcontent[$x]); $y++) {
								// if(isset($notificationcontent[$x]) && $notificationcontent[$x]!=null){

								for ($t = 0; $t < count($notificationcontent[$x]['employee_absencerecords']); $t++) {
								if(isset($notificationcontent[$x]['employee_absencerecords'][$t]) && $notificationcontent[$x]['employee_absencerecords'][$t]!=null){

                        	?>
                        	<div style="border-bottom: 1px solid #f4f4f4;">

							<div class="col-md-12">
								
								<?php $picname = str_replace('"', '',$this->Country->get_employeepicture($notificationcontent[$x]['employee_absencerecords'][$t]['emp_data_biographies_id']));
								 		if(isset($picname) && ($picname!='')){$picturename=$picname;}
                            				
											
											if (file_exists(WWW_ROOT.'img'.DS.'uploadedpics'.DS.$picturename)){
												echo $this->Html->image('/img/uploadedpics/'.$picturename, array('class' => 'img-circle empimg', 'alt' => 'User profile picture'));
											}else{
												echo $this->Html->image('/img/uploadedpics/defaultuser.png', array('class' => 'img-circle empimg', 'alt' => 'User profile picture'));
											}
									?>
								
								<a href="javascript:void(0)" class="product-title"><?php $empname = str_replace('"', '',$this->Country->get_employeename($notificationcontent[$x]['employee_absencerecords'][$t]['emp_data_biographies_id']));
                            		echo $empname; ?></a>

                            		<span style="color:#333"> Applied <b><?php $timetype = str_replace('"', '', json_encode($notificationcontent[$x]['employee_absencerecords'][$t]['time_type']['name'])); echo  $timetype; ?></b> for
                            			<?php  $startdate = $notificationcontent[$x]['employee_absencerecords'][$t]['start_date'];
                            						$enddate = $notificationcontent[$x]['employee_absencerecords'][$t]['end_date'];
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
                            			<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['start_date']; ?> to
										<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['end_date']; ?>

                            		</span>
								
							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
							<div class="col-md-12">
								
								<div class="form-group textarea">
									<div class="col-md-12">
									<label class="control-label" for="description">Comment:</label>
									</div>
									<div class="col-md-6">
                            			<textarea class="form-control" name="comment" id="comment<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['workflow_id'] ?>" style="height:70px;width:100%;"></textarea>
                            		</div>
                            		<div class="col-md-6" style="height:70px;">
										<input type="button" value="Reject" class="mptlreject btn btn-danger" id=<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['workflow_id'] ?>>
                                		<input type="button" value="Approve" class="mptlapprove btn btn-success" id=<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['workflow_id'] ?>>							
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
                            		<a href="javascript:void(0)" class="product-title"><?php $empname = str_replace('"', '',$this->Country->get_employeename($notificationcontent[$x]['employee_absencerecords'][$t]['emp_data_biographies_id']));
                            		echo $empname; ?>

                            		<span style="color:#333">Applied <b><?php $timetype = str_replace('"', '', json_encode($notificationcontent[$x]['employee_absencerecords'][$t]['time_type']['name'])); echo  $timetype; ?></b> for
                            			<?php  $startdate = $notificationcontent[$x]['employee_absencerecords'][$t]['start_date'];
                            						$enddate = $notificationcontent[$x]['employee_absencerecords'][$t]['end_date'];
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
                            			<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['start_date']; ?> to
										<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['end_date']; ?>

                            		</span>
                            		
                            		<div class="form-group textarea"><label class="control-label" for="description">Description</label>
                            			<textarea name="description" id="description" class="form-control" rows="3"></textarea></div>
                            	
                            	</div>
                            </div>
                            <div class="col-sm-3" style="margin-top:10px">
                              <input type="button" value="Reject" class="mptlreject btn btn-danger" id=<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['workflow_id'] ?>>
                              <input type="button" value="Approve" class="mptlapprove btn btn-success" id=<?php echo $notificationcontent[$x]['employee_absencerecords'][$t]['workflow_id'] ?>>
                            </div>
                            </li> -->
                            <?php } }    } } ?>
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
        <div class="col-md-3 well">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Request a Leave</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
              	<?php foreach ($timeTypes as $vals) { ?>
                <div class="external-event bg-yellow ui-draggable ui-draggable-handle" id="<?php echo $vals['id']; ?>"><?php echo $vals['name']; ?></div>
               <?php } ?>
              </div>
               <p class="text-muted"><i class="fa fa-info-circle"></i> Drag & Drop to a particular day to request a leave. </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
           <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-eventsd">
                <div class="external-event bg-light-blue">Holidays</div>
                <div class="external-event bg-red">Absent</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>
        <!-- /.col -->
        <div class="col-md-7">
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
	<div class="clearfix" style=" padding-left: 15px; padding-right: 15px; ">

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

var holidaysarr=<?php echo $holidaysarr ?>;
var holidayevents = [];
var holidays = [];
$.each(holidaysarr, function(key, value) {
	holidays.push(new Date(value).toUTCString());
});
// console.log(holidays);

var absentsarr=<?php echo $absentsarr ?>;
var absents = [];
$.each(absentsarr, function(key, value) {
	absents.push(new Date(value).toUTCString());
});

var absentrequestsarr=<?php echo $absentrequestsarr ?>;
var getEvent = []; 
$.each(absentrequestsarr, function(key, value) {

	var enddate = new Date(value['enddate']);
	// add a day
	enddate.setDate(enddate.getDate() + 1);
	
    // inserting data from database to getEvent array
    var insertEvents = {};
        insertEvents =
        {
        	id:value['id'],
            title: value['title'],
            start: new Date(value['startdate']),
            end: enddate,
            allDay:true
        }
    getEvent.push(insertEvents);

});

var myleaves=<?php echo $jsonencodedmyleaves ?>;

// console.log(getEvent);	
var startdate="";
var enddate="";

$(function () {

	var annualallotment=0;
	$(".mptlcol").addClass("col-md-9");$(".mptlcol").removeClass("col-md-12");
	var leavestatushtml='<div class="col-md-3"><div class="box box-primary"><div class="box-header with-border"><h3 class="box-title">My Leaves</h3></div><div class="box-body">';
	for (index = 0; index < myleaves.length; index++) {
		var percentage=0;percentage=(myleaves[index]['leavecount']/myleaves[index]['quota'])*100;
		var colorstring="progress-bar-aqua";
		(percentage>50) ? colorstring="progress-bar-red" : colorstring="progress-bar-green" ;
		
    	leavestatushtml+='<div class="progress-group"><span class="progress-text">'+myleaves[index]['timetype']+'</span><span class="progress-number"><b>'+myleaves[index]['leavecount']+'</b>/'+myleaves[index]['quota']+'</span>';
		leavestatushtml+='<div class="progress sm"><div class="progress-bar '+colorstring+'" style="width: '+percentage+'%"></div></div></div>';
		annualallotment+=myleaves[index]['quota'];
	}
	
	
	leavestatushtml+='</div><div class="box-footer">Annual Allotment<span class="pull-right text-green">'+annualallotment+'</span></div></div></div>';
	
	$(".mptlrow").append(leavestatushtml);


    
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
        right: 'months,month,agendaWeek,agendaDay'
      },
      
      // defaultView: 'months',
      views: {
        months: {
            type: 'basic',
            duration: { months: 3 },
            buttonText: '3 months'
        }
    },
    eventAfterAllRender: function (view) {
    	var counter=0;
        if ($('.fc-day-number').length > 0) {
            $('.fc-months-view .fc-day-number').each(function (i, item) {
            	var str=item.getAttribute("data-date");var date=new Date(str);  //converts the string into date object
            	var m=date.getMonth()+1; //get the value of month
            	var d=date.getDate(); //console.log(d);
  				
  				if(d==1){counter++;}
  				if(counter==1){$(this).addClass('firstmonth');}
  				else if(counter==2){$(this).addClass('secmonth');}
  				else if(counter==3){$(this).addClass('thirdmonth');}
  				else{$(this).addClass('blurredmonth');}
  				
    			var monthname=moment(m, 'MM').format('MMM');
     
                var title = item.title;
                item.innerText = d + ' ' + monthname ;
                // $(this).css('font-size', '14px'); //$(this).css('font-weight', '100');
            });
        }
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
      drop: function (date, allDay, ui, res) { // this function is called when something is dropped

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
			startdate=date.format("MM/DD/YYYY");
        	enddate=date.format("MM/DD/YYYY");
		}
        
        var component=$( this ).attr('id');
		addleave(startdate,enddate,component);
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
			startdate=event.start.format("MM/DD/YYYY");
			if(event.end!=null && event.end!=""){
				var tempdate=new Date(event.end.format());
				tempdate.setDate(tempdate.getDate()-1);
        		enddate=formattomdy(tempdate);
			}else{
				enddate=event.start.format("MM/DD/YYYY");
			}
        	
		}
		
        // $(this).attr("data-id", "1");
		// $('#actionspopover').modal();
		// $("#editpopover .modal-content #editid").val(event.id);
		// $('#editpopover').modal();
		editleave(event.id,startdate,enddate,revertFunc);
      },
      events:getEvent,
      eventColor: '#f39c12',
      eventClick: function(event, jsEvent, view) {

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
			startdate=event.start.format("MM/DD/YYYY");
			if(event.end!=null && event.end!=""){
				var tempdate=new Date(event.end.format());
				tempdate.setDate(tempdate.getDate()-1);
        		enddate=formattomdy(tempdate);
			}else{
				enddate=event.start.format("MM/DD/YYYY");
			}
        	
		}
		
        // $("#editpopover .modal-content #editid").val(event.id);
		// $('#editpopover').modal();

    },dayRender: function (date, cell) {
      	var d = new Date(date);//console.log(d);
        if ((absents.indexOf(d.toUTCString()) > -1)) {
            cell.css("background-color", "#dd4b39");
        }
        if ((holidays.indexOf(d.toUTCString()) > -1)) {
            cell.css("background-color", "#3c8dbc");
        }
     },
      eventRender: function(event, element) {
            element.append( "<div style='position:absolute;bottom:0px;right:0px;'><i class='closeon fa fa-1x fa-times'></i></div>" );
            element.find(".closeon").click(function(e) {
            	e.stopPropagation();
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
			startdate=event.start.format("DD/MM/YYYY");
			enddate=formattodmy(tempdate);
		}else{
        	startdate=event.start.format("MM/DD/YYYY");
			enddate=formattomdy(tempdate);
		}
		
		// $("#editpopover .modal-content #editid").val(event.id);
		// $('#editpopover').modal();
		editleave(event.id,startdate,enddate,revertFunc);
		
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
    	table.ajax.reload(null,false);
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

/*
	$("#actionspopover").on("show.bs.modal", function(e) {
		//loading icon show
		if(e.relatedTarget!=null){$('#loadingmessage').show();}console.log(e);
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
    			
				if(userdf==1){
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}else{
					$('.mptldp').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}
	    		//select 2
    			$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
    			
    			$(".mptldp").datepicker().on('show.bs.modal', function(event) {
					// prevent datepicker from firing bootstrap modal "show.bs.modal"
					event.stopPropagation();
				});
    			
    			$('.mptladd').click(function(e){
    				var startdate = $("#start-date").val();
    				var enddate = $("#end-date").val();
    				if(startdate=="" || startdate==null || enddate=="" || enddate==null){
    					sweet_alert("Start/End Date missing.");
						return false;
    				}

					if(!(compareStartEndDate(startdate,enddate))){
    					sweet_alert("Please ensure that the End Date is greater than or equal to the Start Date.");
						return false;
    				}
 				});
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
		if(e.relatedTarget!=null){$('#loadingmessage').show();}
		var link = $(e.relatedTarget);
		var editid=$("#editpopover .modal-content #editid").val();console.log($("#editpopover .modal-content #editid"));
		$(this).find(".modal-body").load("/EmployeeAbsencerecords/edit/"+editid,function( response, status, xhr ){
			//loading icon hide
			if(e.relatedTarget!=null){$('#loadingmessage').hide();}
			if ( status == "error" ) {
				var msg = "Sorry but there was an error.";
				sweet_alert(msg);
			}else{
				$("#start-date").val(startdate);
    			$("#end-date").val(enddate);
    			
				if(userdf==1){
					$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}else{
					$('.mptldp').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
				}
	    		//select 2
    			$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
    			
				$(".mptldp").datepicker().on('show.bs.modal', function(event) {
					// prevent datepicker from firing bootstrap modal "show.bs.modal"
					event.stopPropagation();
				});
				
				$('.mptlupdate').click(function(e){
					var startdate = $("#start-date").val();
    				var enddate = $("#end-date").val();
    				if(startdate=="" || startdate==null || enddate=="" || enddate==null){
    					sweet_alert("Start/End Date missing.");
						return false;
    				}

					if(!(compareStartEndDate(startdate,enddate))){
    					sweet_alert("Please ensure that the End Date is greater than or equal to the Start Date.");
						return false;
    				}
				});
				
			
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
	*/
	
	
	
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
	
	
	
function addleave(startdate,enddate,component){
	$.ajax({
        				type: "POST",
      					url: '/EmployeeAbsencerecords/addLeave',
        				data: 'startdate='+startdate+'&enddate='+enddate+'&component='+component,
        				success : function(data) {refreshCalendar();
        					if(data=="success"){
        						// refreshCalendar();
    							// return false;
    						}else if(data=="payrolllocked"){
    							sweet_alert("Payroll under processing.Please try again.");
								return false;
    						}else{
    							sweet_alert("Error");
								return false;
    						}
        				},error: function(data) {refreshCalendar();
       						sweet_alert("Error while Requesting Leave.");
							return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while Requesting Leave.Please try again later.");
								return false;
        					}
      					}
        			});
}
function editleave(leaveid,startdate,enddate,revertFunc){
	$.ajax({
        				type: "POST",
      					url: '/EmployeeAbsencerecords/editLeave',
        				data: 'startdate='+startdate+'&enddate='+enddate+'&leaveid='+leaveid,
        				success : function(data) {refreshCalendar();
        					if(data=="success"){
        						$('#calendar').fullCalendar('rerenderEvents');
    							return false;
    						}else if(data=="payrolllocked"){
    							sweet_alert("Payroll under processing.Please try again.");
								return false;
    						}else{
    							sweet_alert(data);console.log(data);
								return false;
    						}
        				},error: function(data) {refreshCalendar();
       						sweet_alert("Error while editing Leave Request.");
							// return false;

        				},statusCode: {
        					500: function() {
          						sweet_alert("Error while editing Leave Request.Please try again later.");
								return false;
        					}
      					}
        			});
}
	function refreshCalendar(){
	
	$('#calendar').fullCalendar('removeEvents');
	
		$.ajax({
        	type: "POST",
    		url: '/EmployeeAbsencerecords/loadEvents',
   			success : function(data) {

				var absentrequestsarr=JSON.parse(data);
				var getEvent = []; 
				$.each(absentrequestsarr, function(key, value) {

					var enddate = new Date(value['enddate']);
					// add a day
					enddate.setDate(enddate.getDate() + 1);
	
   					 // inserting data from database to getEvent array
    				var insertEvents = {};
        			insertEvents =
        			{
        				id:value['id'],
            			title: value['title'],
            			start: new Date(value['startdate']),
           	 			end: enddate,
           				allDay:true
        			}
    				getEvent.push(insertEvents);

				});
				$("#calendar").fullCalendar( 'addEventSource', getEvent );

        	},error: function(data) {
       			sweet_alert("Error while fetching events.");
				return false;
			}
        });	
	}
</script>
<?php $this->end(); ?>



<div class="modal fade" id="editpopover" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          	<input type="hidden" name="editid" id="editid" value=""/>
              <div class="modal-body" style="padding:0px;">
            	
			  </div>
			  
			  

          </div>
      </div>
</div>

