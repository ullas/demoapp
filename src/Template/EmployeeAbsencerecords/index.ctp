<style>
 .blurdiv {
        opacity: .65;
}
#togglebutton{
  padding: 0px 0px;
  margin-top: -13px;
  margin-right: -10px;
  margin-bottom:0px
}
.empimg{
	width: 50px;
    height: 50px;
    border: 2px solid transparent;
    border-radius: 50%;
}
.mptlreject,.mptlapprove{
	height:35px;
	margin-top:34px;
}
</style>
<?php if($notificationcontent!='' && $notificationcontent!=null && isset($notificationcontent)){  ?>
<section class="content-header">
	<h1>Leave Management</h1>
</section>

<section class="content">
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#leaveapproval" data-toggle="tab" aria-expanded="true">Leave Approval</a></li>
   		<li class=""><a href="#myleaves" data-toggle="tab" aria-expanded="false">My Leaves</a></li>
	</ul>
    <div class="tab-content" >

    	<div class="tab-pane active" id="leaveapproval" style="border: 1px solid #ddd;">
    		<section class="content-header">
  				<h1>Leave Approval</h1>
			</section>
			<section class="content">
                        	<?php $cnt=0; for ($x = 0; $x < count($notificationcontent); $x++) {
                        		if(isset($notificationcontent[$x]) && $notificationcontent[$x]!=null){


								for ($y = 0; $y < count($notificationcontent[$x]); $y++) {
								if(isset($notificationcontent[$x][$y]) && $notificationcontent[$x][$y]!=null){

								for ($t = 0; $t < count($notificationcontent[$x][$y]['employee_absencerecords']); $t++) {
								if(isset($notificationcontent[$x][$y]['employee_absencerecords'][$t]) && $notificationcontent[$x][$y]['employee_absencerecords'][$t]!=null){

                        	?>
                        	<div style="border-bottom: 1px solid #f4f4f4;">
                        	                 	<!-- <div class="jumbotron" style="overflow: auto;"><?php echo json_encode($notificationcontent[$x][$y]); ?></div> -->
							<div class="col-md-12">
								
								<?php $picname = str_replace('"', '',$this->Country->get_employeepicture($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));
								 if(isset($picname) && ($picname!='')){$picturename='/img/uploadedpics/'.$picname;}
                            				else{$picturename='/img/uploadedpics/defaultuser.png';}
          							echo $this->Html->image($picturename, array('class' => 'img-circle empimg', 'alt' => 'Employee picture')); ?>
								
								<a href="javascript:void(0)" class="product-title"><?php $empname = str_replace('"', '',$this->Country->get_employeename($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));
                            		echo $empname; ?></a>

                            		<span style="color:#333">Applied <b><?php $timetype = str_replace('"', '', json_encode($notificationcontent[$x][$y]['employee_absencerecords'][$t]['time_type']['name'])); echo  $timetype; ?></b> for
                            			<?php  $startdate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date'];
                            						$enddate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date'];
													if(isset($userdateformat)  && $userdateformat===1){
                            							$startdate = str_replace('/', '-', $startdate);
														$startdate = date('Y/m/d', strtotime($startdate));

														$enddate = str_replace('/', '-', $enddate);
														$enddate = date('Y/m/d', strtotime($enddate));
													}


                            						if($startdate!="" && $startdate!=null && $enddate!="" && $enddate!=null){
                            					    	$date1 = new DateTime($startdate);
												    	$date2 = new DateTime($enddate);
												    	$diff = $date2->diff($date1)->format("%a");
												    	echo $diff+1;
													}
										?>
                            			 day(s) from
                            			<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date']; ?> to
										<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date']; ?>

                            		</span>
								
							</div>
							<div class="row" style="margin-top:10px;margin-bottom:10px;">
							<div class="col-md-12">
								
								<div class="form-group textarea">
									<div class="col-md-12">
									<label class="control-label" for="description">Comment:</label>
									</div>
									<div class="col-md-6">
                            			<textarea class="form-control" name="comment" id="comment<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>" style="height:70px;width:100%;"></textarea>
                            		</div>
                            		<div class="col-md-6" style="height:70px;">
										<input type="button" value="Reject" class="mptlreject btn btn-danger" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>
                                		<input type="button" value="Approve" class="mptlapprove btn btn-success" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>							
									</div>
                            	</div>								
							</div>
							</div>
							</div>
                       <!-- 	<li class="item" style="padding:10px;border-bottom: 1px solid #ddd;">
                              <div class="col-sm-9">
                            	<div class="product-img">
                    				<i class="fa fa-3x fa-calendar-minus-o text-aqua"></i>
                  				</div>
                            	<div class="product-info">
                            		<a href="javascript:void(0)" class="product-title"><?php $empname = str_replace('"', '',$this->Country->get_employeename($notificationcontent[$x][$y]['employee_absencerecords'][$t]['emp_data_biographies_id']));
                            		echo $empname; ?>

                            		<span style="color:#333">Applied <b><?php $timetype = str_replace('"', '', json_encode($notificationcontent[$x][$y]['employee_absencerecords'][$t]['time_type']['name'])); echo  $timetype; ?></b> for
                            			<?php  $startdate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date'];
                            						$enddate = $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date'];
													if(isset($userdateformat)  && $userdateformat===1){
                            							$startdate = str_replace('/', '-', $startdate);
														$startdate = date('Y/m/d', strtotime($startdate));

														$enddate = str_replace('/', '-', $enddate);
														$enddate = date('Y/m/d', strtotime($enddate));
													}


                            						if($startdate!="" && $startdate!=null && $enddate!="" && $enddate!=null){
                            					    	$date1 = new DateTime($startdate);
												    	$date2 = new DateTime($enddate);
												    	$diff = $date2->diff($date1)->format("%a");
												    	echo $diff+1;
													}
										?>
                            			 day(s) from
                            			<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['start_date']; ?> to
										<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['end_date']; ?>

                            		</span>
                            		
                            		<div class="form-group textarea"><label class="control-label" for="description">Description</label>
                            			<textarea name="description" id="description" class="form-control" rows="3"></textarea></div>
                            	
                            	</div>
                            </div>
                            <div class="col-sm-3" style="margin-top:10px">
                              <input type="button" value="Reject" class="mptlreject btn btn-danger" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>
                              <input type="button" value="Approve" class="mptlapprove btn btn-success" id=<?php echo $notificationcontent[$x][$y]['employee_absencerecords'][$t]['workflow_id'] ?>>
                            </div>
                            </li> -->
                            <?php } }  } }  } } ?>
        	</section>
  		</div>

    	<div class="tab-pane" id="myleaves" style="border: 1px solid #ddd;">
<?php } ?>
        	<section class="content-header">
  				<h1>Leave Requests
    				<small>List  &nbsp;&nbsp;<a id="filterclear" style="cursor: pointer;text-decoration: underline;display:none;">Clear filter</a></small>
  				</h1>
  				<ol class="breadcrumb">
					<?= $this->Html->link('<b>Add</b> &nbsp;&nbsp;'.__('<i class="fa fa-plus"></i>'), ['action' => 'add'],['class' => 'btn btn-sm btn-success btn-flat','escape' => false]) ?>
  				</ol>
			</section>

			<section class="collapse in" id="infobar" style="margin-top:20px;" aria-expanded="true">
	<div class="clearfix">

		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow pendingdiv" style="cursor: pointer;">
          	<span class="info-box-icon"><i class="fa fa-list"></i></span>
            <div class=" infodiv info-box-content">
              <span class="info-box-text dd">Pending</span>
              <span class="info-box-number"><?php echo $reqcount; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  bg-green approveddiv" style="cursor: pointer;">
            <span class="info-box-icon"><i class="fa fa-check"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">Approved</span>
              <span class="info-box-number"><?php echo $approvedcount; ?></span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box  bg-red denieddiv" style="cursor: pointer;">
            <span class="info-box-icon"><i class="fa fa-times"></i></span>
            <div class="info-box-content infodiv">
              <span class="info-box-text">Rejected</span>
              <span class="info-box-number"><?php echo $rejcount; ?></span>
            </div>
          </div>
        </div>

				</div>
			</section>
			<?php echo $this->element('indexbasic', array('title' => 'Leave Requests')); ?>

