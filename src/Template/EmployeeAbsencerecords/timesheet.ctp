<?= $this->element('templateelmnt'); ?>

<section class="content-header">
      <h1>
        Time Sheet      </h1>
      
    </section>
<section class="content">
	<div class="row">
		
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">Work Schedule</div>
              </div>
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
                <div class="external-event bg-yellow" style="position: relative;">Holidays</div>
                <div class="external-event bg-red" style="position: relative;">Absent</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->   
                 
        </div>

        <div class="col-md-9">
			<div class="box box-primary">
				<div class="box-body no-padding">
					<!-- THE CALENDAR -->
            		<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>
	
</section>

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
// console.log(absents);
	
	
 $(function () {

	var action='<?php echo $this->request->params['action'] ?>';
		if(action=="timesheet"){
			var atag = $('a[href="/EmployeeAbsencerecords/timesheet"]');
			atag.parent().addClass('active');
			atag = $('a[href="/EmployeeAbsencerecords"]');
			atag.parent().removeClass('active');

		}
		
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
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week: 'week',
        day: 'day'
      },
      //Random default events
      events: holidayevents,
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

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      },dayRender: function (date, cell) {
      	var d = new Date(date);
        if ((absents.indexOf(d.toUTCString()) > -1)) {
            cell.css("background-color", "#dd4b39");
        }
        if ((holidays.indexOf(d.toUTCString()) > -1)) {
            cell.css("background-color", "#f39c12");
        }
     },
      eventRender: function(event, element) {
            element.append( "<div style='position:absolute;bottom:0px;right:0px;'><i class='closeon fa fa-1x fa-times'></i></div>" );
            element.find(".closeon").click(function() {
               $('#calendar').fullCalendar('removeEvents',event._id);
            });
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
    
    // var event={id:1 , title: 'New event', start:  new Date()};
	// $('#calendar').fullCalendar( 'renderEvent', event, true);
	
  });
</script>
 <?php $this->end(); ?>