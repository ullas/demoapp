<style>
 .blurdiv {
        opacity: .65;
}
</style>

<section class="content-header">
  <h1>
    Leave Requests
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
              <span class="info-box-text">Denied</span>
              <span class="info-box-number"><?php echo $rejcount; ?></span>
            </div>
          </div>
        </div>
        
        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>
              <p>Rejected</p>
            </div>
          </div>
        </div> -->
        
	</div>
</section>
	

<?php echo $this->element('indexbasic', array('title' => 'Leave Requests')); ?>
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
    		$(this).find('td:eq(1)').html('<span class="label label-danger">Denied</span>');
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