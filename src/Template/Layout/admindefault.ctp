<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
	
 


    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- <?= $this->Html->css('cake.css') ?> -->
    
     
     <?= $this->Html->css('prettify.css') ?>
     <?= $this->Html->css('custom.css') ?>
     <?= $this->Html->css('jquery.jOrgChart.css') ?>
     <?= $this->Html->css('bootstrap.min.css') ?>
     <?= $this->Html->css('menu.css') ?>
     <?= $this->Html->css('bootstrap-year-calendar.min.css') ?>
     

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
    
    <?= $this->Html->script('jquery-2.2.4.min.js'); ?>
     <?= $this->Html->script('jquery-ui.js'); ?>
     <?= $this->Html->script('bootstrap.min.js'); ?>
    <?= $this->Html->script('jquery.jOrgChart.js'); ?>
    <?= $this->Html->script('bootstrap-year-calendar.min.js'); ?>
	<!-- <?=$this->Html->script('menu.js'); ?> -->


<style>
.table{
	width:100%;
}
	input[type=checkbox]{
		margin-left:15px;
		margin-right:5px;	
	}
    .panel {
        font: 14px helvetica, arial, sans-serif;
        color: #222;
        background-color: #f8f8f8;
        padding:0;
        margin: 0;
        height:280px;
    }
    .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 35px;
    background-color: #f5f5f5;
    }
    .login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.login-form {
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.login-form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.login-form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.login-form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.login-form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.login-form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.login-form .register-form {
  display: none;
}
.m50{
	margin:50px;
}
.mt50{
	margin-top:50px;
}
 </style>

</head>
<body>
     <div id="wrapper" class="toggled">
        <!-- <div class="overlay"></div> -->
    <?php $this->Form->templates($form_templates['shortForm']); ?> 
    <!--Topbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hrm</a>
    </div>
    
    
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">User
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php
            	if($this->request->session()->read('Auth.User.id')) {
   					// user is logged in, show logout..user menu etc
   					echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); 
				}else{
					echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); 
				}?>
 
        </ul>
      </li>
    </ul>
    
  </div>
</nav>
<!--/Topbar -->

    <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <!-- <a href="#"> -->
                       Brand
                    <!-- </a> -->
                </li>
                <li>
                    <a href="../Homes">Home</a>
                </li>
                <li>
                    <a href="../OrgCharts">Org Chart</a>
                </li>
                <li>
                    <a href="../Holidays">Holidays</a>
                </li>
                <li>
                    <a href="../LegalEntities">Legal Entities</a>
                </li>
                <li>
                    <a href="../Admins">Admin</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Works <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="https://twitter.com/maridlcrmn">Follow me</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->
        
    <?= $this->Flash->render() ?>
    <div  id="page-content-wrapper">
    	<div style="height:100%;min-height:400px;float:left;background:#e5e5e5;">
    	<?= $this->element('menuelmnt', array('listValues' => array("Add", "List", "View"))); ?></div>
         <div  class="container">   
        <?= $this -> fetch('content') ?>
        </div>
    </div>
    </div>
    <!-- /#wrapper -->
    
    <!-- Footer -->
    <footer class="footer">
      <div class="container">
  <div class="row">
  <!-- <hr> -->
    <div class="col-lg-12">
      <div class="col-md-8">
        <a href="#">Terms of Service</a> | <a href="#">Privacy</a>    
      </div>
      <div class="col-md-4">
        <p class="muted pull-right">© 2016 Maptell GeoSystems Pvt. Limited. All rights reserved</p>
      </div>
    </div>
  </div>
</div>
    </footer>
    <!-- /footer -->
</body>
</html>
