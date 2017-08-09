<!DOCTYPE html>
<html>
<head>
	<script>
    paceOptions = {
    	ajax: {
        	trackMethods: ['GET', 'POST']
    	}
	}
  </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($theme['title']) ? $theme['title'] : 'AdminLTE 2'; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap'); ?>
    <?php echo $this->Html->css('AdminLTE./plugins/select2/select2.min'); ?>
    <?php echo $this->Html->css('AdminLTE./plugins/datepicker/datepicker3'); ?>
    <?php echo $this->Html->css('AdminLTE./plugins/timepicker/bootstrap-timepicker.min'); ?>
    <!-- <?php echo $this->Html->css('AdminLTE./plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min'); ?> -->
    <?php echo $this->Html->css('/css/dropzone'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <!-- Ionicons -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.css">
    
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.dataTables.min.css"> -->
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <!-- Theme style -->
    <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <?php echo $this->Html->css('AdminLTE.skins/skin-greenjam'); ?>
     <?= $this->Html->css('jquery.jOrgChart.css') ?>

    <?php echo $this->fetch('css'); ?>


<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
    <link  rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/base/jquery-ui.css">-->
    
    <!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>

<!-- /added to include drag and drop -->
<script src="/js/jquery-ui.min.js"></script>

<!-- bootstrap toggle -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 
 
 <?php echo $this->Html->script('/js/sweetalert-dev.js'); ?>   
 <?php echo $this->Html->script('/js/pace.min.js'); ?>   
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap'); ?>

<!-- SlimScroll -->
<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>
<!-- AdminLTE App -->
 <?= $this->Html->script('jquery.jOrgChart.js'); ?>

 <!-- <script src="http://bootboxjs.com/bootbox.js"></script> -->
  <!-- <script src="http://t4t5.github.io/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="http://t4t5.github.io/sweetalert/dist/sweetalert.css"> -->
  
  <!-- <link rel="stylesheet" href="http://t4t5.github.io/sweetalert/themes/google/google.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>


.pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;

  -webkit-perspective: 12rem;
  -moz-perspective: 12rem;
  -ms-perspective: 12rem;
  -o-perspective: 12rem;
  perspective: 12rem;

  z-index: 2000;
  position: fixed;
  height: 6rem;
  width: 6rem;
  margin: auto;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
}

.pace.pace-inactive .pace-progress {
  display: none;
}

.pace .pace-progress {
  position: fixed;
  z-index: 2000;
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  height: 8rem;
  width: 8rem !important;
  line-height: 8rem;
  font-size: 3rem;
  border-radius: 50%;
  background: #268F70;
  color: #FFFFFF;
  font-family: "Helvetica Neue", sans-serif;
  font-weight: 200;
  text-align: center;

  -webkit-animation: pace-theme-center-circle-spin linear infinite 2s;
  -moz-animation: pace-theme-center-circle-spin linear infinite 2s;
  -ms-animation: pace-theme-center-circle-spin linear infinite 2s;
  -o-animation: pace-theme-center-circle-spin linear infinite 2s;
  animation: pace-theme-center-circle-spin linear infinite 2s;

  -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  -o-transform-style: preserve-3d;
  transform-style: preserve-3d;
}

.pace .pace-progress:after {
  content: attr(data-progress-text);
  display: block;
}

@-webkit-keyframes pace-theme-center-circle-spin {
  from { -webkit-transform: rotateY(0deg) }
  to { -webkit-transform: rotateY(360deg) }
}

@-moz-keyframes pace-theme-center-circle-spin {
  from { -moz-transform: rotateY(0deg) }
  to { -moz-transform: rotateY(360deg) }
}

@-ms-keyframes pace-theme-center-circle-spin {
  from { -ms-transform: rotateY(0deg) }
  to { -ms-transform: rotateY(360deg) }
}

@-o-keyframes pace-theme-center-circle-spin {
  from { -o-transform: rotateY(0deg) }
  to { -o-transform: rotateY(360deg) }
}

