<section class="content-header">
  <h1>
    Holidays
  </h1>
  <ol class="breadcrumb">
    <li>
    <li><a href="<?php echo $this->Url->build(array('controller' => 'Holidays', 'action' => 'add')); ?>">Add</a></li>
    </li>
  </ol>
</section>
            	
<!-- Main content -->
<section class="content">
    <div class="box box-primary">
    	<div class="box-body">
        		   
  		</div>
  	</div>

</section>
<!-- fullCalendar 2.2.5 -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<?php
$this->Html->css(['AdminLTE./plugins/fullcalendar/fullcalendar.min',], ['block' => 'css'],
						  ['AdminLTE./plugins/fullcalendar/fullcalendar.print',], ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/fullcalendar/fullcalendar.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBotton'); ?>
<script>
  $(function () {
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
      events: [
        {
          title: 'Christmas',
          start: new Date(y, m, 25),
          backgroundColor: "#f56954", //red
          borderColor: "#f56954" //red
        }
      ],
      editable: false,
      droppable: false, // this allows things to be dropped onto the calendar !!!
    });

  });
</script>
<?php $this->end(); ?> -->




