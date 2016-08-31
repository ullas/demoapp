<style>
.timeline {
  height: 15px;
  /*margin: 1em;*/
  /*line-height: 250px;*/
  position: relative;
  text-align: center;
}
.timeline:before {
  content: '';
  position: absolute;
  width: 100%;
  top: 61%;
  /*left: 6%;*/
   height: 4px;
  /*margin-top: -36px;*/
  background: #ddd;
  left:0px;
}
.timeline-badge{
	color:#FFFFFF;
	padding:4px 0px 0px;
}
.event {
  width: 30px;
  height: 30px;
  position: relative;
  margin: 0 5%;
  display: inline-block;
  background: #0073b7 !important;
  vertical-align: bottom;
  border-radius: 50%;
}
.detail {
  position: absolute;
  line-height: 1em;
  white-space: nowrap;
  left: 100%;
}
.event:before {
  content: '';
  position: absolute;
  left: 50%;
  margin-left: -1px;
  width: 3px;
  background: #ddd;
  height: 10px;
}
.event.up:before {
  top: -100%;
}
.event.down:before {
  top: 100%;
}
.up .detail {
  top: -50px;
}
.down .detail {
  bottom: -10px;
}
.triplabel{
	padding:5px;
	
}

.mptl-trimpad{
	margin-right:0px;
	margin-left:0px;
	padding-right:0px;
	padding-left:0px;
}
.mptl-h60{
	height:60px;
}
</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Trips
      </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-home"></i> Trips</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Available Drivers</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">Driver 1</div>
                <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Driver 2</div>
                <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">Driver 3</div>
                <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">Driver 4</div>
                <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">Driver 5</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class="box-title">Available Vehicles</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative;">Vehicle 1</div>
                <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative;">Vehicle 2</div>
                <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative;">Vehicle 3</div>
                <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative;">Vehicle 4</div>
                <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative;">Vehicle 5</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body ">
            	
            	
            	<div class="content">
            		
            		<div class="row">
            		
            		<div class="col-md-1 mptl-trimpad"><div class="pull-right user-block">
                    <img class="img-circle img-bordered-sm" src="/img/sree.png" alt="User Image"><img class="img-circle img-bordered-sm" src="/img/sree.png" alt="User Image">
                  </div>
            			
            		</div>
            	
            		
            		<div class="col-md-1 mptl-trimpad user-block">
            			<div class="pull-right ">
                        <span class="label triplabel bg-green ">Trip Start</span>
                        
               </div>
               <!-- <img class="img-circle img-bordered-sm" src="/img/sree.png" alt="User Image"> -->
            			</div>
          <!-- /.tab-pane -->
         <div class="col-md-8 mptl-trimpad">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline ">
          		<span>Vehicle</span>
  
  
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
  
  <!-- <div class="pull-right">
                        <span class="label triplabel bg-red">Trip End</span>
               </div> -->
               
</div>


          
          </div>
          <div class="col-md-1 mptl-trimpad">
                        <span class="label triplabel bg-green">Trip End</span>
               </div>
          <div class="col-md-1">
          	<a class="btn btn-primary btn-xs">More</a>
          </div>
          <!-- /.tab-pane -->
		</div>
<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		
		<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		
		
		<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		
		<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		
		<hr>
		<div class="row">
            		
            		<div class="col-md-2">
            			<!-- <div class="small-box bg-aqua">
            				<div class="inner">
              					<h3>70%</h3>
              					<p>completed</p>
            				</div>
          				</div> -->
            		</div>
          <!-- /.tab-pane -->
         <div class="col-md-10">
          	          	
          	<!-- <span class="triplabel label bg-red">Trip Start</span> -->
          	
          	<div class="timeline">
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
  	<div class="detail"> <span class="text-muted">Stop 1</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 2</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 3</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 4</span></div>
  </div>
  <div class="event down"><div class="timeline-badge"><i class="fa fa-truck fa-lg fa-flip-horizontal"></i></div>
    <div class="detail"> <span class="text-muted">Stop 5</span></div>
  </div>
</div>


          
          </div>
          <!-- /.tab-pane -->
		</div>
		
		
		
		
		
        </div>
        
     
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    