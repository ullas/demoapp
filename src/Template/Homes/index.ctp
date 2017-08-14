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
    	<div class="box box-primary">
        	<div class="box-header with-border">My Info</div>
        	<div class="panel-body bg-default"  id='mptlmyinfo'><?= $this->element('homeelmt', array('title' => 'My Info','dp' => $mypic)); ?>
        	<a href="/Employees/view/<?php echo $this->request->session()->read('sessionuser')["employee_id"]; ?>" class="myinfo-footer">More info <i class="fa fa-arrow-circle-right"></i></a></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary">
        	<div class="box-header with-border">My Team</div>
        	 <div class="panel-body box-body"><?= $this->element('homeelmt', array('title' => 'My Team','teammembers' => $myteam)); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary">
        	<div class="box-header with-border">Links</div>
        	<div class="panel-body no-padding"><?= $this->element('homeelmt', array('title' => 'Links')); ?></div>
        </div>
    </div>
    
    <div class="col-sm-3">
    	<div class="box box-primary">
        	<div class="box-header with-border">Admin Alerts</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'Admin Alerts')); ?></div>
        </div>
    </div>
    
    <div class="col-sm-6">
    	<div class="box box-primary">
        	<div class="box-header with-border">To Do</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'To Do')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary">
        	<div class="box-header with-border">My Admin Favorites</div>
        	<div class="panel-body"><?= $this->element('homeelmt', array('title' => 'My Leaves')); ?></div>
        </div>
    </div>
    <div class="col-sm-3">
    	<div class="box box-primary direct-chat direct-chat-primary">
        	<div class="box-header with-border">My Leaves</div>
        	<div class="panel-body" style="overflow: auto;"><!-- <?= $this->element('homeelmt', array('title' => 'My Admin Favorites')); ?> -->
        		
        	<?php $annualallotment=0;
        	foreach ($myleaves as $vals) {
				$percentage=0;$percentage=($vals['leavecount']/$vals['quota'])*100;
				$colorstring="progress-bar-aqua";
				($percentage>50) ? $colorstring="progress-bar-red" : $colorstring="progress-bar-green" ;
				$annualallotment+=$vals['quota'];
			?>
		
    			<div class="progress-group"><span class="progress-text"><?php echo $vals['timetype'] ?></span>
    				<span class="progress-number"><b><?php echo $vals['leavecount'] ?></b>/<?php echo $vals['quota'] ?></span>
				<div class="progress sm"><div class="progress-bar <?php echo $colorstring ?>" style="width: <?php echo $percentage ?>%"></div></div></div>
				
			<?php } ?>
	
        	</div>
        	<div class="box-footer" >Annual Allotment<span class="pull-right text-green"><?php echo $annualallotment; ?></span></div>
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