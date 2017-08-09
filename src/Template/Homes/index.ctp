<style>
.panel-body{
	height:250px;
}	
.knob-label{font-weight: bold;}
</style>

    	
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Home</h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
    </section>
    
    
    <section class="content">
    <div id="draggablePanelList" class="list-unstyled row">
		
	<?php $userrole=$this->request->session()->read('sessionuser')['role'];
	switch ($userrole) {
	case "root":
    ?>
    
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-king"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Customers</span>
              <span class="info-box-number">1</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">2</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion user-image"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Employees</span>
              <span class="info-box-number">7</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">New Members</span>
              <span class="info-box-number">20</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      
    <?php
	break;
	default:
    ?>	
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Info</div>
        	<div class="panel-body bg-default"  id='mptlmyinfo'><?= $this->element('homeelmt', array('title' => 'My Info','dp' => $mypic)); ?>
        	<a href="/Employees/view/<?php echo $this->request->session()->read('sessionuser')["employee_id"]; ?>" class="myinfo-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Team</div>
        	 <div class="panel-body box-body"><?= $this->element('homeelmt', array('title' => 'My Team','teammembers' => $myteam)); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">Links</div>
        	<div class="panel-body no-padding"><?= $this->element('homeelmt', array('title' => 'Links')); ?></div>
        </div>
    </div>
    
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">Admin Alerts</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'Admin Alerts')); ?></div>
        </div>
    </div>
    
    <div class="col-sm-6">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">To Do</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'To Do')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Admin Favorites</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'My Leaves')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Leaves</div>
        	<div class="panel-body"><!-- <?= $this->element('homeelmt', array('title' => 'My Admin Favorites')); ?> -->
        		
        		
        		
                    
                    
                    <div class="row">
                <div class="col-sm-6 border-bottom">
                  <div class="description-block">
                    <input type="text" class="knob" data-readonly="true" value="3" data-width="60" data-height="60" data-fgColor="#00a65a">
                  <div class="knob-label text-green">currently available</div>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 border-bottom">
                  <div class="description-block ">
                    <input type="text" class="knob" data-readonly="true" value="0" data-width="60" data-height="60" data-fgColor="#00c0ef">
                  <div class="knob-label text-light-blue">credited for next year</div>
                  </div>
                  <!-- /.description-block -->
                </div>
               
                <!-- /.col -->
              </div>
              
                    <div class="row">
                <div class="col-sm-6">
                  <div class="description-block">
                    <input type="text" class="knob" data-readonly="true" value="3" data-width="60" data-height="60" data-fgColor="#dd4b39">
                  <div class="knob-label text-red">accured so far</div>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="description-block">
                    <input type="text" class="knob" data-readonly="true" value="6" data-width="60" data-height="60" data-fgColor="#f39c12">
                  <div class="knob-label text-yellow">annual allotment</div>
                  </div>
                  <!-- /.description-block -->
                </div>
               
                <!-- /.col -->
              </div>
                   
                
                
        	</div>
        </div>
    </div>

	<?php } ?>
</div>

  
  
</section>

<?php $this->start('scriptBotton'); ?>
<script>
$(".knob").knob();
 jQuery(function($) {
 	
 	
 	
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.box-header', 
            update: function() {
                $('.box', panelList).each(function(index, elem) {
                     var $listItem = $(elem),
                         newIndex = $listItem.index();

                     // Persist the new indices.
                });
            }
        });
        
  });
</script>
<?php $this->end(); ?>