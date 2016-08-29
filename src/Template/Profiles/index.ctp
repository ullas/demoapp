<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">User Profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <?php echo $this->Html->image('sree.png', array('class' => 'profile-user-img img-responsive img-circle', 'alt' => 'User profile picture')); ?>
          

          <h3 class="profile-username text-center">Sreekanth M</h3>

          <p class="text-muted text-center">Software Engineer</p>
          <p class="text-center">Tawazun Dynamics,Tawazun Industrial Park</p>

          <a href="/Profiles/editprofile"><button type="button" class="btn btn-primary btn-block"> Edit Profile</button></a>
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

          <p class="text-muted">
            B.S. in Computer Science from the University of Kerala
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

          <p class="text-muted">Trivandrum, India</p>

          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

          <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>

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
             
              <p>
                Execute full lifecycle software development.
              </p>

            </div>
            <!-- /.post -->

           

            
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="designations">
            <p>Project manager</p>
            <p>Technical Head</p>
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
              <div class="callout callout-danger">
                <p>increased sales by 15%.</p>
              </div>
              <div class="callout callout-info">
                <p>member of a high-performing team which won the regional support award last year.</p>
              </div>
              <div class="callout callout-warning">
                <p>Contributed to good customer service.</p>
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

</section>
<!-- /.content -->
