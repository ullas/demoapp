<section class="content-header">
  <h1>
    User Profile
    <small>Edit</small>
  </h1>
 
</section>

<!-- Main content -->
<section class="content">
    <!-- <?= $this->Form->create($profile) ?> -->
    <fieldset>
       <!-- Modal popover-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal popover-->

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
        	
          <div class="col-sm-12 thumbnail img-circle">     
          	<?php echo $this->Html->image('sree.png', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture')); ?>
          	<div class="caption">
          		<i class="fa fa-pencil"></i>
           	</div>
           </div>

          <!-- <h3 class="profile-username text-center">Sreekanth M</h3>

          <p class="text-muted text-center">Software Engineer</p>
          <p class="text-center">Tawazun Dynamics,Tawazun Industrial Park</p> -->
          <div class="form-group">
          	<label for="exampleInputEmail1">Name</label>
          	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" value="Sreekanth M">
          </div>
          <div class="form-group">
          	<label for="exampleInputEmail1">Position</label>
          	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter position" value="Software Engineer">
           </div>
           <div class="form-group">
          	<label for="exampleInputEmail1">Company</label>
          	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter company" value="Tawazun Dynamics,Tawazun Industrial Park">
           </div>
          
			<a href="#"><button type="button" class="btn btn-success btn-block"> Save Changes</button></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <!-- About Me Box -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Education</strong>
		  <input type="text" class="form-control" id="exampleInputEmail1" value="B.S. in Computer Science from the University of Kerala">

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

          <input type="text" class="form-control" id="exampleInputEmail1" value="Trivandrum,India">

          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

          <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>
		<div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Skill">
                <div class="input-group-btn"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></div>
              </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#activity" data-toggle="tab">Job Profile</a></li>
          <li><a href="#timeline" data-toggle="tab">Experience</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <!-- Post -->
            <div class="post">
              <!-- <div class="box"> -->
                 <div class="box-body no-padding">
              <table class="table table-condensed">
                <tbody>
                <tr>
                  <td>Current</td>
                  <td>Tawazun Dynamics</td>
                </tr>
                <tr>
                  <td>Previous</td>
                  <td>Purple Systems</td>
                </tr>
                <tr>
                  <td>Education</td>
                  <td>University of Kerala</td>
                </tr>
                <tr>
                 <td>Period</td>
                  <td>Since Nov. 2012</td>
                </tr>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          <!-- </div> -->
            </div>
            <!-- /.post -->

           




      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tasks" data-toggle="tab">Roles</a></li>
          <li><a href="#designations" data-toggle="tab">Responsibilities</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="tasks">
            <!-- Post -->
            <div class="post">
             
              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement" value="Execute full lifecycle software development.">
                <div class="input-group-btn"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
              </div>
              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement">
                <div class="input-group-btn"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></div>
              </div>

            </div>
            <!-- /.post -->

           

            
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="designations">
          	<div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement" value="Project manager">
                <div class="input-group-btn"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
              </div>
              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="New Responsibility">
                <div class="input-group-btn"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></div>
              </div>
          </div>
          <!-- /.tab-pane -->

        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    
    
           
           
           <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#" data-toggle="tab">Achievements</a></li>
        </ul>
        <div class="tab-content">
          <div class="active tab-pane" id="achievements">
            <!-- Post -->
            <div class="post">
        
            <div class="box-body">

              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement" value="increased sales by 15%.">
                <div class="input-group-btn"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
              </div>
              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement" value="member of a high-performing team which won the regional support award last year.">
                <div class="input-group-btn"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
              </div>
              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement" value="Contributed to good customer service.">
                <div class="input-group-btn"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></div>
              </div>
              <div class="input-group form-group">
                <input id="new-event" type="text" class="form-control" placeholder="Achievement">
                <div class="input-group-btn"><button type="button" class="btn btn-success"><i class="fa fa-plus"></i></button></div>
              </div>
              
            </div>
            <!-- /.box-body -->
            </div>
            <!-- /.post -->

           

            
          </div>
          <!-- /.tab-pane -->
          

        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
      
       
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <ul class="timeline timeline-inverse">
              <!-- timeline time label -->
              <li class="time-label">
                    <span class="bg-red">
                      Job Experience
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-suitcase bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> November 2011 - March 2012</span>

                  <h3 class="timeline-header">iOS Consultant</h3>

                  <div class="timeline-body">
                     Designed,Developed and implemented projects on iOS platform. 
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Edit</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              
              <!-- timeline item -->
              <li>
                <i class="fa fa-suitcase bg-blue"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> June 2010 – November 2011 </span>

                  <h3 class="timeline-header">iOS Developer</h3>

                  <div class="timeline-body">
                    Designed,Developed iOS applications.
                  </div>
                  <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">Edit</a>
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>
              </li>
              <!-- END timeline item -->
              <!-- timeline time label -->
              
              <!-- /.timeline-label -->
              
              <!-- END timeline item -->
              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
            
            <div class="box-footer clearfix no-border">
              <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add more</button>
            </div>
            
          </div>
          <!-- /.tab-pane -->
			
            
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

    </fieldset>
    <!-- <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?> -->
</section>
