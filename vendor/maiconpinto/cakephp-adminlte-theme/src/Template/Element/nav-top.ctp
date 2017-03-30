<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
?>

<?php $cnt=0;$leavenotificationarr=array();
	 for ($x = 0; $x < count($notificationcontent); $x++) { 
     if(isset($notificationcontent[$x]) && $notificationcontent[$x]!=null){                        		
								
		for ($y = 0; $y < count($notificationcontent[$x]); $y++) {
		if(isset($notificationcontent[$x][$y]) && $notificationcontent[$x][$y]!=null){
									
			for ($t = 0; $t < count($notificationcontent[$x][$y]['employee_absencerecords']); $t++) {
			if(isset($notificationcontent[$x][$y]['employee_absencerecords'][$t]) && $notificationcontent[$x][$y]['employee_absencerecords'][$t]!=null){
									 
				array_push($leavenotificationarr, $this->Country->get_employeename($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));					 
	} }  } }  } } 
?>
                            
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
            <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bars"></i>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                  <li><a href="/Profiles"> <i class="fa fa-user text-olive"></i> Profile </a></li>
                  <li><a href="/EmployeeAbsencerecords/timesheet"> <i class="fa fa-clock-o text-aqua"></i> Timesheet </a></li>
                  <li><a href="/EmployeeAbsencerecords"> <i class="fa fa-calendar-minus-o text-red"></i> Leave Requests </a></li>
                </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 195.122px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
              </li>
            </ul>
          </li>
            
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning"><?php if($leavenotificationarr!='' && $leavenotificationarr!=null){echo count($leavenotificationarr);}  ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have <?php if($leavenotificationarr!=''){echo count($leavenotificationarr);}else{echo "no";}  ?> notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                        	<?php for ($k = 0; $k < count($leavenotificationarr); $k++) { 
                        		if(isset($leavenotificationarr[$k]) && $leavenotificationarr[$k]!=null){                        		
								
                        	?>
                            <li><a href="/EmployeeAbsencerecords">
                            	<i class="fa fa-calendar-minus-o text-aqua"></i><b><?php echo $leavenotificationarr[$k]; ?>
                            		</b> requests a leave</a></li>
                            <?php } } ?>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                	<?php if($this->request->session()->read('sessionuser')['profilepic']!=''){$picturename='/img/uploadedpics/'.$this->request->session()->read('sessionuser')['profilepic'];}
                            				else{$picturename='/img/uploadedpics/defaultuser.png';}
	                    		echo $this->Html->image($picturename, array('class' => 'user-image', 'alt' => 'User profile picture')); ?>
                    <span class="hidden-xs"><?php echo $name ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                    	<?php if($this->request->session()->read('sessionuser')['profilepic']!=''){$picturename='/img/uploadedpics/'.$this->request->session()->read('sessionuser')['profilepic'];}
                            				else{$picturename='/img/uploadedpics/defaultuser.png';}
          					echo $this->Html->image($picturename, array('class' => 'img-circle', 'alt' => 'User profile picture')); ?>
                        <!-- <?php echo $this->Html->image('sree.png', array('class' => 'img-circle', 'alt' => 'User Image')); ?> -->
                        <p>
                            <?php echo $name ?> - Web Developer
                            <small>Member since Nov. 2012</small>
                        </p>
                    </li>
                    
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                        	<?php $userrole=$this->request->session()->read('sessionuser')['role'];
								if ($userrole=="admin" || $userrole=="employee") {
									if( (isset($counts['legalentity']) && $counts['legalentity'] >0) && (isset($counts['businessunit']) && $counts['businessunit'] >0) &&
										(isset($counts['division']) && $counts['division'] >0) && (isset($counts['department']) && $counts['department'] >0) &&
										(isset($counts['costcenter']) && $counts['costcenter'] >0) && (isset($counts['position']) && $counts['position'] >0) ){
											echo "<a href='/Profiles' class='btn btn-default btn-flat'>Profile</a>";
									}
								}
							?>
                            
                        </div>
                        <div class="pull-right">
                            <!-- <a href="#" class="btn btn-default btn-flat">Sign out</a> -->
                            <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout'), array( 'class'=>'btn btn-default btn-flat')); ?> 
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>



