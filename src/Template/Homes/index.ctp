<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Home</h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
    </section>
    
    
    <section class="content">
    	
    	
    
    <!-- 1st row -->
      <div class="row">
        <div class="col-md-3">
          <!-- MY INFO -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">My Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'My Info')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-3">
          <!-- MY INFO -->
          <div class="box box-success direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">My Team</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'My Team')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-3">
          <!-- MY INFO -->
          <div class="box box-warning direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Links</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'Links')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-3">
          <!-- MY INFO -->
          <div class="box box-danger direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Admin Alerts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'Admin Alerts')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
      
      
      <!-- 2nd row -->
      <div class="row">
        <div class="col-md-6">
          <!-- MY INFO -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">To Do</h3>
              <div class="box-tools pull-right">
                <span >Sort by</span>
                <span >Date</span>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-gear"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'To Do')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-3">
          <!-- MY INFO -->
          <div class="box box-warning direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">My Goals</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'My Goals')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->
        
        <div class="col-md-3">
          <!-- MY INFO -->
          <div class="box box-danger direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">My Admin Favorites</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">
                <?= $this->element('homeelmt', array('title' => 'My Admin Favorites')); ?>
              </div>
            
            </div>
            
          </div>
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
        
  
  
</section>