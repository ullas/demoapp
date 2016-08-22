<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($theme['title']) ? $theme['title'] : 'AdminLTE 2'; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <?= $this->Html->css('jquery.jOrgChart.css') ?>
    
    <!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>
<!-- AdminLTE App -->
<?php echo $this->Html->script('AdminLTE.AdminLTE.min'); ?>
<?= $this->Html->script('jquery.jOrgChart.js'); ?>



    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('AdminLTE.skins/skin-blue'); ?>

    <?php echo $this->fetch('css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $this->Url->build('/'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <!-- <span class="logo-mini"><?php echo $theme['logo']['mini'] ?></span> -->
                <!-- logo for regular state and mobile devices -->
                <!-- <span class="logo-lg"><?php echo $theme['logo']['large'] ?></span> -->
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php echo $this->element('nav-top') ?>
        </header>

        <!-- Left side column. contains the sidebar -->
        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
		

    <!-- Main content -->
    <section class="content">
    	<div class="row">
		<div class="col-md-3">
			<hr><hr>
          <div class="box box-solid">
           
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="<?php echo $this->Url->build(array('controller' => 'LegalEntities', 'action' => 'index')); ?>"><i class="fa fa-university"></i> Legal Entity</a></li>
                <li><a href="<?php echo $this->Url->build(array('controller' => 'BusinessUnits', 'action' => 'index')); ?>"><i class="fa fa-briefcase"></i> Business Unit</a></li>
           
              </ul>
            </div>
          </div>
          
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>
            
        </div></div>
</section>
        </div>
        <!-- /.content-wrapper -->

        <?php echo $this->element('footer'); ?>

        <!-- Control Sidebar -->
        <?php echo $this->element('aside-control-sidebar'); ?>

        <!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- AdminLTE for demo purposes -->
<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBotton'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");

        var a = $('a[href="<?php echo $this->request->webroot . $this->request->url ?>"]');
        if (!a.parent().hasClass('treeview')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }
    });
</script>
</body>
</html>
