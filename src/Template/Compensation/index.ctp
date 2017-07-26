<style>
	.toggle{width:100%;}
	.mt25{margin-top:24px;}
</style>

<section class="content-header">
      <h1>
        Compensation Management
        <small>Wage Analysis Dashboard</small>
      </h1>
    </section>

<section class="content">

	<div class="row">
				 <!-- fix for small devices only -->
				 <div class="clearfix visible-sm-block"></div>

				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">Total Employees</span>
							 <span class="info-box-number"><?php echo $totalempcount; ?></span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">Payroll Head Count</span>
							 <span class="info-box-number"><?php echo $payrollheadcount; ?></span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">FNF Settlement</span>
							 <span class="info-box-number">0</span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
				 <div class="col-md-3 col-sm-6 col-xs-12">
					 <div class="info-box">
						 <span class="info-box-icon bg-blue"><i class="ion ion-ios-people-outline"></i></span>

						 <div class="info-box-content">
							 <span class="info-box-text">New Joinees</span>
							 <span class="info-box-number">0</span>
						 </div>
						 <!-- /.info-box-content -->
					 </div>
					 <!-- /.info-box -->
				 </div>
				 <!-- /.col -->
			 </div>
			 <!-- /.row -->

<div class="row">

	<div class="col-md-8">
		<div class="box box-primary">
			<div class="box-header with-border">
			    <h3 class="box-title">Wage Analysis</h3>
            </div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-4"><div class="form-group text"><label class="control-label">Type</label>
             			<div class="input-group">
             				<select class="form-control select2" id="type">
  								<option></option>
  								<option value="single">Single Employee</option>
  								<option value="paygroup">Pay Group</option>
  								<option value="organisation">Entire Organisation</option>
							</select>
             			</div></div></div>

             			<div class="col-md-4" style="display: none;"><div class="form-group text"><label class="control-label mptlemplbl"></label>
             			<div class="input-group"><input type="text" id="employee" class="mptlemployee form-control"></div></div></div>

				</div>

				<div class="row">

					<div class="col-md-4"><div class="form-group text"><label class=" control-label">Pay Component Type</label>
             			<div class="input-group">
             				<select class="form-control select2" id="paycomptype">
  								<option></option>
  								<option value="paycomponent">Pay Component</option>
  								<option value="paycomponentgroup">Pay Component Group</option>
							</select>
             			</div></div></div>

             			<div class="col-md-4" style="display: none;"><div class="form-group text"><label class="control-label mptlpaycomplbl"></label>
             			<div class="input-group"><input type="text" id="paycomponent" class="paycomponent form-control"></div></div></div>

				</div>

				<div class="row">

					<div class="col-md-4"><div class="form-group text"><label class="control-label">Amount/Percentage</label>
             			<div class="input-group">
             				<select class="form-control select2" id="valuetype">
  								<option></option>
  								<option value="amount">Amount</option>
  								<option value="percentage">Percentage</option>
							</select>
             			</div></div></div>

             			<div class="col-md-4"><div class="form-group text"><label class="control-label">Value</label>
             			<div class="input-group"><input type="number" id="value" class="value form-control"></div></div></div>

             			<div class="col-md-4"><div class="input-group mt25">
						<input data-width="100%;" type="checkbox" data-toggle="toggle" id="toggleval" data-off="<i class='fa fa-plus p3'></i> Increment"
						data-on="<i class='fa fa-minus p3'></i> Decrement"></div></div>

				</div>

      		</div>
      		<div class="box-footer clearfix">
              <input type="button" value="Calculate" class="pull-right calculatebtn btn btn-primary"/>
            </div>
		</div>
	</div>

	<div class="col-md-4 lastpayrolldiv" style="display:none;">
		<div class="box box-primary">
			<div class="box-header with-border">
              	<i class="fa fa-money"></i>
			    <h3 class="box-title">Last Payroll Overview</h3>
            </div>
			<div class="box-body">

				<div class="info-box bg-yellow">
            		<span class="info-box-icon"><i class="fa fa-money"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Total Wage</span>
              			<span class="info-box-number lasttotal"></span>
            		</div>
          		</div>

          		<div class="info-box bg-aqua">
            		<span class="info-box-icon"><i class="fa fa-money"></i></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Salary Payout</span>
              			<span class="info-box-number lastpayout"></span>
            		</div>
          		</div>

      		</div>
		</div>
	</div>

	<div class="col-md-4 projectedpayrolldiv" style="display:none;">
		<div class="box box-primary">
			<div class="box-header with-border">
              	<i class="fa fa-money"></i>
			    <h3 class="box-title">Projected Salary</h3>
            </div>
			<div class="box-body">

				<div class="info-box projectedtotaldiv">
            		<span class="info-box-icon projectedtotalicon"></span>
            		<div class="info-box-content">
              			<span class="info-box-text">Total Wage</span>
              			<span class="info-box-number projectedtotal"></span>
            		</div>
          		</div>

          		

      		</div>
		</div>
	</div>

</div>

</section>


