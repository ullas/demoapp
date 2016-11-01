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
    <?php echo $this->Html->css('AdminLTE./plugins/select2/select2.min'); ?>
    <?php echo $this->Html->css('AdminLTE./plugins/datepicker/datepicker3'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('AdminLTE.skins/skin-greenjam'); ?>

     <?= $this->Html->css('jquery.jOrgChart.css') ?>

    <?php echo $this->fetch('css'); ?>


    <!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>

<!-- /added to include drag and drop -->
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>
<!-- AdminLTE App -->
 <?= $this->Html->script('jquery.jOrgChart.js'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
	/* go top button */

.go-top {
	position: fixed;
	bottom: 2em;
	right: 2em;
	text-decoration: none;
	color: white;
	background-color: rgba(0, 0, 0, 0.3);
	font-size: 12px;
	padding: 1em;
	display: none;
	z-index:10;
}

.go-top:hover {
	background-color: rgba(0, 0, 0, 0.6);
	color:#FFFFFF;
}
.p3{
	padding:3px;
}
#back-to-contents {
    position: fixed;
    bottom: calc(100% - 50%);
    right: 0;
    background: #363637;
    padding: 5px 0px 4px;
    z-index: 90;
}
.icon-improve {
    color: #bdbdb5;
    padding: 3px 9px 0 10px;
    font-size: 24px;
}
.caption {
        width:100%;
        bottom: .3rem;
        position: absolute;
        color:#FFFFFF;
    }
    .bgwhite{
    	background-color:#FFFFFF;
    }
    label.mandatory:after {
    content: ' *';
    color: #ff5a4d;
    display: inline;
}
/*.datepicker table tr th {
	background-color: #21A57E;
}*/
.input-group {
	width:100%;
}
.checkbox{
	padding-top:30px;
}
</style>

</head>
<!-- Date picker -->
<?php
$this->Html->script([ 'AdminLTE./plugins/select2/select2.full.min' ], ['block' => 'script']);
$this->Html->script([ 'AdminLTE./plugins/datepicker/bootstrap-datepicker' ], ['block' => 'script']);
?>
<body class="hold-transition skin-greenjam sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $this->Url->build('/Homes'); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><?php echo $theme['logo']['mini'] ?></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><?php echo $theme['logo']['large'] ?></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <?php echo $this->element('nav-top') ?>
        </header>

        <!-- Left side column. contains the sidebar -->
        <?php echo $this->element('aside-main-sidebar'); ?>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        	<!-- support -->
			<a id="back-to-contents" href="#"><i class="glyphicon glyphicon-earphone icon-improve" title="Support"></i></a>

            <?php echo $this->Flash->render(); ?>
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->fetch('content'); ?>

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
    
    	
//popover resize    	
$(window).off("resize").on("resize", function() {
    $(".popover").each(function() {
        var popover = $(this);
        if (popover.is(":visible")) {
            var ctrl = $(popover.context);
            ctrl.popover('show');
        }
    });
}); 

    //set mnadatory * after required label	
    $( ':input[required]' ).each( function () {
        $("label[for='" + this.id + "']").addClass('mandatory');
    });

		//select 2 
    	$(".select2").select2({ width: '100%' });
		//datepicker
    	$('.mptldp').datepicker({
    		format:"dd/mm/yy",
      		autoclose: true
    	});

        $(".navbar .menu").slimscroll({
            height: "200px",
            alwaysVisible: false,
            size: "3px"
        }).css("width", "100%");

        var a = $('a[href="/<?php echo $this->request->params['controller'] ?>"]');
        if (!a.parent().hasClass('treeview')) {
            a.parent().addClass('active').parents('.treeview').addClass('active');
        }


        $(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.go-top').fadeIn(200);
				} else {
					$('.go-top').fadeOut(200);
				}
			});

			// Animate the scroll to top
			$('.go-top').click(function(event) {
				event.preventDefault();

				$('html, body').animate({scrollTop: 0}, 300);
			})


			$(".actions a").each(function(){
				  if($(this).text()=='View')
				  {
				  	$(this).addClass('fa fa-eye p3');
				  	$(this).text("");
				  }
				  if($(this).text()=='Edit')
				  {
				  	$(this).addClass('fa fa-pencil p3');
				  	$(this).text("");
				  }
				  if($(this).text()=='Delete')
				  {
				  	$(this).addClass('fa fa-trash');
				  	$(this).text("");
				  }
			});



    });

    $(".delete-btn").click(function(){
       $("#ajax_button").html("<a href='/<?php echo $this->request->params['controller'] ?>/delete/"+ $(this).attr("data-id")+"' class='btn btn-outline btn-danger'>Confirm</a>");
      $("#trigger").click();
 });
</script>
<?php echo $this->Html->script('AdminLTE.AdminLTE.min'); ?>
</body>
</html>
