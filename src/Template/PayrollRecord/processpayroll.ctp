<?= $this->element('templateelmnt'); ?>

<style>
	.emplist .stausbtn { display: none; }
	.emplist:hover .stausbtn { display: block; }
	
	
	.emplist .processbtn { display: none; }
	.emplist:hover .processbtn { display: block; }
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
	            	<input type="button" value="Process All" class="processall btn btn-primary"/>
	            	<input type="button" value="Process Selected" class="processselected btn btn-primary"/>
            	</div>
            
				<div class="box-body" style="height:500px;overflow-y:scroll;">
				 <?php foreach ($paygrouplist as $vals) {
			
					echo '<div class="box box-solid collapsed-box" style="margin-bottom:0px;"><div class="box-header">';
					echo '<input type="checkbox" class="paygroup_filter" id="'.$vals['parentid'].'"/>'.' '.'<b>'.$vals['parent'].'</b>';
					echo '<div class="box-tools" style="background:#dbdde0;"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button></div></div>';
			
					if(isset($vals['child'])){
						echo "<div class='box-body no-padding'><ul class='nav nav-pills nav-stacked'>";
						foreach ($vals['child'] as $childval) {
							echo "<li><a class='emplist'><i class='fa fa-circle-o text-light-blue'></i> ";
							
							$empname = str_replace('"', '',$this->Country->get_empname($childval['employee_id']));
							echo $empname ;
							
							echo "<input type='button' value='Status' class='stausbtn btn btn-sm btn-success pull-right p3' style='margin-left:5px;' id='".$childval['employee_id']."'/>";
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
			    	<h3 class="box-title">Payroll Progress</h3>
            	</div>
				<div class="box-body"  id="errordiv">
					
            
				</div>
			</div>
			
		</div>
		
	</div>
	
	
	
              
          
	
   
</section>	
<?php $this->start('scriptIndexBottom'); ?>
<script>
 $(function () {

		var action='<?php echo $this->request->params['action'] ?>';
		if(action=="processpayroll"){
			var atag = $('a[href="/PayrollRecord/processpayroll"]');
			atag.parent().addClass('active');
			atag = $('a[href="/PayrollRecord"]');
			atag.parent().removeClass('active');

		}
		
		setpaygroupfilter();
	   
	   $('.paygroup_filter').change(function() {
        	setpaygroupfilter();
    	});
    
    	$(".processbtn").click(function (event) {

    		var empid=$(this).attr('id');
    		$(".progress-bar").css("width", "0%");
    		$("#errordiv").html("");
    			
    		validate(empid);
   
    	});
    	
    	$(".processselected").click(function (event) {
    		
    		// var empid=$(this).attr('id');
    		// $(".progress-bar").css("width", "0%");
    		// $("#errordiv").html("");
//     			
    		// validate(empid);
   
    	});
    	
    	$(".processsall").click(function (event) {
    		
    		// var empid=$(this).attr('id');
    		// $(".progress-bar").css("width", "0%");
    		// $("#errordiv").html("");
//     			
    		// validate(empid);
   
    	});
    	
	});
	
	function validate(empid){
		
		$(".payrollprogresstitle").html("Validating");
    		
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
        				
        				$("#errordiv").append("<p class='text-green'>No exisiting Leave Request to be approved<p>");
            			
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
        			$(".progress-bar").css("width", "100%");console.log(result);
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
	
	
	function setpaygroupfilter(){
		
		var paygroupflagActive=false;
		 
		$('.paygroup_filter').each(function () {
		    var sThisVal = (this.checked ? $(this).val() : "");
		    var id=$(this).attr("id");
		    var col=id.split("_")[3];
		    if(sThisVal){	
				paygroupflagActive=true;
		    }
	   });
	   
	   paygroupflagActive  ? $(".processselected").show() : 	$(".processselected").hide();
	}
		</script>
 <?php $this->end(); ?>