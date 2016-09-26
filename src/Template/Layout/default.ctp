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
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 35px;
    background-color: #f5f5f5;
    }
    .card-container.card {
    max-width: 400px;
    padding: 40px 40px;
	}

.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.m50{
	margin:50px;
}
.mt50{
	margin-top:50px;
}
.mt30{
	margin-top:30px;
}
 </style>

</head>
<body>
     <div id="wrapper" class="toggled">
        <!-- <div class="overlay"></div> -->
      
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
    <div  id="page-content-wrapper" class="m50">
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
        <p class="muted pull-right">© 2016 Company Name. All rights reserved</p>
      </div>
    </div>
  </div>
</div>
    </footer>
    <!-- /footer -->
</body>
</html>
