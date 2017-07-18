<style>
	.w100, .toggle{
		width:100%;
	}
</style>
<section class="content-header">
  <h1>
    Attendance
  </h1>
  
</section>

<section class="content">
<div class="row">
	
	<div class="col-md-4">
		<div class="box box-primary">
		<div class="box-body" >
		<div class="row">
			
			<div class="col-md-12">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?php echo date("d M Y"); ?></h5>
                    <span class="description-text"></span>
                    <div id="clock"> </div>
                  </div>
                  <!-- /.description-block -->
            </div>
                
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="input-group">
					<input data-width="100%;" type="checkbox" data-toggle="toggle" id="clockin" data-offstyle="success" data-onstyle="danger" data-off="<i class='fa fa-clock-o p3'></i> Clock In" data-on="<i class='fa fa-clock-o p3'></i> Clock Out">
				</div>
			</div>
		</div>
		</div>
	</div>
	
	<!-- <div class="clearfix">

		<div class="col-md-12">
          <div class="info-box bg-yellow pendingdiv" style="cursor: pointer;">
          	<span class="info-box-icon"><i class="fa fa-list"></i></span>
            <div class=" infodiv info-box-content">
              <span class="info-box-text dd">Show Last Five</span>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="info-box  bg-green approveddiv" style="cursor: pointer;">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">This week</span>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="info-box  bg-red denieddiv" style="cursor: pointer;">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">This month</span>
            </div>
          </div>
        </div>

				</div> -->
				
	</div>
	
	<div class="col-md-8">			
	<div class="box box-primary">
		<div class="box-body" style="min-height:500px;">
		<section class="collapse in">
			
			<div class="col-md-4"><div class="form-group text">
             			<div class="input-group">
             				<select class="form-control select2" id="attendancefilter">
  								<option value="five">Show last five</option>
  								<option value="week">Show this week</option>
  								<option value="month">Show this month</option>
							</select>
             			</div></div></div>
             			
			<?php echo $this->element('indexbasic', array('title' => 'Leave Requests')); ?>
		</section>
		</div>
	</div>
	</div>
	
</div>
</section>

<?php
date_default_timezone_set('UTC');
?>

<?php $this->start('scriptIndexBottom'); ?>
<script>
 var d = new Date(<?php echo time() * 1000 ?>);
function digitalClock() {
  d.setTime(d.getTime() + 1000);
  var hrs = d.getHours();
  var mins = d.getMinutes();
  var secs = d.getSeconds();
  mins = (mins < 10 ? "0" : "") + mins;
  secs = (secs < 10 ? "0" : "") + secs;
  var apm = (hrs < 12) ? "am" : "pm";
  hrs = (hrs > 12) ? hrs - 12 : hrs;
  hrs = (hrs == 0) ? 12 : hrs;
  var ctime = hrs + ":" + mins + ":" + secs + " " + apm;
  document.getElementById("clock").firstChild.nodeValue = ctime;
}
window.onload = function() {
  digitalClock();
  setInterval('digitalClock()', 1000);
}

$(function() {
	
	var clockstatus=<?php echo $clockstatus ; ?>;
	if(clockstatus){
		$('#clockin').bootstrapToggle('on');
	}
	
	table.column(3).visible( false );
	
	//filter onchange
	$('#attendancefilter').change(function() {
		table.ajax.url('/Attendance/ajaxData?filter='+this.value).load();
	});
	//lock/unlock payroll
	$('#clockin').change(function() {

		// sweet_confirm("MayHaw","Confirm ?", function(){
      		$.ajax({
        		type: "POST",
        		url: '/Attendance/clockinout',
        		data: 'clockstatus='+$(this).prop('checked'),
        		success : function(data) {
        			table.ajax.reload(null,false);
            		return false;
    			},
        		error : function(data) {
            		sweet_alert("Error while clock in/out.");
            		return false;
        		}
    		});
 		// },function(){console.log("ddd");
 			// alert();
 		// });
    });
});
 </script>
 <?php $this->end(); ?>