<?= $this->element('templateelmnt'); ?>

<style>
	.emplist .statusbtn { display: none; }
	.emplist:hover .statusbtn { display: block; }
	
	
	.emplist .processbtn { display: none; }
	.emplist:hover .processbtn { display: block; }
	.weekClass:hover {
    	background-color: #808080;
	}
	.datepicker table tr td.day:hover + td.day:tr{
		background-color: #808080;
	}
	/*.datepicker table tr td.day:hover ~ td.day{
    background-color: yellow;
}*/
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
  								<option value="biweekly">BiWeekly</option>
  								<option value="monthly">Monthly</option>
							</select>
             			</div></div></div>
             			
             			
             			<div class="col-md-4"><div class="form-group text"><label class="control-label">Period</label>
             			<div class="input-group"><input type="text" name="period" id="period" class="periodpicker form-control"></div></div></div>
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
var userdf=<?php echo $this->request->session()->read('sessionuser')['dateformat'];?>;
var contentarr='<?php echo $content ?>';
var contentobj = JSON.parse(contentarr);	

 $(function() {
    
   
    

  //initialize daily  
  $("#period").datepicker({ autoclose: true,format: 'dd/mm/yyyy' }).on('changeDate', function (e) { dateChanged(); });
    
  $('#type').on('change', function () {
  	
  	var selectedctrl=this;
    $("#period").datepicker("destroy");
    $("#period").val();
   		
    if (this.value === 'daily' || this.value === 'weekly'|| this.value === 'biweekly'){   
  		
    	//weekpicker
  		$("#period").datepicker({  autoclose: true,format: 'dd/mm/yyyy' })
   		
  		
  		 // var datepicker = $('input[name="period"]').data('datepicker'),
    // element = datepicker.picker;
// 
// element.on('mouseover', 'td.day', function(e) {
  // var hoverDate = new Date(datepicker.viewDate.getTime()),
      // day = $(this).html();
// 
  // // Set the day to the hovered day
  // hoverDate.setDate(day);//console.log(hoverDate);
// 
  // // If the previous month should be used, modify the month
  // if ( $(this).hasClass('old') ) {
    // // Check if we're trying to go back a month from Jan
    // if ( hoverDate.getMonth() == 0 ) {
      // hoverDate.setYear(hoverDate.getYear() - 1);
      // hoverDate.setMonth(11); 
    // } else {
      // hoverDate.setMonth(hoverDate.getMonth() - 1);
    // }
  // }
  // else if ( $(this).hasClass('new') ) {
    // // Check if we're trying to go forward a month from Dec
    // if ( hoverDate.getMonth == 11 ) {
      // hoverDate.setYear(hoverDate.getYear() + 1);
      // hoverDate.setMonth(0); 
    // } else {
      // hoverDate.setMonth(hoverDate.month + 1);
    // }
  // }
// 
// 
// var endDate=new Date(); 
      		// endDate.setDate(hoverDate.getDate()+6); 
//       		
  // console.log(endDate);
//   	
// });

  	}else  if (this.value === 'monthly'){
  		
  		$('#period').datepicker({ autoclose: true, minViewMode: 1, format: 'mm/yyyy' });
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
	
	});
	function dateChanged(){
		var selectedmode = $('#type').find(":selected").text();
    	
      if(selectedmode!="" && selectedmode!=null){
		 if(selectedmode === 'Weekly'){
      		var firstDate = $("#period").val();
      		var lastDate = $('#period').datepicker('getDate'); 
      		lastDate.setDate(lastDate.getDate()+6); 
      		//hide datepicker forcefully
      		$(".datepicker").hide();
      
      		$("#period").val(firstDate + " - " + formattodmy(lastDate)); 
      		
      	}else if(selectedmode === 'BiWeekly'){
      		var firstDate = $("#period").val();
      		var lastDate = $('#period').datepicker('getDate'); 
      		lastDate.setDate(lastDate.getDate()+13); 
      		//hide datepicker forcefully
      		$(".datepicker").hide();
      
      		$("#period").val(firstDate + " - " + formattodmy(lastDate)); 
      	}
      }
	}
	function formattodmy(inputDate) {
    	var date = new Date(inputDate);
    	if (!isNaN(date.getTime())) {
        var day = date.getDate().toString();
        var month = (date.getMonth() + 1).toString();
        // Months use 0 index.

        return (day[1] ? day : '0' + day[0]) + '/' + 
        	(month[1] ? month : '0' + month[0]) + '/' +           
           date.getFullYear();
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
	function convertdmytoymd(inputDate) {

		var datearray = inputDate.split("/");

		return datearray[2].trim() + '/' + datearray[1].trim() + '/' + datearray[0].trim(); 
	}
	function processpayroll(empid){
		
	  $(".payrollprogresstitle").html("Validating");
      $(".progress-bar").css("width", "0%");
      var selectedmode = $('#type').find(":selected").text();
    	
      if(selectedmode!="" && selectedmode!=null){
      	
      	var period=$("#period").val();
      	var fromdate="";
    	var enddate="";
    	
    	if (selectedmode=="Weekly" || selectedmode=="BiWeekly"){ 
      		var dateparts = period.split("-");
      		if(userdf==1){
				fromdate=convertdmytoymd(dateparts[0]).trim(); enddate=convertdmytoymd(dateparts[1]).trim();
			}else{
				fromdate=dateparts[0]; enddate=dateparts[1];
			} 
      	}else if(selectedmode=="Daily"){
      		if(userdf==1){
				fromdate=convertdmytoymd(period).trim(); enddate=convertdmytoymd(period).trim();
			}else{
				fromdate=period; enddate=period;
			}
      	}else if(selectedmode=="Monthly"){
      		var dateparts = period.split("/");
			fromdate=(dateparts[1]+"/"+dateparts[0]+"/01").trim(); 
			var lastDay = new Date(dateparts[1],parseInt(dateparts[0]), 0);
			enddate=formattoymd(lastDay); 
      	}
    	
		//set enddate as the same as start date for daily
		// if(selectedmode=="Daily"){
			// enddate=fromdate;
		// }
			
    	if(selectedmode=="Weekly" || selectedmode=="BiWeekly" || selectedmode=="Daily"|| selectedmode=="Monthly"){
    			
    		if(period!=null && period!=""){
    			
    			$.ajax({
        			type: "POST",
        			url: '/PayrollRecord/runPayrollByWeekly',
        			data: 'empid='+empid+"&fromdate="+fromdate+"&enddate="+enddate,
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
    		}else{
    			sweet_alert("Please enter the period.");
            	return false;
    		}
    	}else if(selectedmode=="Monthly"){
    		
    	}
      }	
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