@keyframes pace-theme-center-circle-spin {
  from { transform: rotateY(0deg) }
  to { transform: rotateY(360deg) }
}



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
.mptlalert{
	position: relative;
	z-index: 1900;
}
.icon-improve {
    color: #bdbdb5;
    padding: 3px 9px 0 10px;
    font-size: 24px;
}
.caption {
        width:100%;
        bottom: .3rem;
        position: absolute;color:#FFFFFF;
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
	padding-top:17px;padding-bottom:17px;
}
/*add wizard btn icon*/
.btn .fa{
	color:#FFFFFF;
}
div.dataTables_filter input {
	margin-left:0px;
}
/*hide box shadow*/
.nav-tabs-custom {
    box-shadow: none;
}
/*profile page pic*/
.profile-user-img {
	height:100px;
}
.user-panel > .image > img {
    height: 45px;
}
/*dashboard myinfo*/
.myinfo-footer {
	position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    text-align: center;
    padding: 3px 0;
    color: rgba(255,255,255,0.8);
    display: none;
    z-index: 10;
    background: rgba(0,0,0,0.1);
    text-decoration: none;
}
#mptlmyinfo:hover > .myinfo-footer {
	background-color:#21A57E;display:block;
}
#myinfopic{
	max-width:100%;max-height:100%;margin:auto;
}
.move-event{
	cursor: move;
}
.mptlboldtxt{
	font-weight: bold;
}
.fmactionbtn {
    float: right;
}
.fmactions .fmaction span {
    position: relative;
    top: -20px;
    right: 10px;
    font-size: 10px;
    font-weight: bold;opacity:1;
}
div.dataTables_wrapper {
     clear: both;margin-top:5px;
}
.mptlform{
	margin-top:33px;
}
.fs20{
	font-size:20px;
}
.infodiv:hover > .info-box-number{
	font-size:24px;
}
/*
.form-control,.select2-container{
	border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid #d2d6de;
}
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
    border: 0px;
}
*/

