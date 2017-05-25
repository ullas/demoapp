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
.viewlink, .editlink, .deletelink{
	display:none;
}
</style>

        	<section class="content-header">
  				<h1>Leaves Granted
    				<small>List  &nbsp;&nbsp;<a id="filterclear" style="cursor: pointer;text-decoration: underline;display:none;">Clear filter</a></small>
  				</h1>
  				
			</section>

			<section class="collapse in" id="infobar" style="margin-top:20px;" aria-expanded="true">
	<div class="clearfix">

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


<?php $this->start('scriptIndexBottom'); ?>
<script>
$(function () {
	$('#togglebutton').show();

	$('div.approveddiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/WorkflowsHistory/ajaxData?filter=approved').load();
    	$('a#filterclear').show();
	});
	$('div.denieddiv').click(function(){$(".info-box").removeClass("blurdiv");$(this).addClass("blurdiv");
    	table.ajax.url('/WorkflowsHistory/ajaxData?filter=denied').load();
    	$('a#filterclear').show();
	});

	$('a#filterclear').click(function(){
    	table.ajax.url('/WorkflowsHistory/ajaxData').load();
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
		
		if($(this).find('td:eq(2)').html()=="Request Approved"){
    		$(this).find('td:eq(2)').html('<span class="label label-success">Approved</span>');
    	}else if($(this).find('td:eq(2)').html()=="Request Rejected"){
    		$(this).find('td:eq(2)').html('<span class="label label-danger">Rejected</span>');
    	}
    	
    	var empdatabiographyid=$(this).find('td:eq(1)').html();
   		var selectedctrl=$(this);
   		//get employee name
   		if(empdatabiographyid!="" && empdatabiographyid!=null){
			$.ajax({
        		type: "POST",
      			url: '/Employees/getEmployeenamefromEmpDataBiographyId',
        		data: 'empdatabiographyid='+empdatabiographyid,
        		success : function(result) {
        			if(result!="error"){
    					selectedctrl.find('td:eq(1)').html(result);
    				}
        		}
        	});
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
