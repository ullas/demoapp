<?= $this->element('templateelmnt'); ?>

<style>
	.emplist .statusbtn { display: none; }
	.emplist:hover .statusbtn { display: block; }
	
	
	.emplist .processbtn { display: none; }
	.emplist:hover .processbtn { display: block; }
	.weekClass:hover {
    	background-color: #808080;
	}
</style>

    <section class="content-header">
      <h1>
        Payroll
        <small>Process</small>
      </h1>
    </section>
<section class="content">

	
	
	<div class="row">
		
		<div class="col-md-6">

		
			 <div class="box box-primary">
			 	
			 	<div class="box-header with-border">
			 		
			 		<div class="row">
						<div class="col-md-4"><div class="form-group text"><label class="control-label">Type</label>
             			<div class="input-group">
             				<select class="form-control select2" id="type">
  								<option value="daily">Daily</option>
  								<option value="weekly">Weekly</option>
  								<option value="monthly">Monthly</option>
  								<option value="yearly">Yearly</option>
							</select>
             			</div></div></div>
             			
             			
             			<div class="col-md-4"><div class="form-group text"><label class="control-label">Period</label>
             			<div class="input-group"><input type="text" id="period" class="periodpicker form-control"></div></div></div>
					</div>
					
	            	<input type="button" value="Process All" class="processall btn btn-primary"/>
	            	<input type="button" value="Process Selected" class="processselected btn btn-primary"/>
            	</div>
            
				<div class="box-body" style="height:500px;overflow-y:scroll;">
				 <?php foreach ($paygrouplist as $vals) {
			
					echo '<div class="box box-solid collapsed-box pg" style="margin-bottom:0px;"><div class="box-header">';
					echo '<input type="checkbox" class="paygroup_filter" id="paygroupcheck_'.$vals['parentid'].'"/>'.' '.'<b>'.$vals['parent'].'</b>';
					echo '<div class="box-tools" style="background:#dbdde0;"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div>';
			
					if(isset($vals['child'])){
						echo "<div class='box-body no-padding'><ul class='nav nav-pills nav-stacked'>";
						foreach ($vals['child'] as $childval) {
							echo "<li><a class='emplist'><input type='checkbox' class='emp_filter' id='empcheck_".$childval['employee_id']."'/> ";
							
							$empname = str_replace('"', '',$this->Country->get_empname($childval['employee_id']));
							echo $empname ;
							
							echo "<input type='button' value='Status' class='statusbtn btn btn-sm btn-success pull-right p3' style='margin-left:5px;' id='".$childval['employee_id']."'/>";
							echo " <input type='button' value='Process' class='processbtn btn btn-sm btn-warning pull-right p3 dd' id='".$childval['employee_id']."'/></a> </li>";
						}
						echo "</ul></div></div>";
					}
			
					} 
		
					?>
   				 </div>
			</div>
		</div>
		
		
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
              		<i class="fa fa-money"></i>
			    	<h3 class="box-title">Payroll Progress</h3>
            	</div>
				<div class="box-body">
					<p class="payrollprogresstitle"></p>
					<div class="progress progress-sm active">
                		<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                  			<span class="sr-only">20% Complete</span>
                		</div>
              		</div>
            
				</div>
			</div>
			
			<div class="box box-primary">
				<div class="box-header with-border">
              		<i class="fa fa-money"></i>
			    	<h3 class="box-title">Payroll Output</h3>
            	</div>
				<div class="box-body"  id="errordiv">
					
            
				</div>
			</div>
			
		</div>
		
	</div>
	
	
	
              
          
   