<?php $this->start('scriptIndexBottom'); ?>
<script>
var userdf='<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>';
var paycomponentdata=[];
var paycomponentarr=<?php echo $paycomponentarr ?>;
$.each(paycomponentarr, function(key, value) {
    paycomponentdata.push({'id':key, "text":value});
});

var paycomponentgroupdata=[];
var paycomponentgrouparr=<?php echo $paycomponentgrouparr ?>;
$.each(paycomponentgrouparr, function(key, value) {
    paycomponentgroupdata.push({'id':key, "text":value});
});

var employeedata=[];
var employeearr=<?php echo $employeearr ?>;
$.each(employeearr, function(key, value) {
    employeedata.push({'id':key, "text":value});
});

var paygroupdata=[];
var paygrouparr=<?php echo $paygrouparr ?>;
$.each(paygrouparr, function(key, value) {
    paygroupdata.push({'id':key, "text":value});
});



$(function () {
	
	$(".calculatebtn").click(function(){
		
		var selectedype = $('#type').find(":selected").val();
    	var employee="";
    	var paycomptype=$("#paycomptype").find(":selected").val();
    	var paycomponent="";
    	var valuetype = $('#valuetype').find(":selected").val();
    	var value=$("#value").val();
    	var toggleval=$("#toggleval").prop("checked");
    	
    	if(selectedype=="" || selectedype==null || paycomptype=="" || paycomptype==null){
			sweet_alert("Please select the type.");
            return false;
		}else{
			if(selectedype!="organisation"){
				employee=$('#employee').val();
				if(employee=="" || employee==null){
					sweet_alert("Please select the Employee/Pay group.");
            		return false;
				}
			}
			paycomponent=$("#paycomponent").val();
		}
		
		if(paycomponent=="" || paycomponent==null){console.log($("#paycomponent").find(":selected").val());
			sweet_alert("Please select the Pay Component/Group.");
            return false;
		}
		
		if(valuetype=="" || valuetype==null || value=="" || value==null){
			sweet_alert("Please enter the value/type.");
            return false;
		}
		
		
		//ajax call
		$.ajax({
        	type: "POST",
        	url: '/Compensation/calculateCompensation',
        	data: 'selectedype='+selectedype+"&employee="+employee+"&paycomptype="+paycomptype+"&paycomponent="+paycomponent+"&valuetype="+valuetype+"&value="+value+"&toggleval="+toggleval,
        	success : function(result) {
        		var outputobj=JSON.parse(result);
        		$(".lasttotal").text(outputobj['last_value']);
        		$(".lastpayout").text(outputobj['last_salary']);
        		$(".projectedtotal").text(outputobj['projected_value']);
        		
        		if(outputobj['last_value']>=outputobj['projected_value']){
        			$(".projectedtotaldiv").removeClass("bg-red");$(".projectedtotaldiv").addClass("bg-green");
        			$(".projectedtotalicon").html('<i class="fa fa-caret-down"></i>');
        		}else{
        			$(".projectedtotaldiv").removeClass("bg-green");$(".projectedtotaldiv").addClass("bg-red");
        			$(".projectedtotalicon").html('<i class="fa fa-caret-up"></i>');
        		}
        		
        		$(".lastpayrolldiv").show();
        		$(".projectedpayrolldiv").show();
            	return false;
    		},
        	error : function(result) {
        		$(".lastpayrolldiv").hide();
        		$(".projectedpayrolldiv").hide();
        		
        		sweet_alert("Error.Please try again later.");
            	return false;
        	}
    	});
		
		
	});
	
	$('#type').change(function() {
        var selectedpaycomptype = $('#type').find(":selected").val();
        if(selectedpaycomptype=="single"){
        	$(".mptlemplbl").text("Employee");
        	$('#employee').select2({ width: '100%',allowClear: true,placeholder: "Select",data: employeedata });
        	$("#employee").parent().closest('div .col-md-4').show();
        }else if(selectedpaycomptype=="paygroup"){
        	$(".mptlemplbl").text("Pay Group");
        	$('#employee').select2({ width: '100%',allowClear: true,placeholder: "Select",data: paygroupdata });
        	$("#employee").parent().closest('div .col-md-4').show();
        }else if(selectedpaycomptype=="organisation"){
        	$("#employee").parent().closest('div .col-md-4').hide();
        }
    });
    
    $('#paycomptype').change(function() {
        
        var selectedpaycomptype = $('#paycomptype').find(":selected").val();
        if(selectedpaycomptype=="paycomponent"){
        	$(".mptlpaycomplbl").text("Pay Component");
        	$('#paycomponent').select2({ width: '100%',allowClear: true,placeholder: "Select",data: paycomponentdata });
        }else if(selectedpaycomptype=="paycomponentgroup"){
        	$(".mptlpaycomplbl").text("Pay Component Group");
        	$('#paycomponent').select2({ width: '100%',allowClear: true,placeholder: "Select",data: paycomponentgroupdata });
        }
        
        
        
        $("#paycomponent").parent().closest('div .col-md-4').show();
    });
});
</script>
<?php $this->end(); ?>
