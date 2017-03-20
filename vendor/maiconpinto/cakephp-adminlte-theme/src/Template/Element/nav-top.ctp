<?php
$file = ROOT . DS . 'src' . DS . 'Template' . DS . 'Element' . DS . 'nav-top.ctp';

if (file_exists($file)) {
    ob_start();
    include_once $file;
    echo ob_get_clean();
} else {
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
            
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">1</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 1 notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php $picturename='/img/uploadedpics/'.$this->request->session()->read('sessionuser')['profilepic'];
          					echo $this->Html->image($picturename, array('class' => 'user-image', 'alt' => 'User profile picture')); ?>
                    <span class="hidden-xs"><?php echo $name ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                    	<?php $picturename='/img/uploadedpics/'.$this->request->session()->read('sessionuser')['profilepic'];
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