</section>	
<?php $this->start('scriptIndexBottom'); ?>
<script>
var contentarr='<?php echo $content ?>';
var contentobj = JSON.parse(contentarr);	
	
 $(function() {
    
  //initialize daily  
  $("#period").datepicker({ autoclose: true,format: 'dd/mm/yyyy' });
    
  $('#type').on('change', function () {
  	
  	var selectedctrl=this;
    $("#period").datepicker("remove");
    $("#period").removeClass("weekpicker");
   		
    if (this.value === 'daily'){
  		
  		$("#period").datepicker({ autoclose: true,format: 'dd/mm/yyyy' }).on("show", function (date) {
           	$('.datepicker-days .table tr').removeClass('weekClass');
	    })
  		
  	}else if (this.value === 'weekly'){   
  		
    	//weekpicker
  		$("#period").addClass("weekpicker");
   		$(".weekpicker").datepicker({ format: 'dd/mm/yyyy' }).on("show", function (date) {
           			$('.datepicker-days .table tbody tr').addClass('weekClass');
       }).on('changeDate', function (e) { if(selectedctrl.value === 'weekly'){
      		var value = $("#period").val();
      		var firstDate = moment(value, "DD/MM/YYYY").day(0).format("DD/MM/YYYY");
      		var lastDate =  moment(value, "DD/MM/YYYY").day(6).format("DD/MM/YYYY");
      		//hide datepicker forcefully
      		$(".datepicker").hide();
      
      		$("#period").val(firstDate + " - " + lastDate);  }
  		});
  	}else  if (this.value === 'monthly'){
  		
  		$('#period').datepicker({ autoclose: true, minViewMode: 1, format: 'mm' }).on("show", function (date) {
           			$('.datepicker-days .table tr').removeClass('weekClass');
           			$('.datepicker-months .table thead').css('display','none');
	    })
  	}
  });

		var action='<?php echo $this->request->params['action'] ?>';
		if(action=="processpayroll"){
			var atag = $('a[href="/PayrollRecord/processpayroll"]');
			atag.parent().addClass('active');
			atag = $('a[href="/PayrollRecord"]');
			atag.parent().removeClass('active');

		}
		
		setfilter();
	   
	    $('.paygroup_filter').change(function() {
        	var paygroupid=$(this).attr('id');
        	var colid=paygroupid.split("_")[1];
        	
        	if($(this).is(":checked")) {
        		setempfilter(colid,"check");
        	}else{
        		setempfilter(colid,"uncheck");
        	}
        	setfilter();
        	
    	});
    	
    	$('.emp_filter').change(function() {
        	var empid=$(this).attr('id');
        	// var colid=empid.split("_")[1];
        	
        	if(!($(this).is(":checked"))){
        		
        		$(this).parents(".box-body").prev(".box-header").find(".paygroup_filter").prop('checked', false);
        		// uncheckPaygroupfilter(colid);
        	}
        	setfilter();
    	});
    
    
    	$(".statusbtn").click(function (event) {

    		var empid=$(this).attr('id');
    		$(".progress-bar").css("width", "0%");
    		$("#errordiv").html("");
    			
    		processpayroll(empid);
   
    	});
    	
    	$(".processbtn").click(function (event) {

    		var empid=$(this).attr('id');
    		$(".progress-bar").css("width", "0%");
    		$("#errordiv").html("");
    			
    		validate(empid);
   
    	});
    	
    	$(".processall").click(function (event) {
    		$("#errordiv").html("");
    		var resultarr=[];
    		$('.emp_filter').each(function () {
    			
		    	var id=$(this).attr("id");
		    	var colid=id.split("_")[1];
				resultarr.push(colid);
				validate(colid);
	   		});
   			// alert(resultarr);
    	});
    	
    	$(".processselected").click(function (event) {
    		$("#errordiv").html("");
    		var resultarr=[];
    		$('.emp_filter').each(function () {
    			
		    	var sThisVal = (this.checked ? $(this).val() : "");
		    	var id=$(this).attr("id");
		    	var colid=id.split("_")[1];
		    	if(sThisVal){	
					resultarr.push(colid);
					validate(colid);
		    	}
	   		});
   			// alert(resultarr);
    	});
    	
    	
    	
    	
    	// $('#type').on('change', function () {
    	// if (this.value === 'weekly'){
    		// $("#txt").datepicker("remove");	
//     		
        	// $('#txt').datepicker({ format:"dd/mm/yyyy",autoclose: true,clearBtn: true,todayHighlight: true })
        	// .on("show", function (date) {
           			// $('.datepicker-days .table tr').addClass('weekClass');
        	// }).on('changeDate', function (e) {
    			// value = $("#txt").val();
    			// firstDate = moment(value, "DD/mm/YYYY").day(-1).format("DD/mm/YYYY");
    			// lastDate =  moment(value, "DD/mm/YYYY").day(5).format("DD/mm/YYYY");
    			// $("#txt").val(firstDate + "   -   " + lastDate);console.log( $("#txt").val());
			// });
// 		
    	// } else if (this.value === 'monthly'){
//     		
    		// $("#txt").datepicker("remove");
//         	
			// $('#txt').datepicker({ autoclose: true, minViewMode: 1, format: 'mm' }).on("show", function (date) {
           			// $('.datepicker-days .table tr').removeClass('weekClass');
           			// $('.datepicker-months .table thead').css('display','none');
        	// })
//         	
    	// }else if (this.value === 'daily'){
//         	
        	// $("#txt").datepicker("remove");
//         	
//         	
    	// }
	// });
	
	});
	
	
	function uncheckPaygroupfilter(empid){
		
	}
	
	function setempfilter(paygroupid,checkstatus){
		
		for(i=0;i<contentobj.length;i++) {
			if(contentobj[i]['parentid']==paygroupid){
				for(t=0;t<contentobj[i]['child'].length;t++) {
					var empid=contentobj[i]['child'][t]['employee_id'];
					if(checkstatus=="check"){
						$('#empcheck_'+empid).prop('checked', true);
					}else {
						$('#empcheck_'+empid).prop('checked', false);
					}
				}
			}
		}
	}
	
	function validate(empid){
		
		$(".payrollprogresstitle").html("Validating");
    		$(".progress-bar").css("width", "0%");
    		$.ajax({
        		type: "POST",
        		url: '/PayrollRecord/checkEmployeeAbsencePending',
        		data: 'empid='+empid,
        		beforeSend: function(){
					$(".payrollprogresstitle").html("Checking any leave approval still pending for the employee " + empid);
  				},
        		success : function(data) {
        			$(".progress-bar").css("width", "50%");
        			if(data=="success"){
            			
            			$(".progress-bar").removeClass("progress-bar-danger");
        				$(".progress-bar").removeClass("progress-bar-success");
        				$(".progress-bar").addClass("progress-bar-success");
        				
        				$("#errordiv").append("<p class='text-green'>No exisiting Leave Request to be approved("+empid+")<p>");
            			
            			// return false;
        			}else{var dataobj = JSON.parse(data);
        				$(".progress-bar").removeClass("progress-bar-success");
        				$(".progress-bar").removeClass("progress-bar-danger");
        				$(".progress-bar").addClass("progress-bar-danger");
        				var tempstr="";
        				for (i = 0; i < dataobj.length; i++) {
        					tempstr+="<p class='text-red'>"+dataobj[i]+"<p>";
        				}
        				$("#errordiv").append(tempstr);
        				// return false;
        			}

        			//call
        			$.ajax({
        		type: "POST",
        		url: '/PayrollRecord/checkEmployeePayComponent',
        		data: 'empid='+empid,
        		beforeSend: function(){
					$(".payrollprogresstitle").html("Checking any pay component/group exists for the employee " + empid);
  				},
        		success : function(result) {
        			$(".progress-bar").css("width", "100%");
        			if(result=="success"){
            			
            			$(".progress-bar").removeClass("progress-bar-danger");
        				$(".progress-bar").removeClass("progress-bar-success");
        				$(".progress-bar").addClass("progress-bar-success");
        				
        				$("#errordiv").append("<p class='text-green'>Pay Component/Pay Component Group exists<p>");
            			
            			return false;
        			}else{

        				$(".progress-bar").removeClass("progress-bar-success");
        				$(".progress-bar").removeClass("progress-bar-danger");
        				$(".progress-bar").addClass("progress-bar-danger");
      
        				$("#errordiv").append("<div class='text-red'>"+result+"<div class='pull-right'><a href='/PayrollData'><i class='fa fa-arrow-circle-right'></i></a></div></div>");
        				return false;
        			}
    			},
        		error : function(result) {
            		sweet_alert("Error while checking pay component/group existance for the employee ."+empid);
            		return false;
        		}
    		});
    		
    		
        			
    			},
        		error : function(data) {console.log(data);
            		sweet_alert("Error while checking Absence approval pending for the employee ."+empid);
            		return false;
        		}
    		});
	}
	function processpayroll(empid){
		
		$(".payrollprogresstitle").html("Validating");
    		$(".progress-bar").css("width", "0%");
    		$.ajax({
        		type: "POST",
        		url: '/PayrollRecord/runPayroll',
        		data: 'empid='+empid,
        		beforeSend: function(){
					$(".payrollprogresstitle").html("Processing payroll for the employee " + empid);
  				},
        		success : function(data) {
        			$(".progress-bar").css("width", "100%");
        			$("#errordiv").append("<p class='text-green'>Total Working days: "+data+"</div>");
            		return false;			
    			},
        		error : function(data) {
            		sweet_alert("Error while processing payroll for the employee ."+empid);
            		return false;
        		}
    		});
	}
	
	function setfilter(){
		
		var paygroupflagActive=false;
		 
		$('.paygroup_filter').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    if(sThisVal){	
				paygroupflagActive=true;
		    }
	   });

	   $('.emp_filter').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    if(sThisVal){	
				paygroupflagActive=true;
		    }
	   });

	   paygroupflagActive  ? $(".processselected").show() : 	$(".processselected").hide();
	}
		</script>
 <?php $this->end(); ?>