/*datatable header responsive*/
/*.dataTables_scrollHeadInner{width:100%;}
.table{width:100%;}*/
.dataTables_wrapper{ overflow: auto; clear:both;padding-top:15px; }
.input-group .select2-hidden-accessible{
	display:none;
}
.box .border-bottom{ border-bottom: 1px solid #f4f4f4;}
/*.form-control{
	border:0px;
	border-bottom: 1px solid #ccc;
}
.input-group .input-group-addon {
    border:0px;
	border-bottom: 1px solid #ccc;
	border-right: 1px solid #ccc;
}
.select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
    border:0px;
	border-bottom: 1px solid #ccc;
}*/
</style>
<!-- refresh page every 15 minutes -->
<!-- <meta http-equiv="refresh" content="900"> -->
</head>
<!-- Date picker -->


<?php
$this->Html->script([ 'AdminLTE./plugins/select2/select2.full.min' ], ['block' => 'script']);
$this->Html->script([ 'AdminLTE./plugins/knob/jquery.knob' ], ['block' => 'script']);
$this->Html->script([ 'AdminLTE./plugins/datepicker/bootstrap-datepicker' ], ['block' => 'script']);
$this->Html->script([ 'AdminLTE./plugins/timepicker/bootstrap-timepicker.min' ], ['block' => 'script']);
$this->Html->script([ '/js/dropzone' ], ['block' => 'script']);
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
        <div class="content-wrapper" style="overflow: auto;">
        	<!-- support -->
			<!-- <a id="back-to-contents" href="#"><i class="glyphicon glyphicon-earphone icon-improve" title="Support"></i></a> -->

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

<!-- jQuery 2.1.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jQuery-2.1.4.min'); ?>
<!-- jQueryUI 1.11.4 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQueryUI/jquery-ui.min.js'); ?>
<!-- Bootstrap 3.3.5 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap'); ?>
<!-- SlimScroll -->
<?php echo $this->Html->script('AdminLTE./plugins/slimScroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?php echo $this->Html->script('AdminLTE./plugins/fastclick/fastclick'); ?>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

<!--  <?php echo $this->Html->script('AdminLTE./plugins/datatables/jquery.dataTables.min'); ?> -->
<?php echo $this->Html->script('AdminLTE./plugins/datatables/dataTables.bootstrap.min'); ?>



<!-- AdminLTE for demo purposes -->
<?php echo $this->fetch('script'); ?>
<?php echo $this->fetch('scriptBotton'); ?>
<script type="text/javascript">
var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;

$(document).ready(function(){

	//toggle infobar
  $('#infobar').on('hide.bs.collapse', function () {
    	$('#togglebutton').html('<span class="fa fa-chevron-down"></span>');
  })
  $('#infobar').on('show.bs.collapse', function () {
    	$('#togglebutton').html('<span class="fa fa-chevron-up"></span>');
  })
// $( "#togglebutton" ).click(function() {
    // $( "#infobar" ).slideToggle();
// });
// jQuery("[required]").after("<span class='required'>*</span>");

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

    //set mandatory * after required label
    $( ':input[required]' ).each( function () {
        $("label[for='" + this.id + "']").addClass('mandatory');
    });

		//select 2
    	$(".select2").select2({ width: '100%',allowClear: true,placeholder: "Select" });
		//year picker
    	$('.mptlyp').datepicker({
    		format:"yyyy", viewMode: "years", minViewMode: "years", autoclose: true, clearBtn: true
    	});
		//date picker
		var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
		if(userdf==1){
			$('.mptldp').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
		}else{
			$('.mptldp').datepicker({ format:"mm/dd/yyyy",autoclose: true,clearBtn: true,todayHighlight: true });
		}

		$(".mptltp").timepicker({
      		showInputs: false,autoclose: true,maxHours:24,showMeridian:false
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
				  	$(this).addClass('fa fa-file-text-o p3');
				  	$(this).text("");
				  }
				  if($(this).text()=='Edit')
				  {
				  	$(this).addClass('fa fa-pencil p3 text-aqua');
				  	$(this).text("");
				  }
				  if($(this).text()=='Delete')
				  {
				  	$(this).addClass('fa fa-trash text-red');
				  	$(this).text("");
				  }
			});

			//disable div onclick if (title)anchor tag clicked org chart
    		$(".node-title").click(function(event){
		  		event.stopPropagation();
			})

});
function bootbox_alert(msg, callback_success, callback_cancel) {
    var d = bootbox.alert({title:"MayHaw",message:msg, show:false, buttons: { 'ok': { label: 'OK', className: 'btn btn-outline pull-right' } },callback:function(result) {

    }});
    return d;
}
function compareStartEndDate(startdate,enddate) {
	if(userdf==1){
    	startdate=convertdmytoymd(startdate);
    	enddate=convertdmytoymd(enddate);
    }else{
    	startdate=convertmdytoymd(startdate);
    	enddate=convertmdytoymd(enddate);
    }
    	
    if(processDate(startdate)>processDate(enddate)){
    	return false;
    }else{
    	return true;
    }
}
function formattoymd(inputDate) {
    var date = new Date(inputDate);
    if (!isNaN(date.getTime())) {
        var day = date.getDate().toString();
        var month = (date.getMonth() + 1).toString();
        // Months use 0 index.

        return date.getFullYear()  + '/' +
        (month[1] ? month : '0' + month[0]) + '/' +
        (day[1] ? day : '0' + day[0]) ;
    }
}
function formattomdy(inputDate) {
    var date = new Date(inputDate);
    if (!isNaN(date.getTime())) {
        var day = date.getDate().toString();
        var month = (date.getMonth() + 1).toString();
        // Months use 0 index.

        return (month[1] ? month : '0' + month[0]) + '/' +
        (day[1] ? day : '0' + day[0])   + '/' + date.getFullYear()
        ;
    }
}
function processDate(date){
   	var parts = date.split("/");
   	return new Date(parts[0], parts[1] - 1, parts[2]);
}
function convertmdytoymd(inputDate) {
	var datearray = inputDate.split("/");
	return datearray[2].trim() + '/' + datearray[0].trim() + '/' + datearray[1].trim();
}
function convertdmytoymd(inputDate) {
	var datearray = inputDate.split("/");
	return datearray[2].trim() + '/' + datearray[1].trim() + '/' + datearray[0].trim();
}
function sweet_alert(msg, callback_success, callback_cancel) {
    var d = swal("MayHaw",msg);
    return d;
}
function sweet_confirm(titl,msg, callback_success, callback_cancel) {
  var d = swal({
  		title: titl,
  		text: msg,
  		type: "warning",
  		showCancelButton: true,
  		confirmButtonColor: "#DD6B55",
  		confirmButtonText: "Confirm !",
  		closeOnConfirm: true
	},
	function(){
  		callback_success();
	});
    return d;
}
function sweet_confirmdelete(titl,msg, callback_success, callback_cancel) {
  var d = swal({
  		title: titl,
  		text: msg,
  		type: "error",
  		showCancelButton: true,
  		confirmButtonColor: "#d9534f",
  		confirmButtonText: "Yes, delete it!",
  		closeOnConfirm: true
	},
	function(){
  		callback_success();
	});
    return d;
}
function showflash(type,data) {

        var output = '';
        // if the flash message is not empty
        if(data) {
        // switch depending on flash type
        switch(type) {
            case 'success':
                // print out a div with a success class
                output += '<div class="alert alert-success alert-dismissible mptlalert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                output += '<h4><i class="icon fa fa-check"></i> Alert!</h4>';
                break;
            case 'failure':
                // print out a div with a failure class
                output += '<div class="alert alert-danger alert-dismissible mptlalert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                output += '<h4><i class="icon fa fa-ban"></i> Alert!</h4>';
                break;
            default:
                // print out a default flash class
                output += '<div class="alert alert-info alert-dismissible mptlalert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
                output += '<h4><i class="icon fa fa-info"></i> Alert!</h4>';
                break;
        	}
			// save the flash message with the closing div
        	output += data+'</div>';
        }
    // $(".content-header").append(output);
    $(".content-header").prepend(output);


    //hide flash alert message
$('.mptlalert').delay(1500).hide('highlight', {color: '#66cc66'}, 1500);

}
</script>
<?php echo $this->fetch('scriptIndexBottom'); ?>
<?php echo $this->Html->script('AdminLTE.AdminLTE.min'); ?>
<script src="https://cdn.datatables.net/rowreorder/1.2.0/js/dataTables.rowReorder.min.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
</body>
</html>