<?php if($notificationcontent!='' && $notificationcontent!=null){ ?>
  		</div>
              <!-- /.tab-pane -->

	</div>
   	<!-- /.tab-content -->
</div>

</section>
<?php } ?>

<?php $this->start('scriptIndexBottom'); ?>
<script>
$(function () {
	$('#togglebutton').show();

	$('div.pendingdiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData?filter=pending').load();
    	$('a#filterclear').show();
	});
	$('div.approveddiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData?filter=approved').load();
    	$('a#filterclear').show();
	});
	$('div.denieddiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData?filter=denied').load();
    	$('a#filterclear').show();
	});

	$('a#filterclear').click(function(){
    	table.ajax.url('/EmployeeAbsencerecords/ajaxData').load();
    	$('a#filterclear').hide();
    	$(".info-box").removeClass("blurdiv");
	});


	//reject btn onclick
	$('.mptlreject').click(function(){
    	//get input value
		var btnid = this.id;
		var comnt = $('#comment'+btnid).val();

    	$.get('/EmployeeAbsencerecords/denyLeaveRequest?id='+btnid + '&description='+comnt, function(d) {
   		 	if(d=="success"){
   		 		window.location.reload();
   		 	}
    	});
	});

	//reject btn onclick
	$('.mptlapprove').click(function(){
    	//get input value
		var btnid = this.id;
		var comnt = $('#comment'+btnid).val();

    	$.get('/EmployeeAbsencerecords/approveLeaveRequest?id='+btnid + '&description='+comnt, function(d) {
   		 	if(d=="success"){
   		 		window.location.reload();
   		 	}
    	});
	});

});
function tableLoaded() {
	//delete confirm
    $(".delete-btn").click(function(){var dataid=$(this).attr('data-id');
       $("#ajax_button").html("<form name='formdelete' id='formdelete"+dataid+"' method='post'  action='/<?php echo $this->request->params['controller'] ?>/delete/"+dataid+"' style='display:none;'><input type='hidden' name='_method' value='POST'></form><a href='#' onclick='document.getElementById(&quot;formdelete"+dataid+"&quot;).submit();' class='btn btn-outline'>Confirm</a>");
      $("#trigger").click();
    });

    $("#mptlindextbl tbody").find('tr').each(function () {

    	if($(this).find('td:eq(1)').html()=="0"){
    		$(this).find('td:eq(1)').html('<span class="label label-warning">Pending</span>');
    	}else if($(this).find('td:eq(1)').html()=="1"){
    		$(this).find('td:eq(1)').html('<span class="label label-success">Approved</span>');
    	}else if($(this).find('td:eq(1)').html()=="2"){
    		$(this).find('td:eq(1)').html('<span class="label label-danger">Rejected</span>');
    	}

    	$(this).find('td').each (function() {
        var innerHtml=$(this).find('div.mptldtbool').html();
        // true/false instead of 1/0
        (innerHtml=="1") ? $(this).find('div.mptldtbool').html("True") : $(this).find('div.mptldtbool').html("False");
        });
    });
}

</script>
<?php $this->end(); ?>
